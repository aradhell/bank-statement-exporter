<?php

namespace BSExporter\Inputs\MT940;

class Balance
{
    /**
     * @var string Credit/Debit indicator. Value 'C' or 'D'.
     */
    private $indicator;

    /**
     * @var string Format YYMMDD.
     */
    private $date;

    /**
     * @var string Currency code.
     */
    private $currencyCode;

    /**
     * @var string Decimal pointer: ','.
     */
    private $amount;

    /**
     * @param string $indicator Credit/Debit indicator. Value 'C' or 'D'.
     * @param string $date Format YYMMDD.
     * @param string $currencyCode Currency code.
     * @param string $amount Decimal pointer: ','.
     */
    public function __construct(string $indicator, string $date, string $currencyCode, string $amount)
    {
        $this->indicator = $indicator;
        $this->date = $date;
        $this->currencyCode = $currencyCode;
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getIndicator(): string
    {
        return $this->indicator;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    public function __toString(): string
    {
        return $this->getIndicator() . $this->getDate() . $this->getCurrencyCode() . $this->getAmount();
    }
}