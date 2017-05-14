<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Category;
use AppBundle\Form\CategoryFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin")
 */
class CategoryAdminController extends Controller
{
    /**
     * @Route("/categories", name="admin_categories_list")
     */
    public function indexAction()
    {
        $categories = $this->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findAllOrderedByCategoryName();

        return $this->render('admin/categories/list.html.twig', array(
            'categories' => $categories
        ));
    }

    /**
     * @Route("/categories/new", name="admin_categories_new")
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(CategoryFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            $this->addFlash('success', 'Category added');

            return $this->redirectToRoute('admin_categories_list');
        }

        return $this->render('admin/categories/new.html.twig', [
            'categoryForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/categories/{id}/edit", name="admin_categories_edit")
     */
    public function editAction(Request $request, Category $category)
    {
        $form = $this->createForm(CategoryFormType::class, $category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            $this->addFlash('success', 'Category updated');

            return $this->redirectToRoute('admin_categories_list');
        }

        return $this->render('admin/categories/edit.html.twig', [
            'categoryForm' => $form->createView(),
            'category' => $category
        ]);
    }

}