<?php

namespace Application\Ports\Out;

use Domain\Models\UserModel;

interface UpdateUserPort
{
    public function update(UserModel $user): UserModel;
}
