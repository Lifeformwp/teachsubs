<?php

namespace AppBundle\Controller;

use AppBundle\Service\TranslateAPI;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class APIController extends Controller
{
    /**
     * @Route("/api/{transWord}/{fromLng}/{destLng}", name="trans_word")
     * @Method("GET")
     */
    public function getSingularTranslateAction($transWord, $fromLng, $destLng)
    {
        $transWord = strtolower($transWord);
        $transform = $this->get('app.translation_api');
        $transWord = $transform->parse($transWord, $fromLng, $destLng);
        $jsonWords= array();
        foreach($transWord as $key=>$item) {
            array_push($jsonWords, $transWord[$key]['tuc'][0]['phrase']);
            array_push($jsonWords, $transWord[$key]['tuc'][0]['meanings']);

        }
        return new JsonResponse($jsonWords);
    }

    public function getGoogleTranslationObject()
    {

    }

    /**
     * @Route("/apiltr/{transWord}/{fromLng}/{destLng}")
     * @Method("GET")
     */
    public function getTransltrTranslationObject($transWord, $fromLng, $destLng)
    {
        $glosbeLink = "http://www.transltr.org/api/translate?text=hi%20there&to=ru";
        $array2 = json_decode(file_get_contents($glosbeLink), true);
        return new JsonResponse($array2);
    }
}