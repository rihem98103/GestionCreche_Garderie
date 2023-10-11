<?php

namespace App\Repository;

use App\Entity\Siestes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Siestes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Siestes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Siestes[]    findAll()
 * @method Siestes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SiestesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Siestes::class);
    }

    // /**
    //  * @return Siestes[] Returns an array of Siestes objects
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
    public function findOneBySomeField($value): ?Siestes
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
