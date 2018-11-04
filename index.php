<?php

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use trivial\bd\Connection;
use trivial\controllers\HomeController;
use trivial\controllers\ConnectionController;
use trivial\controllers\StartController;
use trivial\controllers\JoinController;
use trivial\controllers\PlayerController;
use trivial\controllers\DiceController;

Connection::setConfig('src/conf/conf.ini');
$db = Connection::makeConnection();

$ini = parse_ini_file('src/conf/conf.ini');

$db = new DB();

$db->addConnection([
	'driver' => $ini['driver'],
	'host' => $ini['host'],
	'database' => $ini['dbname'],
	'username' => $ini['username'],
	'password' => $ini['password'],
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix' => ''
]);

$db->setAsGlobal();
$db->bootEloquent();

session_start();

require('container.php');

$app = new \Slim\App($container);

$app->get('/', 'HomeController:displayHome')->setName('Home');

$app->get('/Game/{id}', 'GameController:renderBoard')->setName('Game');

$app->get('/Game/{id}/FinPartie','GameController:displayEndGame')->setName('FinPartie');

$app->get('/Game/{id}/{theme}','GameController:renderQuestion')->setName('Question');

$app->post('/SubmitQ/Game/{id}/{theme}', function($request, $response, $args) {
	$controller = $this['GameController'];
	$checkSubmissionForm = $controller->checkSubmissionForm($request, $response, $args);
	$router = $this->router;
	return $response->withRedirect($router->pathFor('Game', ["id" => $args['id']]));
})->setName('SubmitQ');

$app->get('/Connection', 'ConnectionController:displayConnection')->setName("Connection");

$app->post('/Connection', function($request, $response, $args){
	$controller = $this['ConnectionController'];
	$checkTheConnection = $controller->checkTheConnection($request, $response, $args);
	$router = $this->router;
	return $response->withRedirect($router->pathFor('Home', []));
})->setName("checkConnection");

$app->get('/Disconnection', function($request, $response, $args){
	$controller = $this['ConnectionController'];
	$checkDestroySession = $controller->checkDestroySession($request, $response, $args);
	$router = $this->router;
	return $response->withRedirect($router->pathFor('Home', []));
})->setName('Disconnection');

$app->get('/CreateAccount', 'ConnectionController:createAccount')->setName('CreateAccount');

$app->post('/CreateAccount', function($request, $response, $args){
	$controller = $this['ConnectionController'];
	$checkAccountCreation = $controller->checkAccountCreation($request, $response, $args);
	$router = $this->router;
	return $response->withRedirect($router->pathFor('Home', []));
})->setName("checkAccountCreation");

$app->get('/Start', 'StartController:displayStart')->setName('Start');

$app->post('/Start' , function($request, $response, $args){
	$controller =  $this['StartController'];
	$checkCreationSaloon = $controller->checkCreateSaloon($request, $response, $args);
    $router = $this->router;
    return $response->withRedirect($router->pathFor('Saloon', ["name" => $_POST['salon']]));
})->setname("checkCreateSaloon");

$app->get('/Salon/{name}', "StartController:displaySaloon")->setName('Saloon');

$app->post('/Salon/{name}', function($request, $response, $args){
	$controller = $this['JoinController'];
	$checkJoinSaloon = $controller->checkJoinSaloon($request, $response, $args);
	$router = $this->router;
    return $response->withRedirect($router->pathFor('Saloon', ["name" => $args["name"]]));
})->setname("checkJoinSaloon");

$app->get('/Rejoin', 'JoinController:displayJoin')->setName('Rejoin');

$app->post('/Rejoin', function($request, $response, $args){
	$router = $this->router;
	return $response->withRedirect($router->pathFor('Saloon', ["name" => $_POST['nomSalon']]));
});

$app->get('/CreateQuestions', 'PlayerController:displayQuestionSpace')->setName('CreateQuestions');

$app->post('/CreateQuestions', function($request, $response, $args){
	$controller = $this['PlayerController'];
 	$checkCreationQuestions = $controller->checkCreateQuestion($request, $response, $args);
	$router = $this->router;
	return $response->withRedirect($router->pathFor('MyAccount', []));
})->setname("checkCreateQuestion");

$app->get('/MyAccount', 'PlayerController:displayAccount')->setName('MyAccount');

$app->post('/Game/{id}/dep', function($request, $response, $args){
	$controller = $this['GameController'];
	$theme = $controller->playerMove($request, $response, $args);
	$router = $this->router;
	if ($theme != "alreadyHave") {
		return $response->withRedirect($router->pathFor('Question', ["id" => $args['id'], "theme" => $theme]));
	} else {
		return $response->withRedirect($router->pathFor('Game', ["id" => $args['id']]));
	}
})->setName('Move');

$app->post('/newGame/{id}', function($request, $response, $args){
	$controller = $this['GameController'];
	$controller->newGame($request, $response, $args);
	$router = $this->router;
	return $response->withRedirect($router->pathFor('Game', ["id" => $args['id']]));
})->setName('newGame');


$app->run();