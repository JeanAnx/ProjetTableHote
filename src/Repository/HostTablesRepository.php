<?php

namespace App\Repository;

use App\Entity\HostTables;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HostTables|null find($id, $lockMode = null, $lockVersion = null)
 * @method HostTables|null findOneBy(array $criteria, array $orderBy = null)
 * @method HostTables[]    findAll()
 * @method HostTables[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HostTablesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HostTables::class);
    }

    public function findSuggest(HostTables $actualTable)
    {
        return $this->createQueryBuilder('hostTable')
            ->andWhere('hostTable.id != :actualTable')
            ->setParameter('actualTable', $actualTable->getId())
            ->setMaxResults(4)
            ->getQuery()
            ->getResult()
            ;
    }


    public function searchbar(string $request)
    {
        return $this->createQueryBuilder('hostTable')
            ->andWhere('hostTable.name LIKE :request')
            ->setParameter('request', "%".$request."%")
            ->getQuery()
            ->getResult()
            ;
    }
 /*%" + :request + "%*/
    // /**
    //  * @return HostTables[] Returns an array of HostTables objects
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
    public function findOneBySomeField($value): ?HostTables
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
