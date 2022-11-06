# imporTExport-files

Downloads Last Stable Version v2.0

A light library to work with Import and Export files (requires PHP 7.4 +). The implementation is based on the current draft. CSV, JSON and XML are the files extensions that supported for the library.

## Installation
Package is available on [Packagist](https://packagist.org/packages/fbizi/import-export-files), you can install it using Composer.

```composer require fbizi/import-export-files```
 or [download the zip file](https://github.com/franciscobizi/imporTExport-files/archive/master.zip)

## Dependencies
- PHP 7.4+
- PHPUnit 9+

## Basic usage
### Importing & Exporting
Just use the Importer/Exporter class work with:

```ruby

define("DIR_PATH", "_DIR_./../uploads/");
require __DIR__ .'/../vendor/autoload.php';

use FBIZI\IE\{Importer, Exporter}; // you can use only depends of your needs
use FBIZI\IE\Importers\{ // you can use only depends of your needs
    ImportCsv,
    ImportJson,
    ImportXml
};
use FBIZI\IE\Exporters\{ // you can use only depends of your needs
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
 	[ 'name' => 'John Deor', 'age' => '34', 'role' => 'Developer' ],
 	[ 'name' => 'John Deep', 'age' => '37', 'role' => 'Seller' ],
 	[ 'name' => 'John Walker', 'age' => '37', 'role' => 'Manager' ]
 ];

$obj = new Exporter(
    //new ExportCsv($data, DIR_PATH . "downloads/testes.csv")
    //new ExportJson($data, DIR_PATH . "downloads/testes.json")
    new ExportXml($data, DIR_PATH . "downloads/testes1.xml")
);
$res = $obj->exporter->export();
echo $res;

```

## Donation
Methods :

- [Buy me a coffee](https://www.buymeacoffee.com/franciscobizi)

If this project help you reduce time to develop, you can give me a cup of coffee :)