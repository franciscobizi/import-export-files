# imporTExport-files

Downloads Latest Stable Version v2

A simple library to work with Import and Export files (requires PHP 7.0.2 +). The implementation is based on the current draft. CSV, JSON and XML are the files extensions that supported for the library.

## Installation
You can install library using Composer.

composer require fbizi/import-export

## Dependencies
- PHP 7.0.2+
- PHPUnit 6+

## Basic usage
### Importing & Exporting
Just use the builder to create a new Import/Export object:

```
use App\Fbizi\Builder;

// An exemple for exporting file 
$export = Builder::create()->build('\Export') // Set the class export to be created
           ->setPathWithFileName('/home/downloads/exported.csv') // set path and file name to be exported
           ->export(); // Export the file

// An exemple for importing file
$import = Builder::create()->build('\Import') // Set the class import to be created
           ->setUrlWithFileName('http://domain.com/uploads/testes.csv') // set url for the source file
           ->import(); Import the file

// Output: A message of confirmation so data were imported/exported successufull.`

```
### Note : You can use the imported data for saving on Database
Just adapt your own data in the Json, Csv and Xml class on their import methods.

#### An exemple with json file

```
$encoded = json_decode($json);
                
 foreach($encoded->usuarios as $data){

    $arr = ['f_name'=> utf8_decode($data->fname),'l_name'=>  utf8_decode($data->lname)];
    $model->db_import('table',$arr); insert data in database
    echo "{$data->fname} {$data->lname}<br>"; //an exemplo to display imported data
}

```

