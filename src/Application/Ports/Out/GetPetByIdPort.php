<?php

declare(strict_types=1);

interface GetPetByIdPort
{
    public function getById(PetId $petId): ?PetModel;
}
