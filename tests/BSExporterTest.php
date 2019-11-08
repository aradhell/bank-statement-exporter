<?php

namespace BSExporter;

use BSExporter\Exporters\CAMTExporter;
use BSExporter\Exporters\MT940Exporter;
use BSExporter\DataProviders\CAMTTestDataProvider;
use BSExporter\DataProviders\MT940TestDataProvider;
use BSExporter\Factory\ExporterFactory;
use BSExporter\Inputs\InputInterface;
use PHPUnit\Framework\TestCase;

class BSExporterTest extends TestCase
{
    /**
     * @dataProvider fullExportDataProvider
     *
     * @param InputInterface
     * @param string $expected
     */
    public function testFullExportSuccess($input, $expected): void
    {
        $bsexporter = new BSExporter();

        $result = $bsexporter->export($input);

        $this->assertEquals($expected, $result);
    }

    public function fullExportDataProvider(): array
    {
        $camtInput = CAMTTestDataProvider::createCAMTInput();

        return [
            [
                $camtInput,
                CAMTTestDataProvider::createCAMTFile($camtInput),
            ],
            [
                MT940TestDataProvider::createMT940Input(),
                MT940TestDataProvider::createMT940File(),
            ],
        ];
    }

    /**
     * @dataProvider factoryDataProvider
     *
     * @param InputInterface $input
     * @param string $className
     *
     * @throws \Exception
     */
    public function testFactoryCAMTSuccess($input, $className): void
    {
        $factory = new ExporterFactory();

        $result = $factory->create($input);

        $this->assertInstanceOf($className, $result);
        $this->assertEquals(new $className(), $result);
    }

    public function factoryDataProvider(): array
    {
        return [
            [
                CAMTTestDataProvider::createCAMTInput(),
                CAMTExporter::class,
            ],
            [
                MT940TestDataProvider::createMT940Input(),
                MT940Exporter::class
            ],
        ];
    }

    public function testFactoryFailClassNotExist(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Exporter not implemented.');

        $input = new class implements InputInterface {};
        $factory = new ExporterFactory();

        $factory->create($input);
    }
}
