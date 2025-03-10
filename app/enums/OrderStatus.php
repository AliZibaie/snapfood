<?php

namespace App\enums;

use App\traits\HasEnumValues;

enum OrderStatus : string
{
    use HasEnumValues;
    case PENDING =  'pending';
    case PREPARING =  'preparing';
    case SENT =  'sent';
    case DELIVERED  =  'delivered';
}
