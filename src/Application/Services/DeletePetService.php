<?php

declare(strict_types=1);

final class DeletePetService implements DeletePetUseCase
{
    private DeletePetPort  $deletePetPort;
    private GetPetByIdPort $getPetByIdPort;

    public function __construct(
        DeletePetPort  $deletePetPort,
        GetPetByIdPort $getPetByIdPort
    ) {
        $this->deletePetPort  = $deletePetPort;
        $this->getPetByIdPort = $getPetByIdPort;
    }

    public function execute(DeletePetCommand $command): void
    {
        $petId      = new PetId($command->getId());
        $existingPet = $this->getPetByIdPort->getById($petId);
        if ($existingPet === null) {
            throw PetNotFoundException::becauseIdWasNotFound($petId->value());
        }
        $this->deletePetPort->delete($petId);
    }
}
