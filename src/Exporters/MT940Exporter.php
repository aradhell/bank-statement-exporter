<?php

namespace BSExporter\Exporters;

use BSExporter\Inputs\InputInterface;
use BSExporter\Inputs\MT940\MT940Input;

class MT940Exporter implements ExporterInterface
{
    /**
     * @param MT940Input $input
     * @return string
     */
    public function export(InputInterface $input): string
    {
        return '';
    }
}