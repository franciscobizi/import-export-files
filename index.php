<?PHP
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require 'vendor/autoload.php';

// Create app
$app = new \Slim\App();

// Get container
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('templates/');
};
// Render Twig template in route
$app->get('/', function ($request, $response) {
    
    $controller = new App\Controller\Controller();
    //$data = $controller->read();
    //$name = "Francisco Bizi";
    return $this->view->render($response, 'home.phtml');
});
$app->post('/securit', function($request, $response) {
    
    $controller = new App\Controller\Controller();
    $name = $controller->securit($_POST['user'], $_POST['pass']);
    return $this->view->render($response, 'home.phtml',[
        'name'=> $name
    ]);
   
});

$app->get('/users', function ($request, $response) {
    
    return $this->view->render($response, 'users.phtml');
});

$app->get('/list', function ($request, $response) {
    
    $controller = new App\Controller\Controller();
    $data = $controller->read();
    return $this->view->render($response, 'list.phtml',[
        'data'=> $data
    ]);
});
$app->get('/new-user', function ($request, $response) {
    
    
    return $this->view->render($response, 'new-user.phtml');
});

$app->post('/create', function ($request, $response) {
   
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $data = ['f_name'=>$fname,'l_name'=>$lname];
    $controller = new App\Controller\Controller();
    $controller->create($data);
    return $this->view->render($response, 'users.phtml');
    
});

$app->get('/php',function ($request, $response) {
    
    echo phpinfo();
});

$app->run();



