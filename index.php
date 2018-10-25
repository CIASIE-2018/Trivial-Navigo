<?php

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use trivial\controllers\HomeController;
use trivial\controllers\ConnexionController;
use trivial\controllers\StartController;
use trivial\controllers\JoinController;
use trivial\controllers\PlayerController;
use trivial\controllers\DiceController;
use trivial\controllers\CamembertController;
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


$app->get('/Connexion','ConnexionController:displayConnexion')->setName("Connexion");
$app->post('/Connexion',function($request,$response,$args){
	$controller = $this['ConnexionController'];
	$con = $controller->testConnexion($request,$response,$args);
})->setName("testCreation");

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


$app->get('/Rejoindre', 'JoinController:displayJoin')->setName('Rejoindre');

$app->post('/Rejoindre' , function($request, $response, $args){
	$controller = $this['JoinController'];
 	$join= $controller->testJoinSaloon($request,$response,$args) ;
 })
 ->setname("testCreateQuestions");

 $app->get('/CreateQuestions','PlayerController:displayQuestionSpace')->setName('CreateQuestions');

 $app->post('/CreateQuestions' , function($request, $response, $args){
	$controller = $this['PlayerController'];
 	$quest=$controller->testCreateQuestions($request, $response, $args) ;
 })
 ->setname("testCreateQuestions");


 $app->get('/MyAccount','PlayerController:displayAccount')->setName('MyAccount');

$app->get('/Game/{id}/{dep}/{dir}',function($request, $response, $args){
	$controller=$this['GameController'];
	$controller->playerMove($request, $response, $args);
	$router = $this->router;
	return $response->withRedirect($router->pathFor('Game',["id" => $args['id']]));
})->setName('move');

$app->get('/newGame/{id}',function($request, $response, $args){
	$controller=$this['GameController'];
	$controller->newGame($request, $response, $args);
	$router = $this->router;
	return $response->withRedirect($router->pathFor('Game',["id" => $args['id']]));
})->setName('newGame');






$app->get('/De', function() {
	$acc = new DiceController();
	$acc->displayDice();
})->setName('De');

$app->get('/Camembert', function() {
	$acc = new CamembertController();
	$acc->displayCamembert();
})->setName('Camembert');




$app->run();