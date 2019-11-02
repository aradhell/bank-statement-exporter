<?php

namespace BSExporter\Inputs\CAMT;

class TransactionBuilder
{
    /**
     * @var Transaction
     */
    private $transaction;

    public function __construct()
    {
        $this->reset();
    }

    public function build(): Transaction
    {
        return $this->transaction;
    }

    public function reset(): void
    {
        $this->transaction = new Transaction();
    }

    /**
     * @param string $entryReference
     * @return TransactionBuilder
     */
    public function setEntryReference(string $entryReference): TransactionBuilder
    {
        $this->transaction->setEntryReference($entryReference);
        return $this;
    }

    /**
     * @param float $amount
     * @return TransactionBuilder
     */
    public function setAmount(float $amount): TransactionBuilder
    {
        $this->transaction->setAmount($amount);
        return $this;
    }

    /**
     * @param string $currency
     * @return TransactionBuilder
     */
    public function setCurrency(string $currency): TransactionBuilder
    {
        $this->transaction->setCurrency($currency);
        return $this;
    }

    /**
     * @param string $creditDebitIndicator
     * @return TransactionBuilder
     */
    public function setCreditDebitIndicator(string $creditDebitIndicator): TransactionBuilder
    {
        $this->transaction->setCreditDebitIndicator($creditDebitIndicator);
        return $this;
    }

    /**
     * @param string $status
     * @return TransactionBuilder
     */
    public function setStatus(string $status): TransactionBuilder
    {
        $this->transaction->setStatus($status);
        return $this;
    }

    /**
     * @param string $bookingDate
     * @return TransactionBuilder
     */
    public function setBookingDate(string $bookingDate): TransactionBuilder
    {
        $this->transaction->setBookingDate($bookingDate);
        return $this;
    }

    /**
     * @param string $valueDate
     * @return TransactionBuilder
     */
    public function setValueDate(string $valueDate): TransactionBuilder
    {
        $this->transaction->setValueDate($valueDate);
        return $this;
    }

    /**
     * @param string $accountServicerReference
     * @return TransactionBuilder
     */
    public function setAccountServicerReference(string $accountServicerReference): TransactionBuilder
    {
        $this->transaction->setAccountServicerReference($accountServicerReference);
        return $this;
    }

    /**
     * @param string $bankTransactionCode
     * @return TransactionBuilder
     */
    public function setBankTransactionCode(string $bankTransactionCode): TransactionBuilder
    {
        $this->transaction->setBankTransactionCode($bankTransactionCode);
        return $this;
    }
}
