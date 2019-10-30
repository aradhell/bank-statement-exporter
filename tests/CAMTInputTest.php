<?php

namespace BSExporter;

use BSExporter\Inputs\CAMT\Account;
use BSExporter\Inputs\CAMT\CAMTInput;
use BSExporter\Inputs\CAMT\Headers;
use BSExporter\Inputs\CAMT\TransactionBuilder;
use BSExporter\Inputs\CAMT\TransactionSummary;
use PHPUnit\Framework\TestCase;

class CAMTInputTest extends TestCase
{
    public function testCreateCAMTInput(): void
    {
        $transactionBuilder = new TransactionBuilder();
        $transactionCrdt = $transactionBuilder->setEntryReference('reference')
            ->setAmount(134123.11)
            ->setCurrency('EUR')
            ->setCreditDebitIndicator('CRDT')
            ->setStatus('BOOK')
            ->setBookingDate('2019-10-28')
            ->setValueDate('2019-10-28')
            ->setAccountServicerReference('accountServicerRef')
            ->build();

        $transactionBuilder->reset();

        $transactionDbit = $transactionBuilder->setEntryReference('reference')
            ->setAmount(34123.01)
            ->setCurrency('EUR')
            ->setCreditDebitIndicator('DBIT')
            ->setStatus('BOOK')
            ->setBookingDate('2019-10-28')
            ->setValueDate('2019-10-28')
            ->setAccountServicerReference('accountServicerRef')
            ->build();

        $transactions = [$transactionCrdt, $transactionDbit];

        $transactionSummary = new TransactionSummary($transactions);

        $CAMTInput = new CAMTInput(
            $transactions,
            [],
            new Account('iban', 'currency', 'name'),
            new Headers('', '', '', ''),
            $transactionSummary
        );

        dd($CAMTInput);
    }
}
