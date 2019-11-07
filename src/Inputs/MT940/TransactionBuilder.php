<?php

namespace BSExporter\Inputs\MT940;

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
     * @param string $valueDate
     * @return TransactionBuilder
     */
    public function setValueDate(string $valueDate): TransactionBuilder
    {
        $this->transaction->setValueDate($valueDate);

        return $this;
    }

    /**
     * @param string|null $entryDate
     * @return TransactionBuilder
     */
    public function setEntryDate(?string $entryDate): TransactionBuilder
    {
        $this->transaction->setEntryDate($entryDate);

        return $this;
    }

    /**
     * @param string $indicator
     * @return TransactionBuilder
     */
    public function setIndicator(string $indicator): TransactionBuilder
    {
        $this->transaction->setIndicator($indicator);

        return $this;
    }

    /**
     * @param string $amount
     * @return TransactionBuilder
     */
    public function setAmount(string $amount): TransactionBuilder
    {
        $this->transaction->setAmount($amount);

        return $this;
    }

    /**
     * @param string $type
     * @return TransactionBuilder
     */
    public function setType(string $type): TransactionBuilder
    {
        $this->transaction->setType($type);

        return $this;
    }

    /**
     * @param string|null $bankReference
     * @return TransactionBuilder
     */
    public function setBankReference(?string $bankReference): TransactionBuilder
    {
        if ($bankReference !== null && substr($bankReference, 0, 2) !== '//') {
            $bankReference = '//' . $bankReference;
        }
        $this->transaction->setBankReference($bankReference);

        return $this;
    }
}