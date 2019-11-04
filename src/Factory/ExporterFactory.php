<?php

namespace BSExporter\Factory;

use BSExporter\Exporters\ExporterInterface;
use BSExporter\Inputs\InputInterface;

class ExporterFactory implements ExporterFactoryInterface
{
    public function create(InputInterface $input): ExporterInterface
    {
        $instanceType = (new \ReflectionClass($input))->getShortName();

        $type = substr($instanceType, 0, strpos($instanceType, 'Input'));
        $type = 'BSExporter\\Exporters\\' . $type . 'Exporter';

        if (!class_exists($type)) {
            throw new \Exception('Exporter not implemented.');
        }
        
        $exporter = new $type();

        if (!($exporter instanceof ExporterInterface)) {
            throw new \Exception('Exporter not implemented.');
        }

        return $exporter;
    }
}
