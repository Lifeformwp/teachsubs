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

    public function getTenRecentVideos()
    {
        return $this->createQueryBuilder('videos')
            ->andWhere('videos.isPublished = :isPublished')
            ->setParameter(':isPublished', 0)
            ->orderBy('videos.updated_at', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->execute();
    }

    public function getRecentFilms()
    {
        return $this->createQueryBuilder('videos')
            ->andWhere('videos.isPublished = :isPublished')
            ->setParameter(':isPublished', 0)
            ->andWhere('videos.category = :categoryName')
            ->setParameter(':categoryName', 209)
            ->orderBy('videos.updated_at', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->execute();
    }

    public function getRecentTVSeries()
    {
        return $this->createQueryBuilder('videos')
            ->andWhere('videos.isPublished = :isPublished')
            ->setParameter(':isPublished', 0)
            ->andWhere('videos.category = :categoryName')
            ->setParameter(':categoryName', 208)
            ->orderBy('videos.updated_at', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->execute();
    }

    public function getRecentAnimeVideos()
    {
        return $this->createQueryBuilder('videos')
            ->andWhere('videos.isPublished = :isPublished')
            ->setParameter(':isPublished', 0)
            ->andWhere('videos.category = :categoryName')
            ->setParameter(':categoryName', 207)
            ->orderBy('videos.updated_at', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->execute();
    }

    public function getRecentDocumentaryVideos()
    {
        return $this->createQueryBuilder('videos')
            ->andWhere('videos.isPublished = :isPublished')
            ->setParameter(':isPublished', 0)
            ->andWhere('videos.category = :categoryName')
            ->setParameter(':categoryName', 210)
            ->orderBy('videos.updated_at', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->execute();
    }

    public function getMostPopularVideos()
    {
        return $this->createQueryBuilder('videos')
            ->andWhere('videos.isPublished = :isPublished')
            ->setParameter(':isPublished', 0)
            ->orderBy('videos.views', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->execute();
    }
}