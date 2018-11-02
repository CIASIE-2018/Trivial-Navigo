<?php

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use trivial\controllers\HomeController;
use trivial\controllers\ConnectionController;
use trivial\controllers\StartController;
use trivial\controllers\JoinController;
use trivial\controllers\PlayerController;
use trivial\controllers\DiceController;
use trivial\bd\Connection;

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

$app->get('/Game/{id}','GameController:renderBoard')->setName('Game');
$app->get('/Game/{id}/{theme}','GameController:renderQuestion')->setName('Question');
$app->post('/SubmitQ/Game/{id}/{theme}', function($request, $response, $args) {
	$controller=$this['GameController'];
	$checkSubForm = $controller->checkSubmissionForm($request, $response, $args);
	$router = $this->router;
	return $response->withRedirect($router->pathFor('Game',["id" => $args['id']]));
})->setName('SubmitQ');

$app->get('/Connection','ConnectionController:displayConnection')->setName("Connection");

$app->post('/Connection',function($request,$response,$args){
	$controller = $this['ConnectionController'];
	$con = $controller->testConnexion($request,$response,$args);
})->setName("testCreation");

$app->get('/Disconnection','ConnectionController:testDisconnection')->setName('Disconnection');

$app->get('/CreateAccount', 'ConnectionController:createAccount')->setName('CreateAccount');

$app->post('/CreateAccount', function($request, $response, $args){
	$controller = $this['ConnectionController'];
	$account = $controller->testCreationAccount($request, $response, $args);
	$router = $this->router;
	return $response->withRedirect($router->pathFor('Home',[]));
})->setName("testCreationAccount");

$app->get('/Start', 'StartController:displayStart')->setName('Start');

$app->post('/Start', function($request, $response, $args){
	$controller =  $this['StartController'];
	$start = $controller->testCreateSaloon($request,$response,$args);
})->setname("testCreateQuestions");

$app->get('/Saloon/{name}', "StartController:displaySaloon")->setName('Saloon');

$app->get('/Rejoin', 'JoinController:displayJoin')->setName('Rejoin');

$app->post('/Rejoin', function($request, $response, $args){
	$controller = $this['JoinController'];
 	$join= $controller->testJoinSaloon($request,$response,$args);
})->setname("testCreateQuestions");

$app->get('/CreateQuestions', 'PlayerController:displayQuestionSpace')->setName('CreateQuestions');

$app->post('/CreateQuestions', function($request, $response, $args){
	$controller = $this['PlayerController'];
 	$quest=$controller->testCreateQuestions($request, $response, $args) ;
})->setname("testCreateQuestions");

$app->get('/MyAccount', 'PlayerController:displayAccount')->setName('MyAccount');

$app->get('/Game/{id}/{dep}/{dir}',function($request, $response, $args){
	$controller=$this['GameController'];
	$theme = $controller->playerMove($request, $response, $args);
	$router = $this->router;
	return $response->withRedirect($router->pathFor('Question',["id" => $args['id'], "theme" => $theme]));
})->setName('Move');

$app->get('/newGame/{id}',function($request, $response, $args){
	$controller=$this['GameController'];
	$controller->newGame($request, $response, $args);
	$router = $this->router;
	return $response->withRedirect($router->pathFor('Game',["id" => $args['id']]));
})->setName('newGame');











$app->run();