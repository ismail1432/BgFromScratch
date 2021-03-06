<?php

/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 30/03/2017
 * Time: 19:27
 */
use BgFromScratch\Tools\Router\Router;
use BgFromScratch\Controller\Controller;
use BgFromScratch\Tools\Router\LoadRouting;
use \BgFromScratch\App\Database\DatabaseConnect;

//call composer autoload
require_once('vendor/autoload.php');

//define constant
define('APP_ROOT', __DIR__);

//Handle Error
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$controller = new Controller();
$loadRouting = new LoadRouting();

//Call Session after create LoadRouting to save it and avoid error

$a = new DatabaseConnect();
$app = new Router($loadRouting);
$app->getMethodController();