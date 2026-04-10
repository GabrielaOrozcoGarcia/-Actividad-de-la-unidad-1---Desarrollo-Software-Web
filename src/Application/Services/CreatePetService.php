<?php

declare(strict_types=1);

final class CreatePetService implements CreatePetUseCase
{
    private SavePetPort $savePetPort;

    public function __construct(SavePetPort $savePetPort)
    {
        $this->savePetPort = $savePetPort;
    }

    public function execute(CreatePetCommand $command): PetModel
    {
        $pet = new PetModel(
            new PetId($command->getId()),
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
        return $this->savePetPort->save($pet);
    }
}
