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
class Validator
{
    function __construct(Array $datas)
    {

            $this->isEmpty($datas['auteur']);
            $this->isEmpty($datas['content']);
            $this->isCommentTooShort($datas['content']);
            $this->isPseudoTooShort($datas['auteur']);
            $this->isPseudoLetters($datas['auteur']);
    }

    public function isEmpty($value){
        if(empty($value)){
            return 'Veuillez remplir tous les champs ! ';
        }
    }

    public function isPseudoTooShort($value){
        if(strlen($value) < 3){
            return 'Le pseudo est trop court, il faut 3 caractères minimum';
        }
    }

    public function isCommentTooShort($value){
        if(strlen($value) < 10){
            return 'Le commentaire est trop court il faut 10 caractères minimum';
        }
        if(strlen($value) > 150){
            return 'Le commentaire est trop long il faut 150 caractères minimum';
        }
    }

    public function isPseudoLetters($value){
        if(preg_match("^[\s]+$",$value)){
            return 'Le pseudo ne peut pas contenir d\'espace !';
        }
        if(preg_match("^[\d]+$", $value)){
            return 'Le pseudo ne peut pas contenir que des chiffres !';
        }
    }

}