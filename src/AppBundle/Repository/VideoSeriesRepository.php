<?php
/**
 * Created by PhpStorm.
 * User: serhii
 * Date: 08.05.17
 * Time: 15:45
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Videos;
use Doctrine\ORM\EntityRepository;

class VideoSeriesRepository extends EntityRepository
{
    public function findAllVideoSeries(Videos $videos)
    {
        $qb = $this->createQueryBuilder('series')
            ->select('COUNT(series)')
            ->andWhere('series.video = :videos')
            ->setParameter('videos', $videos);

        return $qb->getQuery()->getSingleScalarResult();
    }
}