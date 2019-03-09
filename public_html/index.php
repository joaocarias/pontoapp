<?php
session_start();

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

require '../vendor/autoload.php';

require '../config/constancts.php';
require '../config/config.php';

$app = new \Slim\App(['settings' => $config]);

$container = $app->getContainer();

$container['view'] = new \Slim\Views\PhpRenderer("../layout/");

require_once '..\App\routes.php';

$app->run();