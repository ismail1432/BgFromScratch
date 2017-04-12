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
        $url = $_SERVER['REQUEST_URI'];

        //Just for String QUERY in Dev env
        return substr($url, 24);
    }

    public function getRequest()
    {
        $url = $this->getUrl();

        if (preg_match("/^\/blog$/", $url))
        {
            $action = 'home';
            return $action;
        }

        if (preg_match("/^\/post\.php\?id=[1-9]+$/", $url))
        {
            parse_str($_SERVER['QUERY_STRING'], $output);
            $id = $output['id'];
            $action = 'showPost';
            return ['id' => $id, 'action' => $action];

        }

        if (preg_match("#/add#", $url))
        {
            $action = 'show';
        }
       // die('here');

    }

    public function getMethodController(){

        $request = $this->getRequest();
        $action = $request;
      //  die(var_dump($request));

        if(is_array($request)){
            $action = $request['action'];
            $id = $request['id'];
            $method = $_SESSION['routing'][$action]['action'];
            $controller = $_SESSION['routing'][$action]['controller'];
            $view = $_SESSION['routing'][$action]['view'];
            $controllerAction = CreateController::createController($controller);

            return $controllerAction->$method($view, $id);
        }

        else{
            $method = $_SESSION['routing'][$request]['action'];
            $controller = $_SESSION['routing'][$request]['controller'];
            $view = $_SESSION['routing'][$action]['view'];
            $controllerAction = CreateController::createController($controller);

            return $controllerAction->$method($view);
        }
        //Recupere le controller et la methode selon le controller


    }

}