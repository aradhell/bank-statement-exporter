<?php

namespace BSExporter;

use BSExporter\Exporters\ExporterInterface;
use BSExporter\Inputs\InputInterface;

interface BSExporterFactoryInterface
{
    public function create(InputInterface $input): ExporterInterface;
}