<?php

namespace BSExporter\DataProviders;

use BSExporter\Inputs\MT940\Balance;
use BSExporter\Inputs\MT940\Footer;
use BSExporter\Inputs\MT940\Header;
use BSExporter\Inputs\MT940\MT940Input;
use BSExporter\Inputs\MT940\TransactionBuilder;

class MT940TestDataProvider
{
    public static function createMT940Input(): MT940Input
    {
        $valueDate = '191028';
        $entryDate = '1028';

        $openingBalance = new Balance('C', $valueDate, 'EUR', '541,87');
        $header = new Header(
            'P191007000000001',
            'NL81INGB0006010913EUR',
            '00000',
            $openingBalance
        );

        $transactionBuilder = new TransactionBuilder();

        $transaction_1 = $transactionBuilder->setValueDate($valueDate)
            ->setEntryDate($entryDate)
            ->setIndicator('C')
            ->setAmount('1234,00')
            ->setType('NTRFNONREF')
            ->build();

        $transactionBuilder->reset();

        $transaction_2 = $transactionBuilder->setValueDate($valueDate)
            ->setEntryDate($entryDate)
            ->setIndicator('D')
            ->setAmount('321')
            ->setType('NTRFEREF')
            ->setBankReference('19281343127574')
            ->build();

        $transactionBuilder->reset();

        $transaction_3 = $transactionBuilder->setValueDate($valueDate)
            ->setIndicator('C')
            ->setAmount('852,13')
            ->setType('NTRFNONREF')
            ->setBankReference('//19278366059677')
            ->build();

        $transactions = [$transaction_1, $transaction_2, $transaction_3];

        $closingBalance = new Balance('C', $valueDate, 'EUR', '657,11');
        $footer = new Footer(
            $closingBalance
        );

        return new MT940Input($header, $transactions, $footer);
    }

    public static function createMT940File(): string
    {
        return ':20:P191007000000001
:25:NL81INGB0006010913EUR
:28C:00000
:60F:C191028EUR541,87
:61:1910281028C1234,00NTRFNONREF
:61:1910281028D321NTRFEREF//19281343127574
:61:191028C852,13NTRFNONREF//19278366059677
:62F:C191028EUR657,11
';
    }
}