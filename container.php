<?php

require_once __DIR__ . '/vendor/autoload.php';
use trivial\controllers\GameController as GameController;

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

?>