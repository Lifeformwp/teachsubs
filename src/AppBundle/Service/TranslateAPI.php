<?php

namespace AppBundle\Service;


class TranslateAPI
{
    public function parse($transWord, $fromLng, $destLng)
    {

        $wordsAmount = explode(' ', $transWord);
        $jsonContent = array();
        foreach($wordsAmount as $word) {
            $glosbeLink = "https://glosbe.com/gapi/translate?from=".$fromLng."&dest=".$destLng."&format=json&phrase=".$word."&pretty=true";
            $array2 = json_decode(file_get_contents($glosbeLink), true);
            array_push($jsonContent, $array2);
        }

        return $jsonContent;
    }

}