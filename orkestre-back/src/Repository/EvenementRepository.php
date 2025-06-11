<?php

namespace App\Repository;

use App\Entity\Evenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Dto\EvenementFiltersDto;

/**
 * @extends ServiceEntityRepository<Evenement>
 */
class EvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Evenement::class);
    }

    public function save(Evenement $evenement){
        $this->getEntityManager()->persist($evenement);
        $this->getEntityManager()->flush();
    }

     public function findAllEvenements(){
        return $this->findAll();
    }

    public function findFilteredEvenements(EvenementFiltersDto $filtersDto){
        $qbf = $this->createQueryBuilder('evenement')
        ->where ('evenement.evenementDate = :date')
        ->orWhere('evenement.price <= :priceMax')
        ->orWhere('evenement.category = :category')
        ->setParameter('date', $filtersDto->getDate()) 
        ->setParameter('priceMax', $filtersDto->getPriceMax())
        ->setParameter('category', $filtersDto->getCategory());

        $query = $qbf->getQuery();
        return $query->execute();
    }

    //    /**
    //     * @return Evenement[] Returns an array of Evenement objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Evenement
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
