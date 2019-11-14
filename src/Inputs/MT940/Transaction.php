<?php

namespace BSExporter\Inputs\MT940;

class Transaction
{
    /**
     * @var string Format YYMMDD.
     */
    private $valueDate;

    /**
     * @var string|null Format MMDD.
     */
    private $entryDate = null;

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
     * @var string|null Account Servicing Institution’s Reference. Begins with '//'.
     */
    private $bankReference = null;

    /**
     * @var string|null
     */
    private $description = null;

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
     * @return string|null
     */
    public function getEntryDate(): ?string
    {
        return $this->entryDate;
    }

    /**
     * @param string|null $entryDate
     * @return Transaction
     */
    public function setEntryDate(?string $entryDate): Transaction
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
    public function setAmount(string $amount): Transaction
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
     * @return string|null
     */
    public function getBankReference(): ?string
    {
        return $this->bankReference;
    }

    /**
     * @param string|null $bankReference
     * @return Transaction
     */
    public function setBankReference(?string $bankReference): Transaction
    {
        $this->bankReference = $bankReference;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Transaction
     */
    public function setDescription(string $description): Transaction
    {
        $this->description = $description;

        return $this;
    }

    public function __toString(): string
    {
        $result = $this->getValueDate();
        if (!empty($this->getEntryDate())) {
            $result .= $this->getEntryDate();
        }
        $result .= $this->getIndicator() . $this->getAmount() . $this->getType();
        if (!empty($this->getBankReference())) {
            $result .= $this->getBankReference();
        }

        if (!empty($this->getDescription())) {
            $result .= PHP_EOL . ':86:' . $this->getDescription();
        }

        return $result;
    }


}