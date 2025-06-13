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
use App\Services\EvenementService;

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
        $organizer = $evenementDto->getOrganizer();
        if (!$organizer) {
            return $this->json(['status' => 'error', 'message' => 'organizer manquant'], 400);
        }

        // Get the organizer from the repository
        $user = $userRepository->findUserById($organizer);
        if (!$user) {
            return $this->json(['status' => 'error', 'message' => 'Organisateur introuvable'], 404);
        }

        // Associate the organizer with the event
        $evenement->setOrganizer($user);

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

    #[Route('/api/findEvenementById/{id}')]
    public function showEvenementDetails (EvenementRepository $evenementRepository,$id): JsonResponse{

        $evenement = $evenementRepository->findEvenementById($id);

        $converter = new EvenementDtoConverter();
        $evenementDto = $converter->convertToDto($evenement);
        

        return $this->json($evenementDto, 200, [], ['json_encode_options' => JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES]);

    }

    #[Route('/api/evenementRegistrationByUser/{id}/user/{userId}', methods:['POST'])]
    public function evenementRegistration ($id,$userId, EvenementService $evenementService): JsonResponse
    {
       $evenementService->bookingEvenement($id, $userId);

        return $this->json(['status' => 'success', 'message' => 'Inscription réussie'], 200);
    }

    #[Route('/api/cancelEvenementByOrganizer/{id}/user/{userId}', methods:['DELETE'])]
    public function cancel ($id, $userId,EvenementService $evenementService):JsonResponse{

        $evenementService->cancelEvenement($id,$userId);
        
        return $this->json(['status' => 'success']);
    }
}
