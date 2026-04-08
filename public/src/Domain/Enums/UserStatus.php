<?php

namespace Domain\Enums;

enum UserStatus: string
{
    case ACTIVE   = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
}
