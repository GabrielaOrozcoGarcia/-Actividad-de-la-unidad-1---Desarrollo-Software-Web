<?php

declare(strict_types=1);

interface CreatePetUseCase
{
    public function execute(CreatePetCommand $command): PetModel;
}
