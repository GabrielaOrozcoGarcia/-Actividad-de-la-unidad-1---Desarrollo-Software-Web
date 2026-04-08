<?php

namespace Application\Ports\Out;

use Domain\Models\UserModel;

interface GetUserByEmailPort
{
    public function findByEmail(string $email): ?UserModel;
}
