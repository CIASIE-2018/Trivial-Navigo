<?php

require_once __DIR__ . '/vendor/autoload.php';
use trivial\controllers\GameController as GameController;

use trivial\controllers\ConnexionController as ConnexionController;
use trivial\controllers\StartController as StartController;
use trivial\controllers\HomeController as HomeController;
use trivial\controllers\JoinController as JoinController;
use trivial\controllers\PlayerController as PlayerController;

use trivial\controllers\DiceController as DiceController;

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$container = new \Slim\Container($configuration);
$container['GameController'] = function($c) {
	$view = $c->get("view");
	return new GameController($view);
};

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('src/views');

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container->get('router'), $basePath));

    return $view;
};


$container['ConnexionController'] = function ($c){
    $view = $c->get('view');
    return new ConnexionController($view);
};

$container['StartController'] = function ($c){
    $view = $c->get('view');
    return new StartController($view);
};

$container['HomeController'] = function ($c){
    $view = $c->get('view');
    return new HomeController($view);
};

$container['JoinController'] = function ($c){
    $view = $c->get('view');
    return new JoinController($view);
};

$container['PlayerController'] = function ($c){
    $view = $c->get('view');
    return new PlayerController($view);
};

$container['DiceController'] = function($c) {
	$viewDice = $c->get("view");
	return new DiceController($viewDice);

};

?>