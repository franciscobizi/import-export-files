<?PHP

require __DIR__ .'/../vendor/autoload.php';
define("DIR_PATH", "_DIR_./../uploads/");

use FBIZI\IE\{Importer, Exporter};
use FBIZI\IE\Importers\{
    ImportCsv,
    ImportJson,
    ImportXml
};
use FBIZI\IE\Exporters\{
    ExportCsv,
    ExportJson,
    ExportXml
};

// Import xml file example
$obj = new Importer(
    //new ImportCsv(DIR_PATH . "testes.csv")
    //new ImportJson(DIR_PATH . "testes.json")
    new ImportXml(DIR_PATH . "testes.xml")
);
$data = $obj->importer->import();

foreach ($data['users'] as $user) {
    echo "{$user->fname} {$user->lname}\n"; 
}

// Export xml file example
$data = [
 	[ 'name' => 'Francisco', 'age' => '34', 'role' => 'Developer' ],
 	[ 'name' => 'Anoli', 'age' => '37', 'role' => 'Seller' ],
 	[ 'name' => 'Yanna', 'age' => '37', 'role' => 'Manager' ]
 ];

$obj = new Exporter(
    //new ExportCsv($data, DIR_PATH . "downloads/testes.csv")
    //new ExportJson($data, DIR_PATH . "downloads/testes.json")
    new ExportXml($data, DIR_PATH . "downloads/testes1.xml")
);
$res = $obj->exporter->export();
echo $res;

