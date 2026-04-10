<?php

declare(strict_types=1);

interface DeletePetUseCase
{
    public function execute(DeletePetCommand $command): void;
}
