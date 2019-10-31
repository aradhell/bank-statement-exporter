<?php

namespace BSExporter\Inputs\CAMT;

use BSExporter\Inputs\InputInterface;

class CAMTInput implements InputInterface
{
    /**
     * @var Transaction[]
     */
    private $transactions = [];
    /**
     * @var Balance[]
     */
    private $balances = [];
    /**
     * @var Account
     */
    private $account;

    /**
     * @var Headers
     */
    private $headers;

    /**
     * @var TransactionSummary
     */
    private $transactionSummary;

    /**
     * CAMTInput constructor.
     * @param Transaction[] $transactions
     * @param Balance[] $balances
     * @param Account $account
     * @param Headers $headers
     * @param TransactionSummary $transactionSummary
     */
    public function __construct(
        array $transactions,
        array $balances,
        Account $account,
        Headers $headers,
        TransactionSummary $transactionSummary
    ) {
        $this->transactions = $transactions;
        $this->balances = $balances;
        $this->account = $account;
        $this->headers = $headers;
        $this->transactionSummary = $transactionSummary;
    }

    /**
     * @return Transaction[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * @return Balance[]
     */
    public function getBalances(): array
    {
        return $this->balances;
    }

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }

    /**
     * @return Headers
     */
    public function getHeaders(): Headers
    {
        return $this->headers;
    }

    /**
     * @return TransactionSummary
     */
    public function getTransactionSummary(): TransactionSummary
    {
        return $this->transactionSummary;
    }
}
