<?PHP
require __DIR__ .'/../vendor/autoload.php';

use App\Fbizi\Builder;

echo "<h1>Exporting file</h1>";
$export = Builder::create()->build('\Export')
           ->setPathWithFileName('_DIR_./../../uploads/downloads/exported.csv')
           ->export();

echo "<h1>Importing file</h1>";

$import = Builder::create()->build('\Import')
           ->setPathWithFileName('_DIR_./../../uploads/testes.xml')
           ->import();

// Output: A message of confirmation so data were imported successufull.
