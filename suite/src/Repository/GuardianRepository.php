<?php

namespace App\Repository;

use App\Entity\Guardian;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Guardian|null find($id, $lockMode = null, $lockVersion = null)
 * @method Guardian|null findOneBy(array $criteria, array $orderBy = null)
 * @method Guardian[]    findAll()
 * @method Guardian[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuardianRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Guardian::class);
    }

    // /**
    //  * @return Guardian[] Returns an array of Guardian objects
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
    public function findOneBySomeField($value): ?Guardian
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
