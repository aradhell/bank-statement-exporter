<?php

namespace BSExporter\Factory;

use BSExporter\Exporters\ExporterInterface;
use BSExporter\Inputs\InputInterface;

class ExporterFactory implements ExporterFactoryInterface
{
    public function create(InputInterface $input): ExporterInterface
    {
    }
}