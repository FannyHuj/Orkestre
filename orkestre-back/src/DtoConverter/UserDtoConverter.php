<?php
namespace App\DtoConverter;

use App\Entity\User;
use App\Dto\UserDto;

class UserDtoConverter {

    public function convertToDto(User $user): UserDto
    {
        $userDto = new UserDto();
        $userDto->setId($user->getId());
        $userDto->setFirstName($user->getFirstName());
        $userDto->setLastName($user->getLastName());
        $userDto->setEmail($user->getEmail());
        $userDto->setPicture($user->getPicture());
        $userDto->setRole($user->getRole());
        $userDto->setPhoneNumber($user->getPhoneNumber());

        return $userDto;
    }

    public function convertToEntity(UserDto $userDto): User
    {
        $user = new User();
        $user->setFirstName($userDto->getFirstName());
        $user->setLastName($userDto->getLastName());
        $user->setEmail($userDto->getEmail());
        $user->setPassword($userDto->getPassword()); 
        $user->setPicture($userDto->getPicture());
        $user->setRole($userDto->getRole());
        $user->setPhoneNumber($userDto->getPhoneNumber());

        return $user;
    }
}