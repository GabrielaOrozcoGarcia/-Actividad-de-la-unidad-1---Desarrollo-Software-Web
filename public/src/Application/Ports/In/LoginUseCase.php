<?php

namespace Application\Ports\In;

use Application\Commands\LoginCommand;
use Domain\Models\UserModel;

interface LoginUseCase
{
    public function execute(LoginCommand $command): UserModel;
}
