<?php
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 01/04/2017
 * Time: 08:34
 */

namespace BgFromScratch\Tools\Router;

use BgFromScratch\Controller\Controller;
use BgFromScratch\Controller\CreateController;


class Router
{
    protected $action;
    protected $url;
    protected $routing;


    function __construct(LoadRouting $loadRouting)
    {
        $this->routing = LoadRouting::getRoutes();
        $_SESSION['routing'] = $this->routing;
    }

    public function getUrl()
    {
        return  $url = $_SERVER['REQUEST_URI'];
    }

    public function getRequest()
    {
        $url = $this->getUrl();

        if (preg_match("#/#", $url))
        {
            $action = 'home';
        }

        if (preg_match("#/show#", $url))
        {
            $action = 'show';
        }

        if (preg_match("#/add#", $url))
        {
            $action = 'show';
        }

        //Recupere le controller et la methode selon le controller
        $method = $_SESSION['routing'][$action]['action'];
        $controller = $_SESSION['routing'][$action]['controller'];
        $view = $_SESSION['routing'][$action]['view'];
        $controllerAction = CreateController::createController($controller);

        return $controllerAction->$method($view);

    }

}