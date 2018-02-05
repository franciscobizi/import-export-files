<?PHP
require __DIR__ .'/vendor/autoload.php';

use App\classes\Builder;

$response = Builder::create()->build('Import')
           ->setFile('http://localhost/import-export/uploads/testes.csv')
           ->getFile()
           ->imported();

// Output: A message of confirmation so data were imported successufull.
