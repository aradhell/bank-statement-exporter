<?php

namespace BSExporter;

use BSExporter\Exporters\CAMTExporter;
use BSExporter\Factory\ExporterFactory;
use BSExporter\Inputs\CAMT\Account;
use BSExporter\Inputs\CAMT\Balance;
use BSExporter\Inputs\CAMT\CAMTInput;
use BSExporter\Inputs\CAMT\Headers;
use BSExporter\Inputs\CAMT\TransactionBuilder;
use BSExporter\Inputs\CAMT\TransactionSummary;
use BSExporter\Inputs\InputInterface;
use DateTimeZone;
use PHPUnit\Framework\TestCase;

class BSExporterTest extends TestCase
{

    public function testCAMTFullExportSuccess(): void
    {
        $bsexporter = new BSExporter();
        $input = $this->createCAMTInput();

        $result = $bsexporter->export($input);

        $expected = $this->createCAMTFile($input);

        $this->assertEquals($expected, $result);
    }

    public function testFactoryCAMTSuccess(): void
    {
        $input = new CAMTInput(
            [],
            [],
            new Account('', '', ''),
            new Headers('', '', '', ''),
            new TransactionSummary([])
        );
        $factory = new ExporterFactory();

        $result = $factory->create($input);

        $this->assertInstanceOf(CAMTExporter::class, $result);
        $this->assertEquals(new CAMTExporter(), $result);
    }

    public function testFactoryFailClassNotExist(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Exporter not implemented.');

        $input = new class implements InputInterface {};
        $factory = new ExporterFactory();

        $factory->create($input);
    }

    private function createCAMTInput(): CAMTInput
    {
        $bookingDate = '2019-10-28';
        $valueDate = '2019-10-28';
        $transactionBuilder = new TransactionBuilder();
        $transactionCrdt = $transactionBuilder->setEntryReference('reference')
            ->setAmount(134123.11)
            ->setCurrency('EUR')
            ->setCreditDebitIndicator('CRDT')
            ->setStatus('BOOK')
            ->setBookingDate($bookingDate)
            ->setValueDate($valueDate)
            ->setAccountServicerReference('accountServicerRef')
            ->build();

        $transactionBuilder->reset();

        $transactionDbit = $transactionBuilder->setEntryReference('reference')
            ->setAmount(34123.01)
            ->setCurrency('EUR')
            ->setCreditDebitIndicator('DBIT')
            ->setStatus('BOOK')
            ->setBookingDate($bookingDate)
            ->setValueDate($valueDate)
            ->setAccountServicerReference('accountServicerRef')
            ->setBankTransactionCode('544')
            ->build();

        $transactions = [$transactionCrdt, $transactionDbit];

        $transactionSummary = new TransactionSummary($transactions);

        $account = new Account('iban', 'currency', 'name');
        $date = new \DateTime();
        $creationDateTime = $date->setTimeZone(new DateTimeZone('Europe/Amsterdam'))->format("Y-m-d\TH:i:s.uP");

        $headers = new Headers('message_id', $creationDateTime, 'id', 'seqno');

        $balance = [new Balance('OPBD', 'EUR', 15286.98, 'CRDT', $bookingDate)];

        $CAMTInput = new CAMTInput(
            $transactions,
            $balance,
            $account,
            $headers,
            $transactionSummary
        );

        return $CAMTInput;
    }

    private function createCAMTFile(CAMTInput $input): string
    {
        $creationDT = $input->getHeaders()->getCreationDateTime();

        return '<?xml version="1.0" encoding="UTF-8"?>
<Document xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="urn:iso:std:iso:20022:tech:xsd:camt.053.001.02">
<BkToCstmrStmt><GrpHdr><MsgId>message_id</MsgId><CreDtTm>' . $creationDT . '</CreDtTm></GrpHdr><Stmt><Id>id</Id><ElctrncSeqNb>seqno</ElctrncSeqNb><CreDtTm>' . $creationDT . '</CreDtTm><Acct><Id><IBAN>iban</IBAN></Id><Ccy>currency</Ccy><Nm>name</Nm></Acct><Bal><Tp><CdOrPrtry><Cd>OPBD</Cd></CdOrPrtry></Tp><Amt Ccy="EUR">15286.98</Amt><CdtDbtInd>CRDT</CdtDbtInd><Dt><Dt>2019-10-28</Dt></Dt></Bal><TxsSummry><TtlNtries><NbOfNtries>2</NbOfNtries><Sum>168246.12</Sum><TtlNetNtryAmt>100000.1</TtlNetNtryAmt><CdtDbtInd>CRDT</CdtDbtInd><TtlCdtNtries><NbOfNtries>1</NbOfNtries><Sum>134123.11</Sum></TtlCdtNtries><TtlDbtNtries><NbOfNtries>1</NbOfNtries><Sum>34123.01</Sum></TtlDbtNtries></TtlNtries></TxsSummry><Ntry><NtryRef>reference</NtryRef><Amt Ccy="EUR">134123.11</Amt><CdtDbtInd>CRDT</CdtDbtInd><Sts>BOOK</Sts><BookgDt><Dt>2019-10-28</Dt></BookgDt><ValDt><Dt>2019-10-28</Dt></ValDt><AcctSvcrRef>accountServicerRef</AcctSvcrRef></Ntry><Ntry><NtryRef>reference</NtryRef><Amt Ccy="EUR">34123.01</Amt><CdtDbtInd>DBIT</CdtDbtInd><Sts>BOOK</Sts><BookgDt><Dt>2019-10-28</Dt></BookgDt><ValDt><Dt>2019-10-28</Dt></ValDt><AcctSvcrRef>accountServicerRef</AcctSvcrRef><BkTxCd><Prtry><Cd>544</Cd></Prtry></BkTxCd></Ntry></Stmt></BkToCstmrStmt></Document>
';
    }
}
