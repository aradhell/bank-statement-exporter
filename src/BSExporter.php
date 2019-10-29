<?php

namespace BSExporter;

use BSExporter\Exporters\ExporterInterface;
use BSExporter\Inputs\InputInterface;

class BSExporter
{
    /**
     * @var ExporterInterface
     */
    private $exporter;

    /**
     * @var BSExporterFactoryInterface
     */
    private $factory;

    public function __construct()
    {
        $this->factory = new BSExporterFactory();
    }

    public function export(InputInterface $input): string
    {
        //ToDo: select exporter by factory

        //ToDo: use exporter to generate return
    }
}