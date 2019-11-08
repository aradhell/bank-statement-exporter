<?php

namespace BSExporter\Inputs\MT940;

class Header
{
    /**
     * @var string Field :20:
     */
    private $transactionReferenceNumber;

    /**
     * @var string Field :25:
     */
    private $accountNumber;

    /**
     * @var string Field :28C:
     */
    private $statementNumber;

    /**
     * @var Balance Field :60F:
     */
    private $openingBalance;

    /**
     * @param string $transactionReferenceNumber
     * @param string $accountNumber
     * @param string $statementNumber
     * @param Balance $openingBalance
     */
    public function __construct(string $transactionReferenceNumber, string $accountNumber, string $statementNumber, Balance $openingBalance)
    {
        $this->transactionReferenceNumber = $transactionReferenceNumber;
        $this->accountNumber = $accountNumber;
        $this->statementNumber = $statementNumber;
        $this->openingBalance = $openingBalance;
    }

    /**
     * @return string
     */
    public function getTransactionReferenceNumber(): string
    {
        return $this->transactionReferenceNumber;
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @return string
     */
    public function getStatementNumber(): string
    {
        return $this->statementNumber;
    }

    /**
     * @return Balance
     */
    public function getOpeningBalance(): Balance
    {
        return $this->openingBalance;
    }
}