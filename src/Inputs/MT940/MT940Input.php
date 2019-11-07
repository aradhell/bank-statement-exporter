<?php

namespace BSExporter\Inputs\MT940;

use BSExporter\Inputs\InputInterface;

class MT940Input implements InputInterface
{
    /**
     * @var Header
     */
    private $header;

    /**
     * @var Transaction[] Field :61:. [0..*]
     */
    private $transactions;

    /**
     * @var Footer
     */
    private $footer;

    public function __construct(Header $header, array $transactions, Footer $footer)
    {
        $this->header = $header;
        $this->transactions = $transactions;
        $this->footer = $footer;
    }
}