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

    /**
     * Returns Transaction.
     *
     * @return Transaction
     */
    public function build(): Transaction
    {
        return $this->transaction;
    }

    /**
     * Sets new blank Transaction.
     */
    public function reset(): void
    {
        $this->transaction = new Transaction();
    }

    /**
     * @param string $valueDate Format YYMMDD.
     * @return TransactionBuilder
     */
    public function setValueDate(string $valueDate): TransactionBuilder
    {
        $this->transaction->setValueDate($valueDate);

        return $this;
    }

    /**
     * @param string|null $entryDate Format MMDD.
     * @return TransactionBuilder
     */
    public function setEntryDate(?string $entryDate): TransactionBuilder
    {
        $this->transaction->setEntryDate($entryDate);

        return $this;
    }

    /**
     * @param string $indicator Credit/Debit indicator. Value 'C' or 'D'.
     * @return TransactionBuilder
     */
    public function setIndicator(string $indicator): TransactionBuilder
    {
        $this->transaction->setIndicator($indicator);

        return $this;
    }

    /**
     * @param string $amount Decimal pointer: ','.
     * @return TransactionBuilder
     */
    public function setAmount(string $amount): TransactionBuilder
    {
        $this->transaction->setAmount($amount);

        return $this;
    }

    /**
     * @param string $type For example NTRFNONREF.
     * @return TransactionBuilder
     */
    public function setType(string $type): TransactionBuilder
    {
        $this->transaction->setType($type);

        return $this;
    }

    /**
     * @param string|null $bankReference Account Servicing Institution’s Reference. Begins with '//'.
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

    /**
     * @param string|null $description Field :86:
     * @return TransactionBuilder
     */
    public function setDescription(?string $description): TransactionBuilder
    {
        $this->transaction->setDescription($description);

        return $this;
    }
}