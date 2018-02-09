<?php
use App\Fbizi\Builder;
use App\Fbizi\Export;
use PHPUnit\Framework\TestCase;

final class Test extends TestCase
{

    public function testImport()
    {
        $actual = Builder::create()->build('\Import')
           ->setUrlWithFileName('_DIR_./../uploads/testes.csv')
           ->import();

        $expected = $actual;

        // Passed test
        $this->assertEquals($expected, $actual);

        // Fail test
        $this->assertEquals("Fail test", $actual);
    }
    
    public function testExport()
    {
        $actual = Builder::create()->build('\Export')
           ->setPathWithFileName('_DIR_./../uploads/downloads/testes.csv')
           ->export();

        // Passed test
        $this->assertEquals($expected, $actual);

        // Fail test
        $this->assertEquals("Fail test", $actual);
    }
    
    // Missing namespace
    public function testFailCsv()
    {

        $csv = new Csv();

        $atualResult = $csv->csvImport();

        $expected = 'Ficheiro importado com sucesso!';

        $this->assertEquals($expected, $atualResult);

    }

    public function testSetDataToExport()
    {

        $export = new Export();

        $data = [

          [ 'name' => 'Francisco', 'Age' => '34' ],
          [ 'name' => 'Anoli', 'Age' => '37' ]

        ];

        $atualResult = $export->setDataToExport($data);
        
        $expected = 'Ficheiro exportado com sucesso!';

        $this->assertEquals($expected, $atualResult);

    }

}

