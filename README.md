##Installation
`composer require aradhell/bank-statement-exporter`
###Requirements
* PHP ^7.2
* Composer
* ext-simplexml

##Usage
###Export CAMT

####Create CAMTInput

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

####Create BSExporter
```php 
$bsexporter = new BSExporter();
   
$result = $bsexporter->export($CAMTInput);
```
---