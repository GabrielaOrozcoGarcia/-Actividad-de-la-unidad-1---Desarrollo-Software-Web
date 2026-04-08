<?php

namespace Application\Services;

use Application\Commands\UpdateUserCommand;
use Application\Ports\In\UpdateUserUseCase;
use Application\Ports\Out\GetUserByIdPort;
use Application\Ports\Out\UpdateUserPort;
use Domain\Enums\UserRole;
use Domain\Enums\UserStatus;
use Domain\Exceptions\UserNotFoundException;
use Domain\Models\UserModel;
use Domain\ValueObjects\UserEmail;
use Domain\ValueObjects\UserId;
use Domain\ValueObjects\UserName;
use Domain\ValueObjects\UserPassword;

class UpdateUserService implements UpdateUserUseCase
{
    public function __construct(
        private UpdateUserPort  $updateUserPort,
        private GetUserByIdPort $getUserByIdPort
    ) {}

    public function execute(UpdateUserCommand $command): UserModel
    {
        // 1. Verificar que el usuario existe
        $existing = $this->getUserByIdPort->findById($command->id);
        if ($existing === null) {
            throw new UserNotFoundException($command->id);
        }

        // 2. Si viene contraseña nueva la hashea, si no reutiliza la existente
        $password = !empty($command->password)
            ? UserPassword::fromPlainText($command->password)
            : $existing->password();

        // 3. Construir modelo actualizado
        $user = new UserModel(
            new UserId($command->id),
            new UserName($command->name),
            new UserEmail($command->email),
            $password,
            UserRole::from($command->roleId),
            UserStatus::from($command->status)
        );

        // 4. Actualizar y retornar
        return $this->updateUserPort->update($user);
    }
}
