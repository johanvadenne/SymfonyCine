<?php

namespace App\Repository;

use App\Entity\CamilleLaChenille;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CamilleLaChenille>
 *
 * @method CamilleLaChenille|null find($id, $lockMode = null, $lockVersion = null)
 * @method CamilleLaChenille|null findOneBy(array $criteria, array $orderBy = null)
 * @method CamilleLaChenille[]    findAll()
 * @method CamilleLaChenille[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CamilleLaChenilleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CamilleLaChenille::class);
    }

//    /**
//     * @return CamilleLaChenille[] Returns an array of CamilleLaChenille objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CamilleLaChenille
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
