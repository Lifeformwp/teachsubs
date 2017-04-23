<?php
/**
 * Created by PhpStorm.
 * User: serhii
 * Date: 23.04.17
 * Time: 22:12
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class APIController
{
    /**
     * @Route("/api/{transWord}/{fromLng}/{destLng}", name="trans_word")
     * @Method("GET")
     */
    public function getSingularTranslateAction($transWord, $fromLng, $destLng)
    {
        $glosbeLink = "https://glosbe.com/gapi/translate?from=".$fromLng."&dest=".$destLng."&format=json&phrase=".$transWord."&pretty=true";
        $jsonContent = json_decode(file_get_contents($glosbeLink));
        return new JsonResponse($jsonContent);
    }

}