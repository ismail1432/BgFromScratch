<?php
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 08/04/2017
 * Time: 12:16
 */

namespace BgFromScratch\Entity\Manager;

use \PDO as PDO;
use BgFromScratch\Entity\Article;

/**
 * Class ArticleManager
 * @package BgFromScratch\Entity
 */
class ArticleManager extends AbstractEntityManager
{

    protected $_db;
    protected $entity;
    //define Constant
    const MESSAGEPARPAGE = 5;

    public function __construct($_db){
        $this->_db = $_db;
        $this->entity = Article::class;
    }

    /**
     * @return mixed
     */
    public function getAll(){
        $req = $this->_db->query('SELECT * FROM article');
        $datas = $req->fetchAll(PDO::FETCH_CLASS,  $this->entity);
        return $datas;
    }

    /**
     * @return mixed
     */
    public function getFiveLast(){
        $req = $this->_db->query('SELECT * FROM article ORDER BY ID desc LIMIT 5');

        $datas = $req->fetchAll(PDO::FETCH_CLASS);
        return $datas;
    }

    public function getArticlePagination($page)
    {
        $page = ($page * 5) - 5;
        $numbers = self::MESSAGEPARPAGE;
        $req = $this->_db->query("SELECT * FROM article ORDER BY ID LIMIT $page, $numbers");
        $datas = $req->fetchAll(PDO::FETCH_CLASS,  $this->entity);

        return $datas;
    }

    public function getTotalPagination(){
        $req = $this->_db->query('SELECT COUNT(*) AS total FROM article');

        $datas = $req->fetch();

        $total = $datas['total'];

        return ($total!=0) ? ceil($total/self::MESSAGEPARPAGE): 1;

      //to do get result NOT enought time

    }

    public function getArticle($id){
        $req = $this->_db->query('SELECT * FROM article WHERE id = '.$id);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS ,__NAMESPACE__ . '\\Article');
        $datas = $req->fetch();
        return $datas;
    }
    public function add(Article $article){
        $req = $this->_db->prepare('INSERT INTO article(auteur, titre, contenu, extrait, date_article) VALUES(:auteur, :titre, :contenu, :extrait, NOW())');
        //$q->bindValue(':id', $perso->id(), PDO::PARAM_INT);
        $req->bindValue(':auteur', $article->getAuteur());
        $req->bindValue(':titre', $article->getTitre());
        $req->bindValue(':contenu', $article->getContenu());
        $req->bindValue(':extrait', $article->getExtrait());
        $req->execute();
    }
    public function update(Article $article){
        $req = $this->getDatabase()->prepare('UPDATE article(id, auteur, titre, contenu, date_article) VALUES(:id, :auteur, :titre, :contenu, NOW()) WHERE id = '.$id);
        $q->bindValue(':id', $this->id(), PDO::PARAM_INT);
        $req->bindValue(':auteur', $article->getAuteur());
        $req->bindValue(':titre', $article->getTitre());
        $req->bindValue(':contenu', $article->getContenu());
        $req->bindValue(':date_article', $article->getDate_article());
        $req->execute();
    }
    public function delete($id)
    {
        $id = (int) $id;

        $requete = $this->getDatabase()->prepare('DELETE FROM news WHERE id = ?');

        $requete->bind_param('i', $id);

        $requete->execute();
    }
    public function total(){
        $req = $this->getDatabase()->query('SELECT COUNT(*) AS total FROM article');
        $data = $req->fetch();
        return $data['total'];
    }

}