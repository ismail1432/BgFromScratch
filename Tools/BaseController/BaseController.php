<?php
namespace BgFromScratch\Tools\BaseController;

/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 30/03/2017
 * Time: 19:26
 */
abstract class BaseController
{
    public function __construct()
    {

    }

    abstract static function getRender();
    abstract protected function getDatabase();




}