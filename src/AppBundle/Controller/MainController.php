<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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

//    /**
//     * @Route("/searh", name="search_list")
//     * @Method("POST")
//     */
//    public function searchAction(Request $request)
//    {
//        $searchWord = $request->request->get('q');
//
//        $em = $this->getDoctrine()
//            ->getManager();
//        $videos = $em->getRepository('AppBundle:Videos')
//            ->findByTitlePart($searchWord);
//
//        return $this->render('videos/search/list.html.twig', array(
//            'videos' => $videos,
//        ));
//
//    }

    /**
     * @Route("/search", name="search_list")
     * @Method("GET")
     */
    public function searhAction(Request $request)
    {
        $searchWord = $request->query->get('q');

        $em = $this->getDoctrine()
            ->getManager();
        $videos = $em->getRepository('AppBundle:Videos')
            ->findByTitlePart($searchWord);

        return $this->render('videos/search/list.html.twig', array(
            'videos' => $videos,
        ));

    }

    /**
     * @Route("/test")
     */
    public function testAction()
    {
        $test = file_get_contents('https://translate.google.so/translate_a/t?client=any_client_id_works&sl=auto&tl=ru&q=malentendants&tbb=1&ie=UTF-8&oe=UTF-8');
        dump($test);die;
    }
}