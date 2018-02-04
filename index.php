<?PHP
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require 'vendor/autoload.php';



$config = [
    'settings' => [
        'displayErrorDetails' => true
    ],
];
// Create app
$app = new \Slim\App($config);

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('templates/');
};
// Render Twig template in route
/*
 * Home page
 */
$app->get('/', function (Request $request, Response $response) {
   ;
    $response = \App\Build::create('Import')->build()
           ->setFile('http://localhost/import-export/uploads/testes.json')
           ->getFile()
           ->imported();

    return $response;
});

$app->run();



