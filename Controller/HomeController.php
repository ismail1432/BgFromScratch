<?php
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 08/04/2017
 * Time: 07:30
 */

namespace BgFromScratch\Controller;


use BgFromScratch\Render\RenderView;
use BgFromScratch\Tools\BaseController\BaseController;

class HomeController extends RenderView implements BaseController
{

    public function home($view)
    {

        require self::render($view);

    }

    public function add($view)
    {
        // TODO: Implement add() method.
    }
}