<?php

namespace BSExporter;

use BSExporter\Inputs\CAMT\Account;
use BSExporter\Inputs\CAMT\CAMTInput;
use BSExporter\Inputs\CAMT\Headers;
use BSExporter\Inputs\CAMT\Transaction;
use BSExporter\Inputs\CAMT\TransactionBuilder;
use BSExporter\Inputs\CAMT\TransactionSummary;
use DateTimeZone;
use PHPUnit\Framework\TestCase;

class CAMTInputTest extends TestCase
{
    public function testCreateCAMTInput(): void
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

        $CAMTInput = new CAMTInput(
            $transactions,
            [],
            $account,
            $headers,
            $transactionSummary
        );
        $this->assertCount(2, $CAMTInput->getTransactions());
        $this->assertInstanceOf(Transaction::class, $CAMTInput->getTransactions()[0]);
        $this->assertEquals('168246.12', $CAMTInput->getTransactionSummary()->getSum());
        $this->assertEquals('100000.1', $CAMTInput->getTransactionSummary()->getTotalNetEntryAmount());
    }
}
