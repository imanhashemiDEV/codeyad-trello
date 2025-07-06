<?php

namespace App\Enums;

enum BoardStatus: string
{
    case ACTIVE = 'active';
    case ARCHIVED = 'archived';
}
