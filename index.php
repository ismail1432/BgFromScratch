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

//call composer autoload
require_once('vendor/autoload.php');

//define constant
define('APP_ROOT', __DIR__);

$controller = new Controller();
$loadRouting = new LoadRouting();

//Call Session after create LoadRouting to save it and avoid error
session_start();
$app = new Router($loadRouting);
$app->getRequest();