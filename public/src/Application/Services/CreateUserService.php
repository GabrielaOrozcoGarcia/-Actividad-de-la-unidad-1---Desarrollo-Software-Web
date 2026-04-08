<?php

namespace Application\Services;

use Application\Commands\CreateUserCommand;
use Application\Ports\In\CreateUserUseCase;
use Application\Ports\Out\GetUserByEmailPort;
use Application\Ports\Out\SaveUserPort;
use Domain\Enums\UserRole;
use Domain\Enums\UserStatus;
use Domain\Exceptions\UserAlreadyExistsException;
use Domain\Models\UserModel;
use Domain\ValueObjects\UserEmail;
use Domain\ValueObjects\UserId;
use Domain\ValueObjects\UserName;
use Domain\ValueObjects\UserPassword;

class CreateUserService implements CreateUserUseCase
{
    public function __construct(
        private SaveUserPort        $saveUserPort,
        private GetUserByEmailPort  $getUserByEmailPort
    ) {}

    public function execute(CreateUserCommand $command): UserModel
    {
        // 1. Verificar si el email ya existe
        $existing = $this->getUserByEmailPort->findByEmail($command->email);
        if ($existing !== null) {
            throw new UserAlreadyExistsException($command->email);
        }

        // 2. Crear modelo de dominio (hashea la contraseña aquí)
        $user = new UserModel(
            UserId::generate(),
            new UserName($command->name),
            new UserEmail($command->email),
            UserPassword::fromPlainText($command->password),
            UserRole::from($command->roleId),
            UserStatus::ACTIVE
        );

        // 3. Guardar y retornar
        return $this->saveUserPort->save($user);
    }
}
