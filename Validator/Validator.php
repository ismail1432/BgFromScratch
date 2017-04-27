<?php
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 23/04/2017
 * Time: 19:30
 */

namespace BgFromScratch\Validator;


/**
 * Class Validator
 * @package BgFromScratch\Validator
 */
class  Validator
{
    public  $errorTabs = [];

    function __construct(Array $datas)
    {
            $this->isEmpty($datas['auteur']);
            $this->isEmpty($datas['content']);
            $this->isCommentTooShort($datas['content']);
            $this->isPseudoTooShort($datas['auteur']);
            $this->isPseudoLetters($datas['auteur']);
            $this->isCommentLetters($datas['content']);
    }

    public function isEmpty($value){
        if(empty($value)){
             $this->errorTabs[] = 'Veuillez remplir tous les champs !';
        }
        return $this->errorTabs;

    }

    public function isPseudoTooShort($value){

        if(is_numeric($value)){
            $this->errorTabs[] = 'Le pseudo ne peut contenir que des chiffres !';
        }
        if(strlen($value) < 3){
              $this->errorTabs[] = 'Le pseudo est trop court, il faut 3 caractères minimum';
        }
        return $this->errorTabs;

    }

    public function isCommentTooShort($value){
        if(is_numeric($value)){
            $this->errorTabs[] = 'Le commentaire ne peut pas contenir que des chiffres !';
        }
        if(strlen($value) < 10){
             $this->errorTabs[] = 'Le commentaire est trop court il faut 10 caractères minimum';
        }
        if(strlen($value) > 150){
             $this->errorTabs[] = 'Le commentaire est trop long il faut 150 caractères minimum';
        }
        return $this->errorTabs;

    }

    public function isPseudoLetters($value){
        if(preg_match("/^[\s]+$/",$value)){
             $this->errorTabs[]  = 'Le pseudo ne peut pas contenir d\'espace !';
        }
        if(preg_match("/^[\d]+$/", $value)){
            $this->errorTabs[]   = 'Le pseudo ne peut pas contenir que des chiffres !';
        }
        return $this->errorTabs;
    }

    public function isCommentLetters($value){
        if(preg_match("/^[\s]+$/",$value)){
            $this->errorTabs[]  = 'Le commentaire ne peut pas contenir que des espaces !';
        }
        if(preg_match("/^[\d]+$/", $value)){
            $this->errorTabs[]   = 'Le commentaire ne peut pas contenir que des chiffres !';
        }
        return $this->errorTabs;
    }

    public function getErrorTabs(){
        return $this->errorTabs;
    }

}