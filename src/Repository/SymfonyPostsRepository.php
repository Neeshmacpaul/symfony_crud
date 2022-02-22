<?php

namespace App\Repository;

use App\Entity\SymfonyPosts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SymfonyPosts|null find($id, $lockMode = null, $lockVersion = null)
 * @method SymfonyPosts|null findOneBy(array $criteria, array $orderBy = null)
 * @method SymfonyPosts[]    findAll()
 * @method SymfonyPosts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SymfonyPostsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SymfonyPosts::class);
    }

    // /**
    //  * @return SymfonyPosts[] Returns an array of SymfonyPosts objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SymfonyPosts
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
