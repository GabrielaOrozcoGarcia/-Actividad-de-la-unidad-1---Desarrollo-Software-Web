<?php

namespace Application\Services;

use Application\Commands\DeleteUserCommand;
use Application\Ports\In\DeleteUserUseCase;
use Application\Ports\Out\DeleteUserPort;
use Application\Ports\Out\GetUserByIdPort;
use Domain\Exceptions\UserNotFoundException;

class DeleteUserService implements DeleteUserUseCase
{
    public function __construct(
        private DeleteUserPort  $deleteUserPort,
        private GetUserByIdPort $getUserByIdPort
    ) {}

    public function execute(DeleteUserCommand $command): void
    {
        // 1. Verificar que el usuario existe
        $existing = $this->getUserByIdPort->findById($command->id);
        if ($existing === null) {
            throw new UserNotFoundException($command->id);
        }

        // 2. Eliminar
        $this->deleteUserPort->delete($command->id);
    }
}
