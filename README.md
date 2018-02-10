# imporTExport-files

Downloads Last Stable Version v1.1

A simple library to work with Import and Export files (requires PHP 7.0.2 +). The implementation is based on the current draft. CSV, JSON and XML are the files extensions that supported for the library.

## Installation
Package is available on [Packagist](https://packagist.org/packages/fbizi/import-export-files), you can install it using Composer.

```composer require fbizi/import-export-files or [download the zip file](https://github.com/franciscobizi/imporTExport-files/archive/master.zip)```

## Dependencies
- PHP 7.0.2+
- PHPUnit 6+

## Basic usage
### Importing & Exporting
Just use the builder to create a new Import/Export object:

```ruby
use App\Fbizi\Builder;

Exporting file;

$export = Builder::create('\Export') // set class 
		->setDataToExport($data) // set data (array) to be exported 
        ->setPathWithFileName('/home/uploads/downloads/ex-csv.xml') // set path with file name
        ->build(); // the build method to build Export class

$export->export(); // method to export data

// Output: A message of confirmation so data were imported successufull.

Importing file;

$import = Builder::create('\Import') // set class
           ->setPathWithFileName('/home/uploads/testes.csv') // set path with file name
           ->build(); the build method to build Import class
$imported = $import->import()->get(); // method to import data

```
### Note : You can use the imported data for saving on Database
Just adapt your own data and saving it in your database.

#### An exemple with json file

```ruby
$encoded = json_decode($imported);
                
foreach($encoded->usuarios as $data){

    $arr = ['f_name'=> utf8_decode($data->fname),'l_name'=>  utf8_decode($data->lname)];
    $model->insert('table', $arr); //insert data in database
    echo "{$data->fname} {$data->lname}<br>"; //an exemplo to display imported data
}

```

