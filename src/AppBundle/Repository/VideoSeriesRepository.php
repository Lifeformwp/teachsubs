<?php
/**
 * Created by PhpStorm.
 * User: serhii
 * Date: 08.05.17
 * Time: 15:45
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Videos;
use AppBundle\Entity\VideoSeries;
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

    public function findRelatedVideoSeries(Videos $videos)
    {
        return $this->createQueryBuilder('series')
            ->andWhere('series.video = :videos')
            ->setParameter('videos', $videos)
            ->orderBy('series.created_at', 'DESC')
            ->getQuery()
            ->execute();
    }

    public function findAllOrderByUpdatedAt()
    {
        /**
         * @return VideoSeries[]
         */
        return $this->createQueryBuilder('series')
            ->orderBy('series.updated_at','DESC')
            ->getQuery()
            ->execute();
    }
}