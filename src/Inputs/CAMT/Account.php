<?php

namespace BSExporter\Inputs\CAMT;

class Account
{
    /**
     * @var string
     */
    private $IBAN;
    /**
     * @var string
     */
    private $currency;
    /**
     * @var string
     */
    private $name;

    /**
     * Account constructor.
     * @param string $IBAN
     * @param string $currency
     * @param string $name
     */
    public function __construct(string $IBAN, string $currency, string $name)
    {
        $this->IBAN = $IBAN;
        $this->currency = $currency;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getIBAN(): string
    {
        return $this->IBAN;
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
    public function getName(): string
    {
        return $this->name;
    }
}
