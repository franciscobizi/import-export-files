<?PHP

require __DIR__ .'/../vendor/autoload.php';

use App\Fbizi\Builder;

$data = [
	[ 'name' => 'Nome', 'age' => 'Idade', 'role' => 'Função' ],
 	[ 'name' => 'Francisco', 'age' => '34', 'role' => 'Developer' ],
 	[ 'name' => 'Anoli', 'age' => '37', 'role' => 'Seller' ],
 	[ 'name' => 'Yanna', 'age' => '37', 'role' => 'Manager' ]

 ];

/*echo "<h1>Exporting file</h1>";
$export = Builder::create()->build('\Export')
		->setDataToExport($data)
        ->setPathWithFileName('_DIR_./../../uploads/downloads/ex-csv.xml')
        ->export();*/

echo "<h1>Importing file</h1>";

$import = Builder::create()->build('\Import')
           ->setPathWithFileName('_DIR_./../../uploads/testes.csv')
           ->import();

// Output: A message of confirmation so data were imported successufull.
