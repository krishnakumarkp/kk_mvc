<?php
define('WEBROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("public/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require(ROOT . 'Application/Core/Request.php');
require(ROOT . 'Application/Core/Router.php');
require(ROOT . 'Application/Core/Dispatcher.php');
require(ROOT . 'Application/Core/Template.php');
require(ROOT . 'Application/Core/Model.php');

$request = new request();
$dispatcher = new Dispatcher();
$dispatcher->dispatch($request);

