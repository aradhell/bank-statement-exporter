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
    private $currency;

    /**
     * @var string Decimal pointer: ','.
     */
    private $amount;

    /**
     * @param string $indicator
     * @param string $date
     * @param string $currency
     * @param string $amount
     */
    public function __construct(string $indicator, string $date, string $currency, string $amount)
    {
        $this->indicator = $indicator;
        $this->date = $date;
        $this->currency = $currency;
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
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }
}