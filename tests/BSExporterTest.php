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
use DateTimeZone;
use PHPUnit\Framework\TestCase;

class BSExporterTest extends TestCase
{

    public function testCAMTFullExportSuccess(): void
    {
        $input = $this->createCAMTInput();
        $factory = new ExporterFactory();

        $exporter = $factory->create($input);

        $result = $exporter->export($input);
        print_r($result);
    }

    public function testFactoryCAMT(): void
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
            ->build();

        $transactions = [$transactionCrdt, $transactionDbit];

        $transactionSummary = new TransactionSummary($transactions);

        $account = new Account('iban', 'currency', 'name');
        $date = new \DateTime();
        $creationDateTime = $date->setTimeZone(new DateTimeZone('Europe/Amsterdam'))->format("Y-m-d\TH:i:s.uP");

        $headers = new Headers('message_id', $creationDateTime, 'id', 'seqno');

        $balance = new Balance('OPBD', 'EUR', 15286.98, 'CRDT', $bookingDate);

        $CAMTInput = new CAMTInput(
            $transactions,
            [$balance],
            $account,
            $headers,
            $transactionSummary
        );

        return $CAMTInput;
    }
}
