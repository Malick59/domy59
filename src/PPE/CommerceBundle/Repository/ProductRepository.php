<?php

namespace PPE\CommerceBundle\Repository;

use Doctrine\ORM\EntityRepository;
/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository
{
    public function byCategory($category){

        $qb = $this->createQueryBuilder('a')
                    ->select('a')
                    ->where('a.category = :category')
                    ->orderBy('a.id')
                    ->setParameter(':category', $category);
        return $qb->getQuery()->getResult();
    }

    public function bySearch($search){

        $qb = $this->createQueryBuilder('s')
            ->select('s')
            ->where('s.name like :search')
            ->orderBy('s.id')
            ->setParameter(':search', $search);
        return $qb->getQuery()->getResult();
    }

    public function findArray($array){

        $qb = $this->createQueryBuilder('f')
            ->select('f')
            ->where ('f.id IN (:array)')
            ->setParameter('array', $array);

        return $qb->getQuery()->getResult();
    }
}
