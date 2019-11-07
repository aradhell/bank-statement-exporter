<?php

namespace BSExporter;

use BSExporter\Exporters\CAMTExporter;
use BSExporter\Exporters\MT940Exporter;
use BSExporter\DataProviders\CAMTFactory;
use BSExporter\DataProviders\MT940Factory;
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
        $camtInput = CAMTFactory::createCAMTInput();

        return [
            [
                $camtInput,
                CAMTFactory::createCAMTFile($camtInput),
            ],
            [
                MT940Factory::createMT940Input(),
                MT940Factory::createMT940File(),
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
                CAMTFactory::createCAMTInput(),
                CAMTExporter::class,
            ],
            [
                MT940Factory::createMT940Input(),
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
