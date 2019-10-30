<?php

namespace BSExporter;

use BSExporter\Exporters\ExporterInterface;
use BSExporter\Factory\ExporterFactory;
use BSExporter\Factory\ExporterFactoryInterface;
use BSExporter\Inputs\InputInterface;

class BSExporter
{
    /**
     * @var ExporterInterface
     */
    private $exporter;

    /**
     * @var ExporterFactoryInterface
     */
    private $factory;

    public function __construct()
    {
        $this->factory = new ExporterFactory();
    }

    public function export(InputInterface $input): string
    {
        //ToDo: select exporter by factory

        //ToDo: use exporter to generate return

        return '';
    }
}