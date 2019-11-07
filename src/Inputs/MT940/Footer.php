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
     * @param Balance $closingBalance
     * @param Balance|null $closingAvailableBalance
     * @param Balance|null $forwardValueBalance
     */
    public function __construct(Balance $closingBalance, ?Balance $closingAvailableBalance = null, ?Balance $forwardValueBalance = null)
    {
        $this->closingBalance = $closingBalance;
        $this->closingAvailableBalance = $closingAvailableBalance;
        $this->forwardValueBalance = $forwardValueBalance;
    }

    /**
     * @return Balance
     */
    public function getClosingBalance(): Balance
    {
        return $this->closingBalance;
    }

    /**
     * @return Balance|null
     */
    public function getClosingAvailableBalance(): ?Balance
    {
        return $this->closingAvailableBalance;
    }

    /**
     * @return Balance|null
     */
    public function getForwardValueBalance(): ?Balance
    {
        return $this->forwardValueBalance;
    }
}