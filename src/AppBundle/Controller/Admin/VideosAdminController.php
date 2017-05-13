<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Videos;
use AppBundle\Form\VideoFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin")
 */
class VideosAdminController extends Controller
{
    /**
     * @Route("/videos", name="admin_videos_list")
     */
    public function indexAction()
    {
        $videos = $this->getDoctrine()
            ->getRepository('AppBundle:Videos')
            ->findAll();

        return $this->render('admin/videos/list.html.twig', array(
            'videos' => $videos
        ));
    }

    /**
     * @Route("/videos/new", name="admin_videos_new")
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(VideoFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $video = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($video);
            $em->flush();

            $this->addFlash('success', 'Video created');

            return $this->redirectToRoute('admin_videos_list');
        }

        return $this->render('admin/videos/new.html.twig', [
            'videoForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/videos/{id}/edit", name="admin_videos_edit")
     */
    public function editAction(Request $request, Videos $video)
    {
        $form = $this->createForm(VideoFormType::class, $video);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $video = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($video);
            $em->flush();

            $this->addFlash('success', 'Video updated');

            return $this->redirectToRoute('admin_videos_list');
        }

        return $this->render('admin/videos/edit.html.twig', [
            'videoForm' => $form->createView()
        ]);
    }
}