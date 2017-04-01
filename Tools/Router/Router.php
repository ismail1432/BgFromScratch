<?php
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 01/04/2017
 * Time: 08:34
 */

namespace BgFromScratch\Tools\Router;

use BgFromScratch\Controller\Controller;
use BgFromScratch\Tools\LoadRouting;


class Router
{
    protected $action;
    protected $url;
    protected $routing;


    function __construct(Controller $controller, LoadRouting $loadRouting)
    {
        $this->controller = new Controller();
        if(empty ($_SESSION['routing'])){

            $this->routing = New LoadRouting();
            $_SESSION['routing'] = $this->routing;
        }
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

        $method = $_SESSION['routing'][$action]['controller'];

        return $this->controller->$method;

    }

}