<?php

namespace App\Repository;

use App\Entity\Jop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Jop|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jop|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jop[]    findAll()
 * @method Jop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JopRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Jop::class);
    }

    // /**
    //  * @return Jop[] Returns an array of Jop objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Jop
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
