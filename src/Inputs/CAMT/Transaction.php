<?php

namespace BSExporter\Inputs\CAMT;

class Transaction
{
    /**
     * Bank reference assigned to the booking, starting with AC, FX, LD, PA or RE.
     * For non-Rabo accounts, may contain if available, the content of subfield 8 of field-61
     * from an incoming SWIFT MT940.
     * @var string
     */
    private $entryReference;
    /**
     * @var float 1223.09
     */
    private $amount;
    /**
     * @var string EUR ..
     */
    private $currency;
    /**
     * Value will be ‘CRDT’ if amount is zero or positive, ‘DBIT’ if amount is negative.
     * @var string
     */
    private $creditDebitIndicator;
    /**
     * Always code ‘BOOK’, indicating the entry has been booked on the account. Reservations are not reported.
     * @var string
     */
    private $status;
    /**
     * Y-m-d
     * @var string
     */
    private $bookingDate;
    /**
     * Y-m-d
     * @var string
     */
    private $valueDate;

    /**
     * Reference assigned by Rabobank to the transaction, starting with two letters like AC, FX, LD, PA orRE.
     * @var string
     */
    private $accountServicerReference;

    /**
     * For Rabo accounts, three digit transaction code.List of transaction codes available via
     * www.rabobank.com/supportcorporateconnect, document ‘Transaction Description RCM.pdf’).
     * For non-Rabo accounts, the content of subfield 6 of field-61 or,
     * if available, of tag ?10 in field-86 from an incoming SWIFT MT940.
     * @var string
     */
    private $bankTransactionCode = '';

    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getEntryReference(): string
    {
        return $this->entryReference;
    }

    /**
     * @param string $entryReference
     * @return Transaction
     */
    public function setEntryReference(string $entryReference): Transaction
    {
        $this->entryReference = $entryReference;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return Transaction
     */
    public function setAmount(float $amount): Transaction
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Transaction
     */
    public function setCurrency(string $currency): Transaction
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreditDebitIndicator(): string
    {
        return $this->creditDebitIndicator;
    }

    /**
     * @param string $creditDebitIndicator
     * @return Transaction
     */
    public function setCreditDebitIndicator(string $creditDebitIndicator): Transaction
    {
        $this->creditDebitIndicator = $creditDebitIndicator;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Transaction
     */
    public function setStatus(string $status): Transaction
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getBookingDate(): string
    {
        return $this->bookingDate;
    }

    /**
     * @param string $bookingDate
     * @return Transaction
     */
    public function setBookingDate(string $bookingDate): Transaction
    {
        $this->bookingDate = $bookingDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getValueDate(): string
    {
        return $this->valueDate;
    }

    /**
     * @param string $valueDate
     * @return Transaction
     */
    public function setValueDate(string $valueDate): Transaction
    {
        $this->valueDate = $valueDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountServicerReference(): string
    {
        return $this->accountServicerReference;
    }

    /**
     * @param string $accountServicerReference
     * @return Transaction
     */
    public function setAccountServicerReference(string $accountServicerReference): Transaction
    {
        $this->accountServicerReference = $accountServicerReference;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankTransactionCode(): string
    {
        return $this->bankTransactionCode;
    }

    /**
     * @param string $bankTransactionCode
     * @return Transaction
     */
    public function setBankTransactionCode(string $bankTransactionCode): Transaction
    {
        $this->bankTransactionCode = $bankTransactionCode;

        return $this;
    }
}
