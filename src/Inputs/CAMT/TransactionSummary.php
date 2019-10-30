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
}
