<?php

namespace Application\Ports\In;

use Application\Commands\DeleteUserCommand;

interface DeleteUserUseCase
{
    public function execute(DeleteUserCommand $command): void;
}
