<?php

namespace BSExporter\Inputs\CAMT;

class Headers
{

    /**
     * @var string CAMT053PRO000008358874
     */
    private $messageId;
    /**
     * @var string 2019-10-25T08:23:54.886386+01:00
     */
    private $creationDateTime;
    /**
     * @var string Identification CAMT05300000835887400001
     */
    private $id;
    /**
     * @var string 19276
     */
    private $electronicSequenceNumber;

    /**
     * Headers constructor.
     * @param string $messageId
     * @param string $creationDateTime
     * @param string $id
     * @param string $electronicSequenceNumber
     */
    public function __construct(
        string $messageId,
        string $creationDateTime,
        string $id,
        string $electronicSequenceNumber
    ) {
        $this->messageId = $messageId;
        $this->creationDateTime = $creationDateTime;
        $this->id = $id;
        $this->electronicSequenceNumber = $electronicSequenceNumber;
    }


    /**
     * @return string
     */
    public function getMessageId(): string
    {
        return $this->messageId;
    }

    /**
     * @param string $messageId
     */
    public function setMessageId(string $messageId): void
    {
        $this->messageId = $messageId;
    }

    /**
     * @return string
     */
    public function getCreationDateTime(): string
    {
        return $this->creationDateTime;
    }

    /**
     * @param string $creationDateTime
     */
    public function setCreationDateTime(string $creationDateTime): void
    {
        $this->creationDateTime = $creationDateTime;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getElectronicSequenceNumber(): string
    {
        return $this->electronicSequenceNumber;
    }

    /**
     * @param string $electronicSequenceNumber
     */
    public function setElectronicSequenceNumber(string $electronicSequenceNumber): void
    {
        $this->electronicSequenceNumber = $electronicSequenceNumber;
    }
}
