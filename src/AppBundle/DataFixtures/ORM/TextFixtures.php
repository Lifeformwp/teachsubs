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
            'Series',
            'Anime',
            'Documental',
            'Learning',
            'Courses',
            'Audiobooks',
            'Games',
            'Books',
            'Animation',
            'Videos',
            'Cookies',
            'Literature'
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
}