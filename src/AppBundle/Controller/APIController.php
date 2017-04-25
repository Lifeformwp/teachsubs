<?php
/**
 * Created by PhpStorm.
 * User: serhii
 * Date: 23.04.17
 * Time: 22:12
 */

namespace AppBundle\Controller;

use AppBundle\Service\TranslateAPI;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
        $transform = $this->get('app.translation_api');
        $transWord = $transform->parse($transWord, $fromLng, $destLng);
        return new JsonResponse($transWord);
    }

}