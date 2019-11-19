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
     * @param string $transactionReferenceNumber Field :20:
     * @param string $accountNumber Field :25:
     * @param string $statementNumber Field :28C:
     * @param Balance $openingBalance Field :60F:
     */
    public function __construct(string $transactionReferenceNumber, string $accountNumber, string $statementNumber, Balance $openingBalance)
    {
        $this->transactionReferenceNumber = $transactionReferenceNumber;
        $this->accountNumber = $accountNumber;
        $this->statementNumber = $statementNumber;
        $this->openingBalance = $openingBalance;
    }

    /**
     * @return string Field :20:
     */
    public function getTransactionReferenceNumber(): string
    {
        return $this->transactionReferenceNumber;
    }

    /**
     * @return string Field :25:
     */
    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    /**
     * @return string Field :28C:
     */
    public function getStatementNumber(): string
    {
        return $this->statementNumber;
    }

    /**
     * @return Balance Field :60F:
     */
    public function getOpeningBalance(): Balance
    {
        return $this->openingBalance;
    }
}