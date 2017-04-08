<?php
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 08/04/2017
 * Time: 07:33
 */

namespace BgFromScratch\Controller;


use BgFromScratch\Tools\BaseController\BaseController;

class CommentController implements BaseController
{
    public function add($view){

        $renderView =  self::getRender();
        require $renderView->render($view);

    }

}