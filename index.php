<?php

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use trivial\controlleurs\AccueilControlleur;
use trivial\controlleurs\JeuControlleur;

#$tab = parse_ini_file('src/conf/conf.ini');
#$db = new DB();
#$db->addConnection($tab);
#$db->setAsGlobal();
#$db->bootEloquent(); 

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

$app->run();