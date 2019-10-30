<?php

namespace BSExporter;

use BSExporter\Exporters\CAMTExporter;
use BSExporter\Factory\ExporterFactory;
use BSExporter\Inputs\CAMT\CAMTInput;
use PHPUnit\Framework\TestCase;

class BSExporterTest extends TestCase
{
    public function testCAMTFullExportSuccess(): void
    {
        $bsexporter = new BSExporter();
        $input = new CAMTInput([], '', '', '', '', '','', '');
        // ToDo: add input items
        $expected = $this->createSimpleXMLCAMTSuccessResult($input);

        $result = $bsexporter->export($input);

        $this->assertEquals($expected, $result);
    }

    private function createSimpleXMLCAMTSuccessResult(CAMTInput $input): string
    {
        $result = new \SimpleXMLElement('<?xml version="1.0"?><data></data>');
        // ToDo: fill result by proper example data

        return $result->asXML();
    }

    public function testFactoryCAMT(): void
    {
        $input = new CAMTInput([], '', '', '', '', '','', '');
        $factory = new ExporterFactory();

        $result = $factory->create($input);

        $this->assertInstanceOf(CAMTExporter::class, $result);
        $this->assertEquals(new CAMTExporter(), $result);
    }

    public function testCAMTExporterSuccess(): void
    {
        $input = new CAMTInput([], '', '', '', '', '','', '');
        $exporter = new CAMTExporter();
        $expected = $this->createCAMTExporterResult($input);

        $result = $exporter->export($input);

        $this->assertEquals($expected, $result);
    }

    private function createCAMTExporterResult(CAMTInput $input): string
    {
        $result = new \SimpleXMLElement('<?xml version="1.0"?><data></data>');
        // ToDo: fill result by proper example data

        return $result->asXML();
    }
}
