<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Category;
use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{
    public function findAllOrderedByCategoryNameForVideos()
    {
        return $this->createQueryBuilder('category')
            ->orderBy('category.name', 'ASC');
    }

    public function findAllOrderedByCategoryName()
    {
        return $this->createQueryBuilder('category')
            ->orderBy('category.name', 'ASC')
            ->getQuery()
            ->execute();
    }
}