<?php

namespace App\Repository;

use App\Entity\GroupTag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GroupTag|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupTag|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupTag[]    findAll()
 * @method GroupTag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupTagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroupTag::class);
    }

    // /**
    //  * @return GroupTag[] Returns an array of GroupTag objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GroupTag
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
