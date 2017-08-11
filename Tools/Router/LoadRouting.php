<?php
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 01/04/2017
 * Time: 08:37
 */

namespace BgFromScratch\Tools\Router;

use Symfony\Component\Yaml\Yaml;


class LoadRouting
{
    public $routing;

    public static function setRoutes()
    {
       return $value = Yaml::parse(file_get_contents(APP_ROOT.'/App/config/routing.yml'));
    }

    public static function getRoutes()
    {
        return self::setRoutes();
    }
}