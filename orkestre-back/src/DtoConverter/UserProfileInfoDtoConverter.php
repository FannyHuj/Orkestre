<?php
namespace App\DtoConverter;

use App\Entity\User;
use App\Dto\UserProfileInfoDto;

class UserProfileInfoDtoConverter {

    public function convertToDto(User $user): UserProfileInfoDto
    {
        $userDto = new UserProfileInfoDto();
        $userDto->setId($user->getId());
        $userDto->setFirstName($user->getFirstName());
        $userDto->setLastName($user->getLastName());
        $userDto->setEmail($user->getEmail());
        $userDto->setPhoneNumber($user->getPhoneNumber());
       

        return $userDto;
    }

    public function convertToEntity(UserProfileInfoDto $userDto): User
    {
        $user = new User();
        $user->setFirstName($userDto->getFirstName());
        $user->setLastName($userDto->getLastName());
        $user->setEmail($userDto->getEmail());
        $user->setPhoneNumber($userDto->getPhoneNumber());

        return $user;
    }
}