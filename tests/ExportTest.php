<?php

namespace Tests;

use FBIZI\IE\Exporter;
use FBIZI\IE\Exporters\{ExportCsv, ExportJson, ExportXml};
use PHPUnit\Framework\TestCase;

final class ExportTest extends TestCase
{
    const DIRECTORY_PATH = '_DIR_./../uploads/downloads/';

    protected function setUp(): void
    {
    }

    protected function tearDown(): void
    {
    }

    public function testExportCsv()
    {
        $data = [
            ["Name","Age","Phone"],
            ["Francisco Bizi","25","788784455"],
            ["Maria Bizi","25","788785455"],
        ];
        $obj = new Exporter(new ExportCsv($data, self::DIRECTORY_PATH . "testes.csv"));
        $actual = $obj->exporter->export();
        $this->assertIsString($actual);
    }

    public function testExportXml()
    {
        $data = [
            ["name" => "Francisco Bizi", "age" => "25", "phone" => "788784455"],
            ["name" => "Maria Bizi", "age" => "25", "phone" => "788454455"],
        ];
        $obj = new Exporter(new ExportXml($data, self::DIRECTORY_PATH . "testes.xml"));
        $actual = $obj->exporter->export();
        $this->assertIsString($actual);
    }

    public function testExportJson()
    {
        $data = [
            ["Name","Age","Phone"],
            ["Francisco Bizi","25","788784455"],
            ["Maria Bizi","25","788785455"],
        ];

        $obj = new Exporter(new ExportJson($data, self::DIRECTORY_PATH . "testes.json"));
        $actual = $obj->exporter->export();
        $this->assertIsString($actual);
    }
}

