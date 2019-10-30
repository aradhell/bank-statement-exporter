<?php

namespace BSExporter\Inputs;

class Balance
{

    /**
     * OPBD | CLBD | CLAV | FWAV
     * @var string
     */
    private $code;
    /**
     * EUR | ..
     * @var string
     */
    private $currencv;
    /**
     * 1123.09
     * @var float
     */
    private $amount;
    /**
     * CRDT if >=0 | DBIT if < 0
     * @var string
     */
    private $creditDebitIndicator;
    /**
     * Y-m-d
     * @var \DateTime
     */
    private $date;
}
