<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Videos;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
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
     * @Route("/videos")
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
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
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
