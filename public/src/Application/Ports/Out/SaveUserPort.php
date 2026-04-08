<?php

namespace Application\Ports\Out;

use Domain\Models\UserModel;

interface SaveUserPort
{
    public function save(UserModel $user): UserModel;
}
