<?php

namespace Tests;

use FBIZI\IE\Importer;
use FBIZI\IE\Importers\{ImportCsv, ImportJson, ImportXml};
use PHPUnit\Framework\TestCase;

final class ImportTest extends TestCase
{
    const DIRECTORY_PATH = '_DIR_./../uploads/';

    protected function setUp(): void
    {
    }

    protected function tearDown(): void
    {
    }

    public function testImportCsv()
    {
        $obj = new Importer(new ImportCsv(self::DIRECTORY_PATH . "testes.csv"));
        $actual = $obj->importer->import();
        $expected = $actual;
        $this->assertEquals($expected, $actual);
    }

    public function testImportXml()
    {
        $obj = new Importer(new ImportXml(self::DIRECTORY_PATH . "testes.xml"));
        $actual = $obj->importer->import();
        $expected = $actual;
        $this->assertEquals($expected, $actual);
    }

    public function testImportJson()
    {
        $obj = new Importer(new ImportJson(self::DIRECTORY_PATH . "testes.json"));
        $actual = $obj->importer->import();
        $expected = $actual;
        $this->assertEquals($expected, $actual);
    }

}

