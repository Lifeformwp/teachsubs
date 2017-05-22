<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\VideoSeries;
use AppBundle\Form\VideoSeriesFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Security("is_granted('ROLE_MANAGE_SERIES')")
 * @Route("/admin")
 */
class SeriesAdminController extends Controller
{
    /**
     * @Route("/series", name="admin_series_list")
     */
    public function indexAction()
    {
        $series = $this->getDoctrine()
            ->getRepository('AppBundle:VideoSeries')
            ->findAllOrderByUpdatedAt();

        return $this->render('admin/series/list.html.twig', array(
            'series' => $series
        ));
    }

    /**
     * @Route("/series/new", name="admin_series_new")
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(VideoSeriesFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $series = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($series);
            $em->flush();

            $this->addFlash('success', 'Series added');

            return $this->redirectToRoute('admin_series_list');
        }

        return $this->render('admin/series/new.html.twig', [
            'seriesForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/series/{id}/edit", name="admin_series_edit")
     */
    public function editAction(Request $request, VideoSeries $series)
    {
        $form = $this->createForm(VideoSeriesFormType::class, $series);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $series = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($series);
            $em->flush();

            $this->addFlash('success', 'Series updated');

            return $this->redirectToRoute('admin_series_list');
        }

        return $this->render('admin/series/edit.html.twig', [
            'seriesForm' => $form->createView(),
            'series' => $series
        ]);
    }
}