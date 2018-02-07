<?PHP
require __DIR__ .'/vendor/autoload.php';

use App\Fbizi\Builder;

$export = Builder::create()->build('\Export')
           ->setPathWithFileName('C:\xampp\htdocs\import-export\uploads\downloads\exported.csv')
           ->export();
           echo "<br/>";
$import = Builder::create()->build('\Import')
           ->setUrlWithFileName('http://localhost/import-export/uploads/testes.xml')
           ->import();

// Output: A message of confirmation so data were imported successufull.
