<?php

namespace Application\Services;

use Application\Ports\In\GetUserByIdUseCase;
use Application\Ports\Out\GetUserByIdPort;
use Application\Queries\GetUserByIdQuery;
use Domain\Exceptions\UserNotFoundException;
use Domain\Models\UserModel;

class GetUserByIdService implements GetUserByIdUseCase
{
    public function __construct(
        private GetUserByIdPort $getUserByIdPort
    ) {}

    public function execute(GetUserByIdQuery $query): UserModel
    {
        $user = $this->getUserByIdPort->findById($query->id);
        if ($user === null) {
            throw new UserNotFoundException($query->id);
        }
        return $user;
    }
}
