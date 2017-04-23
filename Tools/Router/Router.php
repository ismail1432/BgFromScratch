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
        $this->pathUrl = PathConstructor::pathConstructor($this->routing);

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

        foreach ($this->pathUrl as $item => $value){
            //echo $item;echo '<br>';

            if (preg_match("/$item/", $url, $params))
            {
                $index = strlen($_SESSION['routing'][$value]['path']);
                $action = $value;
                $params =  substr($url, $index +1);

                return ['params' => $params, 'action' => $value];
            }
        }
        throw new \ErrorException('No Routes for URL'.$url);
        exit;
       // die('here');
       // ^\/post\/{0,1}\d*$
       /* if (preg_match("/^\/post\.php\?id=[1-9]+$/", $url))
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
*/
    }

    public function getMethodController(){

        $request = $this->getRequest();
        $action = $request;

        if(is_array($request)){
            $action = $request['action'];
            $params = $request['params'];
            $method = $_SESSION['routing'][$action]['action'];
            $controller = $_SESSION['routing'][$action]['controller'];
            $view = $_SESSION['routing'][$action]['view'];
            $controllerAction = CreateController::createController($controller);

            return $controllerAction->$method($view, $params);
        }
/*
        else{
            $method = $_SESSION['routing'][$request]['action'];
            $controller = $_SESSION['routing'][$request]['controller'];
            $view = $_SESSION['routing'][$action]['view'];
            $controllerAction = CreateController::createController($controller);

            return $controllerAction->$method($view);
        }
*/
        //Recupere le controller et la methode selon le controller


    }

}