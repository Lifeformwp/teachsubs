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

}