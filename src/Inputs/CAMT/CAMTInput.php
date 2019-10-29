<?php

namespace BSExporter\Inputs\CAMT;

use BSExporter\Inputs\InputInterface;

class CAMTInput implements InputInterface
{
    /**
     * @var CAMTInputItem[]
     */
    private $items = [];
    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }
}
