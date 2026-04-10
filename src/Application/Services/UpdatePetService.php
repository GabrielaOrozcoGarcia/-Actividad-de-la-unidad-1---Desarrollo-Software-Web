<?php

declare(strict_types=1);

final class UpdatePetService implements UpdatePetUseCase
{
    private UpdatePetPort  $updatePetPort;
    private GetPetByIdPort $getPetByIdPort;

    public function __construct(
        UpdatePetPort  $updatePetPort,
        GetPetByIdPort $getPetByIdPort
    ) {
        $this->updatePetPort  = $updatePetPort;
        $this->getPetByIdPort = $getPetByIdPort;
    }

    public function execute(UpdatePetCommand $command): PetModel
    {
        $petId       = new PetId($command->getId());
        $currentPet  = $this->getPetByIdPort->getById($petId);
        if ($currentPet === null) {
            throw PetNotFoundException::becauseIdWasNotFound($petId->value());
        }

        $pet = new PetModel(
            $petId,
            new PetName($command->getName()),
            $command->getGender(),
            new PetWeight($command->getWeight()),
            $command->getSize(),
            new PetColor($command->getColor()),
            new PetBreed($command->getBreed()),
            new PetSpecies($command->getSpecies()),
            new PetBirthDate($command->getBirthDate()),
            new PetOwner($command->getOwner()),
            $command->getHabitat(),
            $command->getHasVaccines(),
            new PetVeterinarian($command->getVeterinarian())
        );
        return $this->updatePetPort->update($pet);
    }
}
