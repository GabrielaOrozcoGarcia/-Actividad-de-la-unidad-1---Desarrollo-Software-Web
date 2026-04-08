<?php

namespace Application\Services;

use Application\Ports\In\GetAllUsersUseCase;
use Application\Ports\Out\GetAllUsersPort;
use Application\Queries\GetAllUsersQuery;

class GetAllUsersService implements GetAllUsersUseCase
{
    public function __construct(
        private GetAllUsersPort $getAllUsersPort
    ) {}

    public function execute(GetAllUsersQuery $query): array
    {
        return $this->getAllUsersPort->findAll();
    }
}
