<?php

require_once __DIR__ . '/vendor/autoload.php';

use trivial\controllers\GameController as GameController;
use trivial\controllers\ConnectionController as ConnectionController;
use trivial\controllers\SaloonController as SaloonController;
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

$container['ConnectionController'] = function ($c){
    $view = $c->get('view');
    return new ConnectionController($view);
};

$container['HomeController'] = function ($c){
    $view = $c->get('view');
    return new HomeController($view);
};

$container['SaloonController'] = function ($c){
    $view = $c->get('view');
    return new SaloonController($view);
};

$container['PlayerController'] = function ($c){
    $view = $c->get('view');
    return new PlayerController($view);
};

?>