<?php

namespace Application\Ports\Out;

use Domain\Models\UserModel;

interface GetAllUsersPort
{
    public function findAll(): array;
}
