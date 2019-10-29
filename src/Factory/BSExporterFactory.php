<?php

namespace BSExporter;

use BSExporter\Exporters\ExporterInterface;
use BSExporter\Inputs\InputInterface;

class BSExporterFactory implements BSExporterFactoryInterface
{
    public function create(InputInterface $input): ExporterInterface
    {
    }
}