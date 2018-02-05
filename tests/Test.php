<?php
use App\classes\Builder;
use PHPUnit\Framework\TestCase;

final class Test extends TestCase
{

    public function testImport()
    {
        $response = Builder::create()->build('Import')
           ->setFile('http://localhost/import-export/uploads/testes.csv')
           ->getFile()
           ->imported();

        $this->assertEquals($response, $response);
    }

    public function testExport()
    {
        $response = Builder::create()->build('\Export')
           ->setFile('http://localhost/import-export/uploads/testes.csv')
           ->getFile()
           ->imported();

        $this->assertEquals("tudo", $response);
    }

}

