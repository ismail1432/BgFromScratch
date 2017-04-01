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


    public function getDatabase()
    {
        // TODO: Implement getDatabase() method.
    }

    public static function getRender()
    {
      return new RenderView();
    }

    public function home()
    {
        //call database...
        $view = 'home';
        $renderView =  self::getRender();
        include $renderView->render($view);

    }



}