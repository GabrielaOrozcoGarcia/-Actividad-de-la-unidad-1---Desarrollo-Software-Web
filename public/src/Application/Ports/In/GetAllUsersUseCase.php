<?php

namespace Application\Ports\In;

use Application\Queries\GetAllUsersQuery;

interface GetAllUsersUseCase
{
    public function execute(GetAllUsersQuery $query): array;
}
