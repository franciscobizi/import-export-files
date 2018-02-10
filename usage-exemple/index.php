<?PHP

require __DIR__ .'/../vendor/autoload.php';

use App\Fbizi\Builder;

$data = [
	[ 'name' => 'Nome', 'age' => 'Idade', 'role' => 'Função' ],
 	[ 'name' => 'Francisco', 'age' => '34', 'role' => 'Developer' ],
 	[ 'name' => 'Anoli', 'age' => '37', 'role' => 'Seller' ],
 	[ 'name' => 'Yanna', 'age' => '37', 'role' => 'Manager' ]

 ];

echo "<h1>Exporting file</h1>";

$export = Builder::create('\Export')
		->setDataToExport($data)
        ->setPathWithFileName('_DIR_./../../uploads/downloads/ex-csv.xml')
        ->build();

$export->export();

// Output: A message of confirmation so data were imported successufull.

echo "<h1>Importing file</h1>";

$import = Builder::create('\Import')
           ->setPathWithFileName('_DIR_./../../uploads/testes.csv')
           ->build();
$imported = $import->import()->get();


/*
#CSV EXEMPLE
foreach ($imported as $value) {
            
    echo $value;
}

#XML EXEMPLE

foreach ($imported as $value) {
            
    echo $value->fname;
}

#JSON EXEMPLE
$imported = json_decode($imported);
foreach ($imported->usuarios as $value) {
            
    echo $value->fname;
}
*/

