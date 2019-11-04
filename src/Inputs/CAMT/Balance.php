<?php

namespace BSExporter\Inputs\CAMT;

class Balance
{

    /**
     * OPBD | CLBD | CLAV | FWAV
     * @var string
     */
    private $code;
    /**
     * EUR | ..
     * @var string
     */
    private $currencv;
    /**
     * 1123.09
     * @var float
     */
    private $amount;
    /**
     * CRDT if >=0 | DBIT if < 0
     * @var string
     */
    private $creditDebitIndicator;
    /**
     * Y-m-d
     * @var string
     */
    private $date;

    /**
     * Balance constructor.
     * @param string $code
     * @param string $currencv
     * @param float $amount
     * @param string $creditDebitIndicator
     * @param string $date
     */
    public function __construct(
        string $code,
        string $currencv,
        float $amount,
        string $creditDebitIndicator,
        string $date
    ) {
        $this->code = $code;
        $this->currencv = $currencv;
        $this->amount = $amount;
        $this->creditDebitIndicator = $creditDebitIndicator;
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getCurrencv(): string
    {
        return $this->currencv;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getCreditDebitIndicator(): string
    {
        return $this->creditDebitIndicator;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }
}
