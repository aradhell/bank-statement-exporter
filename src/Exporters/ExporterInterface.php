<?php

namespace BSExporter\Exporters;

use BSExporter\Inputs\InputInterface;

interface ExporterInterface
{
    public function export(InputInterface $input): string;
}