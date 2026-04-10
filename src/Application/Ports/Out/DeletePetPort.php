<?php

declare(strict_types=1);

interface DeletePetPort
{
    public function delete(PetId $petId): void;
}
