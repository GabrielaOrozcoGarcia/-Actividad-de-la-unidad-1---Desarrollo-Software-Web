<?php

namespace Application\Ports\Out;

use Domain\Models\UserModel;

interface GetUserByIdPort
{
    public function findById(string $id): ?UserModel;
}
