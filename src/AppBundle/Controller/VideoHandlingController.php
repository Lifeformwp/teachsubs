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
     * @Route("/video/{videoName}", name="video_show")
     */
    public function showAction($videoName)
    {
        $em = $this->getDoctrine()->getManager();
        $video = $em->getRepository('AppBundle:Videos')
            ->findOneBy(['name' => $videoName]);

        if(!$video) {
            throw $this->createNotFoundException('Not found');
        }

        $seriesCount = $em->getRepository('AppBundle:VideoSeries')->findAllVideoSeries($video);
        return $this->render('video/show.html.twig', [
            'video' => $video,
            'seriesCount' => $seriesCount,
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
                'avatarUri' => '/images/leanna.jpeg',
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
