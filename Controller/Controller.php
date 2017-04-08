<?php

/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 29/03/2017
 * Time: 19:46
 */
namespace BgFromScratch\Controller;

use BgFromScratch\App\Database\DatabaseConnect;
use BgFromScratch\Render\RenderView;


class Controller
{
    public function databaseConnect(){

        return $db = DatabaseConnect::getDatabase();
    }

    public function render($view){
        return RenderView::render($view);

    }


}