<?php

namespace AppBundle\Controller\UserPanel;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    /**
     * @Security("is_granted('ROLE_USER_PANEL')")
     * @Route("/user", name="user_panel")
     */
    public function indexAction()
    {
        $usr = $this->get('security.token_storage')->getToken()->getUser();
        $userId = $usr->getId();
        $usr = $this->get('security.token_storage')->getToken()->getUser();
        $user12 = $usr;
        $user1 = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findOneBy(['id' => $userId]);
        //$user12 = $user->getId();
        return $this->render('user/show.html.twig', array(
            'user' => $user12
        ));
    }

}