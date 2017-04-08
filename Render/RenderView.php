<?php

/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 31/03/2017
 * Time: 08:22
 */

namespace BgFromScratch\Render;

class RenderView
{

    public static function render($view, array $options = null){

        return APP_ROOT.'/public/views/'.$view.'.phtml';

}

}