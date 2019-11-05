<?php

namespace BSExporter\Exporters;

use BSExporter\Inputs\CAMT\CAMTInput;
use BSExporter\Inputs\InputInterface;

class CAMTExporter implements ExporterInterface
{
    /**
     * @param CAMTInput $input
     * @return string
     */
    public function export(InputInterface $input): string
    {
        $xml = new \SimpleXMLElement(
            '<?xml version="1.0" encoding="UTF-8"?>
<Document xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="urn:iso:std:iso:20022:tech:xsd:camt.053.001.02">
</Document>'
        );

        $BkToCstmrStmt = $xml->addChild('BkToCstmrStmt');

        $GrpHdr = $BkToCstmrStmt->addChild('GrpHdr');
        $GrpHdr->addChild('MsgId', $input->getHeaders()->getMessageId());
        $GrpHdr->addChild('CreDtTm', $input->getHeaders()->getCreationDateTime());

        $Stmt = $BkToCstmrStmt->addChild('Stmt');
        $Stmt->addChild('Id', $input->getHeaders()->getId());
        $Stmt->addChild('ElctrncSeqNb', $input->getHeaders()->getElectronicSequenceNumber());
        $Stmt->addChild('CreDtTm', $input->getHeaders()->getCreationDateTime());

        $Acct = $Stmt->addChild('Acct');
        $AcctId = $Acct->addChild('Id');
        $AcctId->addChild('IBAN', $input->getAccount()->getIBAN());
        $Acct->addChild('Ccy', $input->getAccount()->getCurrency());
        $Acct->addChild('Nm', $input->getAccount()->getName());

        foreach ($input->getBalances() as $balance) {
            $Bal = $Stmt->addChild('Bal');
            $Bal->addChild('Tp')
                ->addChild('CdOrPrtry')
                ->addChild('Cd', $balance->getCode());
            $Bal->addChild('Amt', $balance->getAmount())->addAttribute('Ccy', $balance->getCurrencv());
            $Bal->addChild('CdtDbtInd', $balance->getCreditDebitIndicator());
            $Bal->addChild('Dt')->addChild('Dt', $balance->getDate());
        }

        $TxsSummry = $Stmt->addChild('TxsSummry');

        $TtlNtries = $TxsSummry->addChild('TtlNtries');
        $TtlNtries->addChild('NbOfNtries', $input->getTransactionSummary()->getTotalEntries());
        $TtlNtries->addChild('Sum', $input->getTransactionSummary()->getSum());
        $TtlNtries->addChild('TtlNetNtryAmt', $input->getTransactionSummary()->getTotalNetEntryAmount());
        $TtlNtries->addChild('CdtDbtInd', $input->getTransactionSummary()->getCreditDebitIndicator());

        $TtlCdtNtries = $TtlNtries->addChild('TtlCdtNtries');
        $TtlCdtNtries->addChild('NbOfNtries', $input->getTransactionSummary()->countCreditEntries());
        $TtlCdtNtries->addChild('Sum', $input->getTransactionSummary()->calculateCreditSum());

        $TtlDbtNtries = $TtlNtries->addChild('TtlDbtNtries');
        $TtlDbtNtries->addChild('NbOfNtries', $input->getTransactionSummary()->countDebitEntries());
        $TtlDbtNtries->addChild('Sum', $input->getTransactionSummary()->calculateDebitSum());

        foreach ($input->getTransactions() as $transaction) {
            $Ntry = $Stmt->addChild('Ntry');
            $Ntry->addChild('NtryRef', $transaction->getEntryReference());
            $Ntry->addChild('Amt', $transaction->getAmount())
                ->addAttribute('Ccy', $transaction->getCurrency());
            $Ntry->addChild('CdtDbtInd', $transaction->getCreditDebitIndicator());
            $Ntry->addChild('Sts', $transaction->getStatus());

            $Ntry->addChild('BookgDt')->addChild('Dt', $transaction->getBookingDate());
            $Ntry->addChild('ValDt')->addChild('Dt', $transaction->getValueDate());

            $Ntry->addChild('AcctSvcrRef', $transaction->getAccountServicerReference());

            if (!empty($transaction->getBankTransactionCode())) {
                $Ntry->addChild('BkTxCd')
                    ->addChild('Prtry')
                    ->addChild('Cd', $transaction->getBankTransactionCode());
            }
        }

        return $xml->asXML();
    }
}
