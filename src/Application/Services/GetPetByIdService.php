<?php

declare(strict_types=1);

final class GetPetByIdService implements GetPetByIdUseCase
{
    private GetPetByIdPort $getPetByIdPort;

    public function __construct(GetPetByIdPort $getPetByIdPort)
    {
        $this->getPetByIdPort = $getPetByIdPort;
    }

    public function execute(GetPetByIdQuery $query): PetModel
    {
        $petId = new PetId($query->getId());
        $pet   = $this->getPetByIdPort->getById($petId);
        if ($pet === null) {
            throw PetNotFoundException::becauseIdWasNotFound($petId->value());
        }
        return $pet;
    }
}
