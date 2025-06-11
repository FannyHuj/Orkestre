<?php

namespace App\Controller;

use App\Dto\EvenementDto;
use App\DtoConverter\EvenementDtoConverter;
use App\DtoConverter\EvenementMinDtoConverter;
use App\Repository\EvenementRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Dto\EvenementFiltersDto;
use DateTime;
use App\Entity\EvenementCategoryEnum;

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

    #[Route('/api/getAllEvenements')]
    public function getAllEvenements (EvenementRepository $evenementRepository): JsonResponse{

        $evenements= $evenementRepository->findAllEvenements();

        $convert=new EvenementMinDtoConverter();
        $dtoList = [];

        foreach($evenements as $evenement){
            array_push($dtoList, $convert->convertToDto($evenement));
        }

        return $this->json($dtoList, 200, [], ['json_encode_options' => JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES]);
    }

    #[Route('/api/getFilteredEvenements', methods: ['GET'])]
    public function getFilteredEvenements(Request $request, EvenementRepository $evenementRepository): JsonResponse
    {
        $evenementFiltersDto = new EvenementFiltersDto();
        $evenementFiltersDto->setDate(new DateTime($request->get('date')));
        $evenementFiltersDto->setPriceMax($request->get('priceMax'));
      
        $categoryString = $request->get('category');
        $categoryEnum = EvenementCategoryEnum::tryFrom(strtoupper($categoryString));
        $evenementFiltersDto->setCategory($categoryEnum);

        $evenements = $evenementRepository->findFilteredEvenements($evenementFiltersDto);

        return $this->json($evenements, 200, [], ['json_encode_options' => JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES]);
    }
}
