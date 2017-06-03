<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class TextFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        Fixtures::load(
            __DIR__.'/fixtures.yml',
            $manager,
            [
                'providers' => [$this]
            ]
        );
    }

    public function category()
    {
        $generic = [
            'Films',
            'TV-Series',
            'Anime',
            'Documentary',
        ];

        $key = array_rand($generic);

        return $generic[$key];
    }

    public function seriesNames()
    {
        $generic = [
            'Game of Thrones',
            'Split',
            'Black Mirror',
            'Twin Peaks',
            'Arrival',
            'The Green Mile',
            'Forrest Gump ',
            'The Shawshank Redemption',
            'Intouchables',
            'Inception',
            'The Lion King',
            'Interstellar',
            'Back to the Future'
        ];

        $key = array_rand($generic);

        return $generic[$key];
    }

    public function videosImg()
    {
        $generic = [
            '1.jpg',
            '2.jpg',
            '3.jpg',
            '4.jpg',
            '5.jpg',
            '6.jpg',
            '7.jpg',
            '9c2aa8a7c8fc3f20a347b3c5a596d732.jpeg'
        ];

        $key = array_rand($generic);

        return $generic[$key];
    }
}