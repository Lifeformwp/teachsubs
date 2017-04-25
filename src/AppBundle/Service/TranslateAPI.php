<?php
/**
 * Created by PhpStorm.
 * User: serhii
 * Date: 25.04.17
 * Time: 23:23
 */

namespace AppBundle\Service;


class TranslateAPI
{
    public function parse($transWord, $fromLng, $destLng)
    {
        $glosbeLink = "https://glosbe.com/gapi/translate?from=".$fromLng."&dest=".$destLng."&format=json&phrase=".$transWord."&pretty=true";
        $jsonContent = json_decode(file_get_contents($glosbeLink));
        return $jsonContent;
    }

}