<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Videos;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class VideoHandlingController extends Controller
{
    /**
     * @Route("/video/{id}", name="video_show")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $video = $em->getRepository('AppBundle:Videos')
            ->findOneBy(['id' => $id]);

        if(!$video) {
            throw $this->createNotFoundException('Not found');
        }

        foreach($video->getCourse() as $course) {
            $series[] = [
                'id' => $course->getId(),
                'seriesName' => $course->getName(),
                'backgroundImg' => '/uploads/background/'.$video->getBackground(),
                'engSub' => $course->getEnSub(),
                'date' => $course->getCreatedAt()->format('M d, Y')
            ];
        }

        $seriesCount = $em->getRepository('AppBundle:VideoSeries')->findAllVideoSeries($video);
        return $this->render('video/show.html.twig', [
            'video' => $video,
            'seriesCount' => $seriesCount,
            'seriesSymfony' => $series,
        ]);
    }

    /**
     * @Route("/videos", name="show_all_videos")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $videos = $em->getRepository('AppBundle:Videos')
            ->findAllPublishedOrderByCreatedAt();

        return $this->render('video/list.html.twig', [
            'videos' => $videos,
        ]);
    }

    /**
     * @Route("/video/{name}/notes", name="video_show_notes")
     * @Method("GET")
     */
    public function getSeriesAction(Videos $videos)
    {
        $series = [];
        foreach($videos->getCourse() as $course) {
            $series[] = [
                'id' => $course->getId(),
                'username' => $course->getName(),
                'avatarUri' => '/uploads/background/'.$videos->getBackground(),
                'note' => $course->getEnglishSub(),
                'date' => $course->getCreatedAt()->format('M d, Y')
            ];
        }

        $data = [
            'notes' => $series,
        ];

        return new JsonResponse($data);
    }
}
