<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 11/08/2017
 * Time: 07:36
 */

namespace BgFromScratch\Tools\Session;


interface SessionInterface
{
    public function start();

    public function clear();

    public function set($key,$value);

    public function get($key);
}