<?php
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 08/04/2017
 * Time: 07:30
 */

namespace BgFromScratch\Controller;


use BgFromScratch\Entity\ArticleManager;
use BgFromScratch\Render\RenderView;
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
        $db = parent::databaseConnect();
        $post = New ArticleManager($db);
        $post = $post->getArticle($id);
        require parent::render($view);
    }



    public function add($view)
    {
        // TODO: Implement add() method.
    }
}