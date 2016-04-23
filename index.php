<?PHP
use Respect\Rest\Router;
chdir( __DIR__ . '/..');
require 'vendor/autoload.php';

$router = new Router();
//$router->get('/','Hello World');

//echo $r3;
$controller = new App\Controller\Controller();
//$controller->index();
$i = 0;
$data = $controller->read();

//var_dump($data);
/*
foreach($data as $row)
{
    echo $row['f_name'].''.$row['l_name'];
}*/