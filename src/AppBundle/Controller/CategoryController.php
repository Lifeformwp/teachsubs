<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    /**
     * @Route("/category/{id}", name="list_category")
     */
    public function showAction($id) {
        $films = $this->getDoctrine()
            ->getRepository('AppBundle:Videos')
            ->findBy(['category' => $id]);
        $category =  $this->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findOneBy(['id' => $id]);

        return $this->render('category/list.html.twig', array(
            'videos' => $films,
            'category' => $category
        ));
    }
}