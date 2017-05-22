<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Videos;
use Doctrine\ORM\EntityRepository;

class VideosRepository extends EntityRepository
{
    public function findAllPublishedOrderByCreatedAt()
    {
        /**
         * @return Videos[]
         */
        return $this->createQueryBuilder('videos')
            ->andWhere('videos.isPublished = :isPublished')
            ->setParameter('isPublished', 0)
            ->orderBy('videos.created_at', 'DESC')
            ->getQuery()
            ->execute();
    }

    public function findAllOrderByUpdatedAt()
    {
        /**
         * @return Videos[]
         */
        return $this->createQueryBuilder('videos')
            ->orderBy('videos.updated_at', 'DESC')
            ->getQuery()
            ->execute();
    }

    public function findAllOrderedByVideoNameForSeries()
    {
        return $this->createQueryBuilder('videos')
            ->orderBy('videos.name', 'ASC');

    }
}