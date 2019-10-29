<?php

namespace BSExporter\Inputs;

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
