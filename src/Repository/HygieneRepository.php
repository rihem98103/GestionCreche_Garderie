<?php

namespace App\Repository;

use App\Entity\Hygiene;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hygiene|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hygiene|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hygiene[]    findAll()
 * @method Hygiene[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HygieneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hygiene::class);
    }

    // /**
    //  * @return Hygiene[] Returns an array of Hygiene objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hygiene
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
