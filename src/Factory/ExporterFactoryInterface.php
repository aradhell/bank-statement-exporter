<?php

namespace BSExporter\Factory;

use BSExporter\Exporters\ExporterInterface;
use BSExporter\Inputs\InputInterface;

interface ExporterFactoryInterface
{
    public function create(InputInterface $input): ExporterInterface;
}