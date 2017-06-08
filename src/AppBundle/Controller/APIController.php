<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Service\TranslateAPI;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
        /*
        $sample = array('describe', 'all', 'hearing', 'music');
        $simple = array('captions', 'relevant', 'audio', 'for');
        if(in_array($transWord, $sample)) {
            $jsonWords = array(
                'text' => 'привет мир'
            );
        } else if(in_array($transWord, $simple)) {
            $jsonWords = array(
                'text' => 'второй вариант привет мир'
            );
        }
        */
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
        $glosbeLink = "http://www.transltr.org/api/translate?text=hello%20world&to=ru";
        $array2 = json_decode(file_get_contents($glosbeLink), true);
        return new JsonResponse($array2);
    }

    /**
     * @Route("/saveWord")
     * @Method("POST")
     */
    public function getSavedWordsData(Request $request)
    {
        $requestContent = $request->getContent();
        if ($requestContent) {
            $word = json_decode($requestContent);
            $outputContent = array(
                'text' => $word->{'word'}
                );
            //$usr = $this->get('security.token_storage')->getToken()->getUser();
            //$userId = $usr->getId();
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('AppBundle:User')
                ->findOneBy(['id' => $word->{'id'}]);

            $savedWords = $user->getSavedWords();
            $savedWords[] = $word->{'word'};
            $user->setSavedWords($savedWords);
            $em->persist($user);
            $em->flush();
        } else {
            $outputContent = null;
        }
        return new JsonResponse($outputContent);
    }
}