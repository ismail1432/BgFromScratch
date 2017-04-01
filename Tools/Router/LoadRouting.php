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

    function __construct()
    {
       $routing = yaml_parse_file(__DIR__.'/App/config/routing.yml');
       return $routing;

    }

}