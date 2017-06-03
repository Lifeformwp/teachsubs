<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $recentVideos = $this->getDoctrine()
            ->getRepository('AppBundle:Videos')
            ->getTenRecentVideos();


        $recentFilms = $this->getDoctrine()
            ->getRepository('AppBundle:Videos')
            ->getRecentFilms();

        $recentTVSeries = $this->getDoctrine()
            ->getRepository('AppBundle:Videos')
            ->getRecentTVSeries();

        $recentAnime = $this->getDoctrine()
            ->getRepository('AppBundle:Videos')
            ->getRecentAnimeVideos();

        $recentDocumentary = $this->getDoctrine()
            ->getRepository('AppBundle:Videos')
            ->getRecentDocumentaryVideos();

        $mostPopular = $this->getDoctrine()
            ->getRepository('AppBundle:Videos')
            ->getMostPopularVideos();

        // replace this example code with whatever you need
        return $this->render('main/homepage.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'recentVideos' => $recentVideos,
            'recentFilms' => $recentFilms,
            'recentTVSeries' => $recentTVSeries,
            'recentAnime' => $recentAnime,
            'recentDocumentary' => $recentDocumentary,
            'mostPopular' => $mostPopular
        ]);
    }


}