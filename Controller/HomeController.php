<?php
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 08/04/2017
 * Time: 07:30
 */

namespace BgFromScratch\Controller;


use BgFromScratch\Entity\Article;
use BgFromScratch\Entity\ArticleManager;
use BgFromScratch\Entity\CommentManager;
use BgFromScratch\Render\RenderView;
use BgFromScratch\Validator\Validator;
use BgFromScratch\Tools\BaseController\BaseController;

class HomeController extends Controller implements BaseController
{
    public function home($view, $params)
    {
        $db = parent::databaseConnect();
        $articleManager = New ArticleManager($db);
        $page = $params;
        $posts = $articleManager->getArticlePagination($page);
        $totalPage = $articleManager->getTotalPagination();

        require parent::render($view);
    }

    public function showPost($view, $id)
    {
        if(isset($_POST) && !empty($_POST)){

            new Validator($_POST);

        }
        $db = parent::databaseConnect();
        $post = New ArticleManager($db);
        $post = $post->getArticle($id);
        $comments = New CommentManager($db);
        $comments = $comments->getComments($id);

        require parent::render($view);
    }


    public function add($view)
    {
        if(isset($_POST)){
            $checkValidComment = new Validator($_POST);
        }
        else{
            throw new \Exception('Oups we got a problem !!');
        }
    }
}