<?php
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 17/04/2017
 * Time: 23:32
 */

namespace BgFromScratch\Tools\Router;


class PathConstructor
{

    private $pathUrl = [];
    public static function pathConstructor($routing){

        try{

        foreach ($routing as $i => $item){
          if(isset($item['parameters'])){
              $pathUrl[] = '^\\'.$item['path'].'\/{0,1}\\'.$item['parameters'].'$';
          }
          else{
              $pathUrl[] = $item['path'];
          }

        }
        die(var_dump($routing));
        return $pathUrl;
        }
        catch (\Exception $exception){
            printf('Sorry we cannot create PathUrl !');
        }
    }

}