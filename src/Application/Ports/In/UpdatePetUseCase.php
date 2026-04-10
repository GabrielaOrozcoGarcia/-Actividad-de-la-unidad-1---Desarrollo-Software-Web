<?php

declare(strict_types=1);

interface UpdatePetUseCase
{
    public function execute(UpdatePetCommand $command): PetModel;
}
