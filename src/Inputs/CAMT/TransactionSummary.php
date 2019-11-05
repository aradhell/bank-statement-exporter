<?php

namespace BSExporter\Inputs\CAMT;

class TransactionSummary
{
    /**
     * @var int
     */
    private $totalEntries;
    /**
     * @var float
     */
    private $sum;
    /**
     * @var float
     */
    private $totalNetEntryAmount;
    /**
     * @var string
     */
    private $creditDebitIndicator = 'DBIT';

    /**
     * @var Transaction[]
     */
    private $transactions;

    /**
     * TransactionSummary constructor.
     * @param Transaction[] $transactions
     */
    public function __construct(array $transactions)
    {
        $this->transactions = $transactions;
        $this->totalEntries = count($transactions);
        $this->sum = $this->calculateSum();
        $this->totalNetEntryAmount = $this->calculateTotalNetAmount();
        $this->setCreditIndicator();
    }

    private function calculateSum(): float
    {
        $sum_ = 0.00;
        foreach ($this->transactions as $transaction) {
            $sum_ += $transaction->getAmount();
        }
        return $sum_;
    }

    private function calculateTotalNetAmount(): float
    {
        $totalNetAmount = 0.00;
        foreach ($this->transactions as $transaction) {
            if ($transaction->getCreditDebitIndicator() == 'CRDT') {
                $totalNetAmount += $transaction->getAmount();
            } else {
                $totalNetAmount -= $transaction->getAmount();
            }
        }
        return $totalNetAmount;
    }

    private function setCreditIndicator(): void
    {
        if ($this->totalNetEntryAmount >= 0) {
            $this->creditDebitIndicator = 'CRDT';
        }
    }

    /**
     * @return int
     */
    public function getTotalEntries(): int
    {
        return $this->totalEntries;
    }

    /**
     * @return float
     */
    public function getSum(): float
    {
        return $this->sum;
    }

    /**
     * @return float
     */
    public function getTotalNetEntryAmount(): float
    {
        return $this->totalNetEntryAmount;
    }

    /**
     * @return string
     */
    public function getCreditDebitIndicator(): string
    {
        return $this->creditDebitIndicator;
    }

    public function calculateCreditSum(): float
    {
        return $this->calculateSumByType('CRDT');
    }

    public function calculateDebitSum(): float
    {
        return $this->calculateSumByType('DBIT');
    }

    private function calculateSumByType(string $type): float
    {
        $result = 0.00;

        foreach ($this->transactions as $transaction) {
            if ($transaction->getCreditDebitIndicator() === $type) {
                $result += $transaction->getAmount();
            }
        }

        return $result;
    }

    public function countCreditEntries(): int
    {
        return $this->countEntries('CRDT');
    }

    public function countDebitEntries(): int
    {
        return $this->countEntries('DBIT');
    }

    /**
     * @param string $type Member of {@see TransactionSummary::getCreditDebitIndicator()}
     *
     * @return int
     */
    private function countEntries(string $type): int
    {
        $result = 0;

        foreach ($this->transactions as $transaction) {
            if ($transaction->getCreditDebitIndicator() === $type) {
                $result++;
            }
        }

        return $result;
    }
}
