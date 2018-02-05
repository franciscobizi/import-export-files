<?PHP
require __DIR__ .'/vendor/autoload.php';

use App\classes\Builder;

/*$response = Builder::create()->build('\Export')
           ->setPathWithFile('C:\xampp\htdocs\import-export\uploads\exported.xml')
           ->getFile()
           ->save();*/
$response = Builder::create()->build('\Import')
           ->setUrl('http://localhost/import-export/uploads/tests.xml')
           ->getFile()
           ->save();

// Output: A message of confirmation so data were imported successufull.
