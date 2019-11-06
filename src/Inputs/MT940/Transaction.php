<?php

namespace BSExporter\Inputs\MT940;

class Transaction
{
    /**
     * @var string Format YYMMDD.
     */
    private $valueDate;

    /**
     * @var string Format MMDD.
     */
    private $entryDate;

    /**
     * @var string Credit/Debit indicator. Value 'C' or 'D'.
     */
    private $indicator;

    /**
     * @var string Decimal pointer: ','.
     */
    private $amount;

    /**
     * @var string For example NTRFNONREF.
     */
    private $type;

    /**
     * @var string Begins with '//'.
     */
    private $reference;

    /**
     * @return string
     */
    public function getValueDate(): string
    {
        return $this->valueDate;
    }

    /**
     * @param string $valueDate
     * @return Transaction
     */
    public function setValueDate(string $valueDate): Transaction
    {
        $this->valueDate = $valueDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getEntryDate(): string
    {
        return $this->entryDate;
    }

    /**
     * @param string $entryDate
     * @return Transaction
     */
    public function setEntryDate(string $entryDate): Transaction
    {
        $this->entryDate = $entryDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getIndicator(): string
    {
        return $this->indicator;
    }

    /**
     * @param string $indicator
     * @return Transaction
     */
    public function setIndicator(string $indicator): Transaction
    {
        $this->indicator = $indicator;

        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     * @return Transaction
     */
    public function setAmount(string $amount): TransactionB
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Transaction
     */
    public function setType(string $type): Transaction
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return Transaction
     */
    public function setReference(string $reference): Transaction
    {
        $this->reference = $reference;

        return $this;
    }
}