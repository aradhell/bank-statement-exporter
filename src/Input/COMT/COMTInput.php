<?php

namespace BSExporter\Input;

class COMTInput implements InputInterface
{
    /**
     * @var COMTInputItem[]
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
