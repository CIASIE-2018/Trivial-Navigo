<?php

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use trivial\controlleurs\AccueilControlleur;
use trivial\controlleurs\JeuControlleur;
use trivial\controlleurs\ConnexionControlleur;
use trivial\controlleurs\DemarerControlleur;
use trivial\controlleurs\RejoindreControlleur;
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
$app = new \Slim\App();

$app->get('/', function() {
	$acc = new AccueilControlleur();
	$acc->affichageAcc();
})->setName('Accueil');


$app->get('/plateau', function() {
	$acc = new jeuControlleur();
	$acc->initJeu();
	$acc->affichageJeu();
})->setName('plateau');

$app->get('/Connexion', function() {
	$acc = new ConnexionControlleur();
	$acc->affichageConnexion();
})->setName('Connexion');

$app->get('/Demarer', function() {

	$acc = new DemarerControlleur();
	$acc->affichageDemarer();
})->setName('Demarer');

$app->get('/Rejoindre', function() {

	$acc = new RejoindreControlleur();
	$acc->affichageRejoindre();
})->setName('Rejoindre');



$app->run();