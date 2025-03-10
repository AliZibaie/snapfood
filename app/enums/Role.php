<?php

namespace App\enums;

use App\traits\HasEnumValues;

enum Role: string
{
    use HasEnumValues;
    case ADMIN = 'admin';
    case SELLER = 'seller';
    case USER = 'user';
}
