<?php

namespace BSExporter\Inputs;

class Headers
{

    /**
     * @var string CAMT053PRO000008358874
     */
    private $messageId;
    /**
     * @var \DateTime 2019-10-25T08:23:54.886386+01:00
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
     * @return \DateTime
     */
    public function getCreationDateTime(): \DateTime
    {
        return $this->creationDateTime;
    }

    /**
     * @param \DateTime $creationDateTime
     */
    public function setCreationDateTime(\DateTime $creationDateTime): void
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
