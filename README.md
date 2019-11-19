## Installation
`composer require aradhell/bank-statement-exporter`
### Requirements
* PHP ^7.2
* Composer
* ext-simplexml

## Usage
### Export CAMT

#### Create CAMTInput

```php
$bookingDate = '2019-10-28'; //transaction booking date
$valueDate = '2019-10-28'; //transaction value date

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

$transactionBuilder->reset(); // reset builder to create a new transaction

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

$transactionSummary = new TransactionSummary($transactions); // create transaction summary

$account = new Account('iban', 'currency', 'name'); // account info

$date = new DateTime();

$creationDateTime = $date->setTimeZone(new DateTimeZone('Europe/Amsterdam'))->format("Y-m-d\TH:i:s.uP"); //export  file creation datetime

$headers = new Headers('message_id', $creationDateTime, 'id', 'seqno'); // export file headers

$balance = [new Balance('OPBD', 'EUR', 15286.98, 'CRDT', $bookingDate)]; // example balance

$CAMTInput = new CAMTInput(
    $transactions,
    $balance,
    $account,
    $headers,
    $transactionSummary
);
```

#### Create BSExporter
```php 
$bsexporter = new BSExporter();
   
$result = $bsexporter->export($CAMTInput);
```
---

### Export MT940

#### Create MT940Input

```php
$valueDate = '191028'; // Format YYMMDD
$entryDate = '1028'; // Format MMDD

$openingBalance = new Balance('C', $valueDate, 'EUR', '541,87');
$header = new Header(
    'P191007000000001', // :20:
    'NL81INGB0006010913EUR', // :25:
    '00000', // :28C:
    $openingBalance // :60F:
);

$transactionBuilder = new TransactionBuilder();

$transaction_1 = $transactionBuilder->setValueDate($valueDate)
    ->setEntryDate($entryDate)
    ->setIndicator('C')
    ->setAmount('1234,00')
    ->setType('NTRFNONREF')
    ->build();

$transactionBuilder->reset(); // reset builder to create a new transaction

$transaction_2 = $transactionBuilder->setValueDate($valueDate)
    ->setEntryDate($entryDate)
    ->setIndicator('D')
    ->setAmount('321')
    ->setType('NTRFEREF')
    ->setBankReference('19281343127574')
    ->setDescription('/EREF/03-10-2019 13:54 0020002657175237//CNTP/NL70RABO0115600000/RABONL2U/Houtenbouwmaterialen.nl via Mollie///REMI/USTD//M0321335M12VRE6A 0020002657175237 1000006627 houtenbouwmaterialen.nl/')
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
$closingAvailableBalance = new Balance('C', $valueDate, 'EUR', '861,68');
$forwardValueBalance = new Balance('C', $valueDate, 'EUR', '861,68');
$footer = new Footer(
    $closingBalance, // :62F
    $closingAvailableBalance // :64:
    $forwardValueBalance // :65:
);

$MT940Input = new MT940Input($header, $transactions, $footer);
```

#### Create BSExporter
```php 
$bsexporter = new BSExporter();
   
$result = $bsexporter->export($MT940Input);
```