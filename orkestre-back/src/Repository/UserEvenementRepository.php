<?php

namespace App\Repository;

use App\Entity\UserEvenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserEvenement>
 */
class UserEvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserEvenement::class);
    }


    public function findParticipationById($id){

        return $this->find($id);
    }

    public function findEvenementById($id){

        return $this->find($id);
    }

    public function findUserEvenement ($evenementId, $userId){
        $qb =$this->createQueryBuilder('ue')
            ->where('ue.evenement = :evenementId')
            ->andWhere('ue.participant = :userId')
            ->setParameter('evenementId', $evenementId)
            ->setParameter('userId', $userId);

            $query = $qb->getQuery();
            return $query->getOneOrNullResult(); 

    }

    public function cancel (UserEvenement $userEvenement)
    {
        $this->getEntityManager()->remove($userEvenement);
        $this->getEntityManager()->flush();
    }

  

    

    //    /**
    //     * @return UserEvenement[] Returns an array of UserEvenement objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?UserEvenement
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
