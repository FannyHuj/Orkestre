<?php

namespace App\DtoConverter;

use App\Entity\Evenement;
use App\Dto\EvenementMinDto;

class EvenementMinDtoConverter {

         public function convertToDto(Evenement $evenement): EvenementMinDto
    {
        $evenementDto = new EvenementMinDto();
        $evenementDto->setId($evenement->getId());
        $evenementDto->setTitle($evenement->getTitle());
        $evenementDto->setDescription($evenement->getDescription());
        $evenementDto->setEvenementDate($evenement->getEvenementDate());
        $evenementDto->setLocation($evenement->getLocation());
        $evenementDto->setMaxCapacity($evenement->getMaxCapacity());
        $evenementDto->setPrice($evenement->getPrice());
        $evenementDto->setCategory($evenement->getCategory());

        return $evenementDto;
    }

    public function convertToEntity(EvenementMinDto $evenementDto): Evenement
    {
        $evenement = new Evenement();
        $evenement->setTitle($evenementDto->getTitle());
        $evenement->setDescription($evenementDto->getDescription());
        $evenement->setEvenementDate($evenementDto->getEvenementDate());
        $evenement->setLocation($evenementDto->getLocation()); 
        $evenement->setMaxCapacity($evenementDto->getMaxCapacity());
        $evenement->setPrice($evenementDto->getPrice());
        $evenement->setCategory($evenementDto->getCategory());

        return $evenement;
    }

}