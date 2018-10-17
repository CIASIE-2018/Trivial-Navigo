<?php

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use trivial\controllers\HomeController;
use trivial\controllers\ConnexionController;
use trivial\controllers\StartController;
use trivial\controllers\JoinController;
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

<<<<<<< HEAD

$app->get('/Game','GameController:renderNewBoard')->setName('Game');
=======
   $app->post('/Connexion' , function($request, $response, $args){
	var_dump("here");
	$acc = new ConnexionControlleur();
 	$acc->testConnexion() ;
 })
 ->setname("testConnexion");
  
>>>>>>> be97a12... Affichage primitif d'un Accueil personnalisé avec le système de Session

$app->get('/Connexion', function() {
	$acc = new ConnexionController();
	$acc->displayConnexion();
})->setName('Connexion');

$app->get('/Demarrer', function() {
	$acc = new StartController();
	$acc->displayStart();
})->setName('Demarrer');

$app->get('/Rejoindre', function() {

	$acc = new JoinController();
	$acc->displayJoin();
})->setName('Rejoindre');

$app->run();
