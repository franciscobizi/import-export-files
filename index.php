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
/*
 * Home page
 */
$app->get('/', function ($request, $response) {
    
    return $this->view->render($response, 'home.phtml');
});
/*
 * Securit validation
 */
$app->post('/securit', function($request, $response) {
    
    $controller = new App\Controller\Controller();
    $name = $controller->securit($_POST['user'], $_POST['pass']);
    return $this->view->render($response, 'home.phtml',[
        'name'=> $name
    ]);
   
});
/*
 * User profile
 */
$app->get('/users', function ($request, $response) {
    
    return $this->view->render($response, 'users.phtml');
});
/*
 * List of uses
 */
$app->get('/list', function ($request, $response) {
    
    $controller = new App\Controller\Controller();
    $data = $controller->read();
    return $this->view->render($response, 'list.phtml',[
        'data'=> $data
    ]);
});
/*
 * Creating new user
 */
$app->get('/new-user', function ($request, $response) {
    
    
    return $this->view->render($response, 'new-user.phtml');
});
/*
 * Create new user
 */
$app->post('/create', function ($request, $response) {
   
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $data = ['f_name'=>$fname,'l_name'=>$lname];
    $controller = new App\Controller\Controller();
    $controller->create($data);
    return $this->view->render($response, 'users.phtml');
    
});

/*
 * Delete user
 */
$app->get('/delete/{id}', function ($request, $response) {
   
    $id = $request->getAttribute('id');
    $controller = new App\Controller\Controller();
    $controller->delete($id);
    return $this->view->render($response, 'users.phtml');
    
});
/*
 * Form to edit user
 */
$app->get('/edit/{id}', function ($request, $response) {
   
    $id = $request->getAttribute('id');
    $controller = new App\Controller\Controller();
    $data = $controller->select_user($id);
    return $this->view->render($response, 'edit-user.phtml',[
        'data'=>$data
    ]);
    
});

/*
 * Edit user
 */
$app->post('/edit-user', function ($request, $response) {
   
    $id = $_POST['id'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $data = ['f_name'=>$fname,'l_name'=>$lname];
    $controller = new App\Controller\Controller();
    $controller->update($data,$id);
    return $this->view->render($response, 'users.phtml');
    
});

$app->run();



