<?php

/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 29/03/2017
 * Time: 19:46
 */
namespace BgFromScratch\Controller;


use BgFromScratch\Tools\BaseController\BaseController;
use BgFromScratch\Render\RenderView;


class Controller extends BaseController
{
    protected $url;
    protected $renderView;
    protected $current;
    protected $get = array();
    protected $post = array();

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
    }


    public static function getRender()
    {
      return new RenderView();
    }

    public function getRequest()
    {
        $url = count(explode('&', $_SERVER['QUERY_STRING']));

        if (empty($this->get))
        {
            $view = 'home';
        }

        if(isset($_GET['post'])){

            $view = 'postDetail';
        }

        else
        {
            return die('here');
        }
        $renderView =  self::getRender();

        include $renderView->render($view);

    }

    public function getSession()
    {
        // TODO: Implement getRequest() method.
    }

    public function setSession()
    {
        // TODO: Implement getRequest() method.
    }
}