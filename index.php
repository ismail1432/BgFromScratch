<?php
session_start();
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 30/03/2017
 * Time: 19:27
 */
use BgFromScratch\Tools\Router\Router;
use BgFromScratch\Controller\Controller;
use BgFromScratch\Tools\Router\LoadRouting;

require_once('vendor/autoload.php');

define('APP_ROOT', __DIR__);

$controller = new Controller();
$loadRouting = new LoadRouting();
$app = new Router($controller, $loadRouting);
$app->getRequest();