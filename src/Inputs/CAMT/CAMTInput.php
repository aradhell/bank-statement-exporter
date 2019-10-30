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
     * @param Transaction[] $transactions
     */
    public function setTransactions(array $transactions): void
    {
        $this->transactions = $transactions;
    }

    /**
     * @return Balance[]
     */
    public function getBalances(): array
    {
        return $this->balances;
    }

    /**
     * @param Balance[] $balances
     */
    public function setBalances(array $balances): void
    {
        $this->balances = $balances;
    }

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }

    /**
     * @param Account $account
     */
    public function setAccount(Account $account): void
    {
        $this->account = $account;
    }

    /**
     * @return Headers
     */
    public function getHeaders(): Headers
    {
        return $this->headers;
    }

    /**
     * @param Headers $headers
     */
    public function setHeaders(Headers $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * @return TransactionSummary
     */
    public function getTransactionSummary(): TransactionSummary
    {
        return $this->transactionSummary;
    }

    /**
     * @param TransactionSummary $transactionSummary
     * @return CAMTInput
     */
    public function setTransactionSummary(TransactionSummary $transactionSummary): CAMTInput
    {
        $this->transactionSummary = $transactionSummary;
        return $this;
    }
}
