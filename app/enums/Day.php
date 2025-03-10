<?php

namespace App\enums;

use App\traits\HasEnumValues;

enum Day : string
{
    use HasEnumValues;
    case SATURDAY = 'saturday';
    case SUNDAY = 'sunday';
    case MONDAY = 'monday';
    case TUESDAY = 'tuesday';
    case WEDNESDAY = 'wednesday';
    case THURSDAY = 'thursday';
    case FRIDAY = 'friday';
}
