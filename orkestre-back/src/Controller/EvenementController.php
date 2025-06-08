<?php

namespace App\Controller;

use App\Dto\EvenementDto;
use App\DtoConverter\EvenementDtoConverter;
use App\Repository\EvenementRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\HttpFoundation\JsonResponse;

class EvenementController extends AbstractController
{
    #[Route('/api/createEvenement', methods: ['POST'])]
    public function new(
        #[MapRequestPayload] EvenementDto $evenementDto,
        EvenementRepository $evenementRepository,
        UserRepository $userRepository,
    ): JsonResponse {
        $converter = new EvenementDtoConverter();

        // Convert DTO to Entity
        $evenement = $converter->convertToEntity($evenementDto);

        // heck oraganizerId
        $organizerId = $evenementDto->getOrganizerId();
        if (!$organizerId) {
            return $this->json(['status' => 'error', 'message' => 'organizerId manquant'], 400);
        }

        // Get the organizer from the repository
        $user = $userRepository->findUserById($organizerId);
        if (!$user) {
            return $this->json(['status' => 'error', 'message' => 'Organisateur introuvable'], 404);
        }

        // Associate the organizer with the event
        $evenement->setOrganizerId($user);

        // Save the event
        $evenementRepository->save($evenement);
        

        return $this->json(['status' => 'success', 'id' => $evenement->getId()], 201);
    }
}
