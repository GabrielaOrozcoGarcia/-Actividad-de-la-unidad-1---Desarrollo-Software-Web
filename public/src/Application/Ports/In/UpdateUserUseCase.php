<?php

namespace Application\Ports\In;

use Application\Commands\UpdateUserCommand;
use Domain\Models\UserModel;

interface UpdateUserUseCase
{
    public function execute(UpdateUserCommand $command): UserModel;
}
