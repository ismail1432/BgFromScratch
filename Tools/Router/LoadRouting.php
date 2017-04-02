<?php
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 01/04/2017
 * Time: 08:37
 */

namespace BgFromScratch\Tools\Router;


class LoadRouting
{
    public $routing;

    public static function setRoutes()
    {
       return yaml_parse_file(APP_ROOT.'/App/config/routing.yml');

    }

    public static function getRoutes()
    {
        return self::setRoutes();
    }
}