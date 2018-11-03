<?php

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use trivial\controllers\HomeController;
use trivial\controllers\ConnexionController;
use trivial\controllers\StartController;
use trivial\controllers\JoinController;
use trivial\controllers\PlayerController;
use trivial\controllers\DiceController;

use trivial\bd\Connexion;


Connexion::setConfig('src/conf/conf.ini');
$db = Connexion::makeConnection();

$ini = parse_ini_file('src/conf/conf.ini');

$db = new DB();

$db->addConnection( [
 'driver' => $ini['driver'],
 'host' => $ini['host'],
 'database' => $ini['dbname'],
 'username' => $ini['username'],
 'password' => $ini['password'],
 'charset' => 'utf8',
 'collation' => 'utf8_unicode_ci',
 'prefix' => ''
] );

$db->setAsGlobal();
$db->bootEloquent();


session_start();

require('container.php');

$app = new \Slim\App($container);

$app->get('/', 'HomeController:displayHome')->setName('Accueil');

$app->get('/Game/{id}','GameController:renderBoard')->setName('Game');

$app->get('/Game/{id}/FinPartie','GameController:displayEndGame')->setName('FinPartie');

$app->get('/Game/{id}/{theme}','GameController:renderQuestion')->setName('Question');
$app->post('/SubmitQ/Game/{id}/{theme}', function($request, $response, $args) {
	$controller=$this['GameController'];
	$checkSubForm = $controller->checkSubmissionForm($request, $response, $args);
	$router = $this->router;
	return $response->withRedirect($router->pathFor('Game',["id" => $args['id']]));
})->setName('SubmitQ');



$app->get('/Connexion','ConnexionController:displayConnexion')->setName("Connexion");
$app->post('/Connexion',function($request,$response,$args){
	$controller = $this['ConnexionController'];
	$con = $controller->testConnexion($request,$response,$args);
})->setName("testConnection");

$app->get('/Deconnexion','ConnexionController:testDeconnexion')->setName('Deconnexion');

$app->get('/CreateAccount', 'ConnexionController:createAccount')->setName('CreateAccount');

$app->post('/CreateAccount', function($request, $response, $args){
	$controller = $this['ConnexionController'];
	$account = $controller->testCreationAccount($request,$response,$args);
  })->setName("testCreation");

  $app->get('/Demarer', 'StartController:displayStart')->setName('Demarer');

$app->post('/Demarer' , function($request, $response, $args){
	$controller =  $this['StartController'];
	$start = $controller->testCreateSaloon($request,$response,$args);
}) ->setname("testCreateQuestions");

$app->get('/Salon/{name}',"StartController:displaySaloon")->setName('Saloon');

$app->post('/Salon/{name}' , function($request, $response, $args){
	$controller = $this['JoinController'];
 	$join= $controller->testJoinSaloon($request,$response,$args) ;
 })
 ->setname("testJoinSaloon");

$app->get('/Rejoindre', 'JoinController:displayJoin')->setName('Rejoindre');

$app->post('/Rejoindre' , function($request, $response, $args){
	$router = $this->router;
	return $response->withRedirect($router->pathFor('Saloon',["name" => $_POST['nomSalon']]));
});

 $app->get('/CreateQuestions','PlayerController:displayQuestionSpace')->setName('CreateQuestions');

 $app->post('/CreateQuestions' , function($request, $response, $args){
	$controller = $this['PlayerController'];
 	$quest=$controller->testCreateQuestions($request, $response, $args) ;
 })
 ->setname("testCreateQuestions");


 $app->get('/MyAccount','PlayerController:displayAccount')->setName('MyAccount');

$app->get('/Game/{id}/{dep}/{dir}',function($request, $response, $args){
	$controller=$this['GameController'];
	$theme = $controller->playerMove($request, $response, $args);
	$router = $this->router;
	if($theme!="alreadyHave")
	return $response->withRedirect($router->pathFor('Question',["id" => $args['id'], "theme" => $theme]));
	else
	return $response->withRedirect($router->pathFor('Game',["id" => $args['id']]));
})->setName('Move');

$app->post('/newGame/{id}',function($request, $response, $args){
	$controller=$this['GameController'];
	$controller->newGame($request, $response, $args);
	$router = $this->router;
	return $response->withRedirect($router->pathFor('Game',["id" => $args['id']]));
})->setName('newGame');











$app->run();