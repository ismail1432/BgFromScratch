<?php

/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 29/03/2017
 * Time: 19:46
 */
namespace BgFromScratch\Controller;

use BgFromScratch\Render\RenderView;


class Controller
{
    public static function createController($controllerAction)
    {
        $controllerAction = '\BgFromScratch\Controller\\'.$controllerAction.'Controller';
        return new $controllerAction;
    }


}