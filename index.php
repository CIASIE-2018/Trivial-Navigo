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

$app->get('/', function() {
	$acc = new HomeController();
	$acc->displayHome();
})->setName('Accueil');

$app->get('/Game/{id}','GameController:renderBoard')->setName('Game');
$app->get('/Game/{id}/{theme}','GameController:renderQuestion')->setName('Question');
$app->post('/SubmitQ', function($request, $response, $args) {
	$controller=$this['GameController'];
	$checkSubForm = $controller->checkSubmissionForm($request, $response, $args);
})->setName('SubmitQ');

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

$app->get('/CreateAccount', function() {
	$acc = new ConnexionController();
	$acc->CreateAccountView();
})->setName('CreateAccount');

$app->post('/CreateAccount', function($request, $response, $args){
	$acc = new ConnexionController();
	$acc->testCreationAccount(); 
  } )
  ->setName("testCreation");

  $app->get('/Connexion',function(){
	  $acc = new ConnexionController();
	  $acc->displayConnexion();
  })
  ->setName("Connexion");

   $app->post('/Connexion' , function($request, $response, $args){
	$acc = new ConnexionController();
 	$acc->testConnexion() ;
 })
 ->setname("testConnexion");
  
$app->get('/Deconnexion',function(){
	$acc = new ConnexionController();
	$acc->testDeconnexion();
})
->setName('Deconnexion');

$app->get('/MyAccount',function(){
	$acc = new PlayerController();
	$acc->displayAccount();
})
->setName('MyAccount');

$app->get('/CreateQuestions',function(){
	$acc = new PlayerController();
	$acc->displayQuestionSpace();
})
->setName('CreateQuestions');

$app->post('/CreateQuestions' , function($request, $response, $args){
	$acc = new PlayerController();
 	$acc->testCreateQuestions() ;
 })
 ->setname("testCreateQuestions");


$app->get('/Demarer', function() {
	$acc = new StartController();
	$acc->displayStart();
})->setName('Demarer');

$app->post('/Demarer' , function($request, $response, $args){
	$acc = new StartController();
 	$acc->testCreateSaloon() ;
 })
 ->setname("testCreateQuestions");

 $app->get('/Salon/{name}',function(){
	$acc = new StartController();
	$acc->displaySaloon();
 })->setName('Saloon');

$app->get('/Rejoindre', function() {

	$acc = new JoinController();
	$acc->displayJoin();
})->setName('Rejoindre');

$app->get('/Dice','DiceController:displayDice')->setName('Dice');

$app->get('/Camembert','CamembertController:displayCamembert')->setName('Camembert');

$app->get('/Supprimer', function($id) {

	// TEST DE PDO ET ELOQUENT : Connexion à BD établie et les requêtes fonctionnent.
	$acc = new HomeController();
	$acc->supprimer($id);
})->setName('Supprimer');


$app->run();