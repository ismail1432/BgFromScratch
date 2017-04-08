<?php
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 08/04/2017
 * Time: 13:06
 */

namespace BgFromScratch\Controller;


class CreateController
{
    public static function createController($controllerAction)
    {
        $controllerAction = '\BgFromScratch\Controller\\'.$controllerAction.'Controller';
        return new $controllerAction;
    }
}