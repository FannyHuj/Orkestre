<?php
namespace App\Services;

use App\Repository\EvenementRepository;
use App\Repository\UserRepository;
use App\Entity\UserEvenement;

class EvenementService {

    private EvenementRepository $evenementRepository;
    private UserRepository $userRepository;

    
    public function __construct(UserRepository $userRepository, EvenementRepository $evenementRepository)
    {
        $this->evenementRepository = $evenementRepository;
        $this->userRepository = $userRepository;
    }

    public function bookingEvenement($evenementId, $userId)
    {
        $evenement= $this->evenementRepository->findEvenementById($evenementId);
        $user=$this->userRepository->findUserById($userId);

        //Associate User to the Evenement
        $ue= new UserEvenement();
        $ue->setEvenement($evenement);      
        $ue->setParticipant($user);

        $this->evenementRepository->registration($ue);
    

    }

    public function cancelEvenement($evenementId, $userId)
    {
        $evenement= $this->evenementRepository->findEvenementById($evenementId);
        $user=$this->userRepository->findUserById($userId);

        $this->evenementRepository->cancelEvenementByOrganizer($evenement, $user);
    }
}