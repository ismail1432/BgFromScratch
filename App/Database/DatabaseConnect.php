<?php
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 08/04/2017
 * Time: 12:17
 */

namespace BgFromScratch\App\Database;


class DatabaseConnect
{
    private static $db;
    private $databaseParams;

    public static function loadDatabaseParameters()
    {
        $routingPath = APP_ROOT.'/App/config/database.yml';
        if(!file_exists($routingPath)){
            throw new \Exception('Le fichier de routing n\'existe pas !');
        }
        else{
            $yamlRoutes = yaml_parse_file($routingPath);
        }
        if(empty($yamlRoutes)){
            throw new \Exception('Le fichier de routing est vide !');
        }
        else
            return $yamlRoutes;
    }

   public static function getDatabase()
   {

       if (self::$db === null) {
           $params = self::loadDatabaseParameters();

           $dsn = $params['dsn'].';'.$params['port'].';'.$params['dbname'].';'.$params['charset'];
          // die(var_dump($dsn));
           $user = $params['user'];
           $pswd = $params['password'];
           try {
              // $db = new PDO('mysql:host=127.0.0.1;port=8889;dbname=MyBlog;charset=utf8', 'root', 'root');
               $db = new \PDO($dsn, $user, $pswd);

           } catch (PDOException $e) {
               echo 'Connexion échouée : ' . $e->getMessage();
           }

           return $db;
       }
   }

}

