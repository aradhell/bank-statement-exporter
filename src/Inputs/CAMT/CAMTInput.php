<?php

namespace BSExporter\Inputs;

class CAMTInput implements InputInterface
{
    /**
     * @var TransactionItem[]
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
}
