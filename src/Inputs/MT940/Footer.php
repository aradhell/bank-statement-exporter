<?php

namespace BSExporter\Inputs\MT940;

class Footer
{
    /**
     * @var Balance Field :62F:
     */
    private $closingBalance;

    /**
     * @var Balance|null Field :64: Optional
     */
    private $closingAvailableBalance = null;

    /**
     * @var Balance|null Field :65: Optional
     */
    private $forwardValueBalance = null;

    /**
     * @param Balance $closingBalance Field :62F:
     * @param Balance|null $closingAvailableBalance Field :64:
     * @param Balance|null $forwardValueBalance Field :65:
     */
    public function __construct(Balance $closingBalance, ?Balance $closingAvailableBalance = null, ?Balance $forwardValueBalance = null)
    {
        $this->closingBalance = $closingBalance;
        $this->closingAvailableBalance = $closingAvailableBalance;
        $this->forwardValueBalance = $forwardValueBalance;
    }

    /**
     * @return Balance :62F:
     */
    public function getClosingBalance(): Balance
    {
        return $this->closingBalance;
    }

    /**
     * @return Balance|null Field :64:
     */
    public function getClosingAvailableBalance(): ?Balance
    {
        return $this->closingAvailableBalance;
    }

    /**
     * @return Balance|null Field :65:
     */
    public function getForwardValueBalance(): ?Balance
    {
        return $this->forwardValueBalance;
    }
}