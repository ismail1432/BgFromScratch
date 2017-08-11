<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 11/08/2017
 * Time: 07:26
 */

namespace BgFromScratch\Tools\Session;


class Session implements SessionInterface
{
    public function __construct()
    {
        $this->start();
    }

    public function start()
    {
        session_start();

        if (!session_start()) {
            throw new \RuntimeException('Can\'t start the session :-(');
        }
        return;
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        if(empty($_SESSION[$key])){
            throw new \RuntimeException("$key does not exist !");
        }
        return $_SESSION[$key];
    }

    public function clear()
    {
        session_destroy();
    }


}