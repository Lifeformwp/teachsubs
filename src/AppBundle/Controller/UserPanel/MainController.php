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
     * @Route("/user", name="admin_categories_list")
     */
    public function indexAction()
    {
        $categories = $this->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findAllOrderedByCategoryName();

        return $this->render('user/show.html.twig', array(
        ));
    }

}