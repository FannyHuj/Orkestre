<?php

namespace App\Entity;

enum UserRole: string {

    case USER = 'user';
    case ORGANIZER = 'organizer';
    case ADMIN = 'admin';

}