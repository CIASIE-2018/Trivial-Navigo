<?php

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use trivial\controllers\HomeController;
use trivial\controllers\ConnexionController;
use trivial\controllers\StartController;
use trivial\controllers\JoinController;
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
	$acc = new AccueilControlleur();
	$acc->affichageAcc();
})->setName('Accueil');

$app->get('/Game/{id}','GameController:renderBoard')->setName('Game');

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

$app->get('/Demarer', function() {
	$acc = new StartController();
	$acc->displayStart();
})->setName('Demarer');

$app->get('/Rejoindre', function() {

	$acc = new RejoindreControlleur();
	$acc->affichageRejoindre();
})->setName('Rejoindre');

$app->get('/De', function() {
	$acc = new DiceController();
	$acc->displayDice();
})->setName('De');

$app->get('/Camembert', function() {
	$acc = new CamembertController();
	$acc->displayCamembert();
})->setName('Camembert');

$app->get('/Supprimer', function($id) {

	// TEST DE PDO ET ELOQUENT : Connexion à BD établie et les requêtes fonctionnent.
	$acc = new HomeController();
	$acc->supprimer($id);
})->setName('Supprimer');


$app->run();