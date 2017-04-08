<?php
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 08/04/2017
 * Time: 07:32
 */

namespace BgFromScratch\Controller;


use BgFromScratch\Render\RenderView;
use BgFromScratch\Tools\BaseController\BaseController;

class PostController extends RenderView implements BaseController
{
    public function show($view){

        require self::render($view);

    }

    public function add($view){

        $renderView =  self::getRender();
        require $renderView->render($view);

    }

}