<?php

namespace BSExporter\Inputs;

class CAMTInput implements InputInterface
{
    /**
     * @var TransactionItem[]
     */
    private $transactions = [];
    private $iban;
    private $currency;
    private $accountName;
    private $msgId;
    private $statementId;
    private $electronicSequenceNumber;
    private $createDateTime;

    /**
     * CAMTInput constructor.
     * @param TransactionItem[] $transactions
     * @param $iban
     * @param $currency
     * @param $accountName
     * @param $msgId
     * @param $statementId
     * @param $electronicSequenceNumber
     * @param $createDateTime
     */
    public function __construct(
        array $transactions,
        $iban,
        $currency,
        $accountName,
        $msgId,
        $statementId,
        $electronicSequenceNumber,
        $createDateTime
    ) {
        $this->transactions = $transactions;
        $this->iban = $iban;
        $this->currency = $currency;
        $this->accountName = $accountName;
        $this->msgId = $msgId;
        $this->statementId = $statementId;
        $this->electronicSequenceNumber = $electronicSequenceNumber;
        $this->createDateTime = $createDateTime;
    }


    /**
     * @return TransactionItem[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

    /**
     * @param TransactionItem[] $transactions
     */
    public function setTransactions(array $transactions): void
    {
        $this->transactions = $transactions;
    }

    /**
     * @return mixed
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param mixed $iban
     */
    public function setIban($iban): void
    {
        $this->iban = $iban;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getAccountName()
    {
        return $this->accountName;
    }

    /**
     * @param mixed $accountName
     */
    public function setAccountName($accountName): void
    {
        $this->accountName = $accountName;
    }

    /**
     * @return mixed
     */
    public function getMsgId()
    {
        return $this->msgId;
    }

    /**
     * @param mixed $msgId
     */
    public function setMsgId($msgId): void
    {
        $this->msgId = $msgId;
    }

    /**
     * @return mixed
     */
    public function getStatementId()
    {
        return $this->statementId;
    }

    /**
     * @param mixed $statementId
     */
    public function setStatementId($statementId): void
    {
        $this->statementId = $statementId;
    }

    /**
     * @return mixed
     */
    public function getElectronicSequenceNumber()
    {
        return $this->electronicSequenceNumber;
    }

    /**
     * @param mixed $electronicSequenceNumber
     */
    public function setElectronicSequenceNumber($electronicSequenceNumber): void
    {
        $this->electronicSequenceNumber = $electronicSequenceNumber;
    }

    /**
     * @return mixed
     */
    public function getCreateDateTime()
    {
        return $this->createDateTime;
    }

    /**
     * @param mixed $createDateTime
     */
    public function setCreateDateTime($createDateTime): void
    {
        $this->createDateTime = $createDateTime;
    }
}
