<?php

namespace BSExporter;

use BSExporter\Factory\ExporterFactory;
use BSExporter\Factory\ExporterFactoryInterface;
use BSExporter\Inputs\InputInterface;

class BSExporter
{
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
        $exporter = $this->factory->create($input);

        return $exporter->export($input);
    }
}