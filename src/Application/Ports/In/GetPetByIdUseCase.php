<?php

declare(strict_types=1);

interface GetPetByIdUseCase
{
    public function execute(GetPetByIdQuery $query): PetModel;
}
