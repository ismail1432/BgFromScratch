<?php
/**
 * Created by PhpStorm.
 * User: ismail
 * Date: 28/04/2017
 * Time: 22:58
 */

use BgFromScratch\Validator\Validator;


class CountTest extends PHPUnit_Framework_TestCase
{
    public function testIsPseudoLetters()
    {
        $emptyValue = " ";
        $numberValue = 1111;
        $fixtures = ['auteur'=> 'Smaine', 'content' => 'Super article ! Merci beaucoup'];
        $validator = new Validator($fixtures);

        $resultIsPseudoLetters = $validator->isPseudoLetters($emptyValue);
        $this->assertCount(1, $resultIsPseudoLetters);

    }
}
