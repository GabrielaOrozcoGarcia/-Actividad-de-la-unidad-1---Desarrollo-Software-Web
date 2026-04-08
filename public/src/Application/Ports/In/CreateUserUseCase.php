<?php

namespace Application\Ports\In;

use Application\Commands\CreateUserCommand;
use Domain\Models\UserModel;

interface CreateUserUseCase
{
    public function execute(CreateUserCommand $command): UserModel;
}
