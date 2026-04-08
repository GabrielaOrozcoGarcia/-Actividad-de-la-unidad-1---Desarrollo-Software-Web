<?php

namespace Application\Ports\In;

use Application\Queries\GetUserByIdQuery;
use Domain\Models\UserModel;

interface GetUserByIdUseCase
{
    public function execute(GetUserByIdQuery $query): UserModel;
}
