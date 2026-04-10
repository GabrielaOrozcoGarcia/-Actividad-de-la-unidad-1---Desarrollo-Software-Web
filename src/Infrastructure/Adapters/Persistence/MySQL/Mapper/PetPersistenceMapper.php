<?php

declare(strict_types=1);

final class PetPersistenceMapper
{
    public function fromModelToDto(PetModel $pet): PetPersistenceDto
    {
        return new PetPersistenceDto(
            $pet->id()->value(),
            $pet->name()->value(),
            $pet->gender(),
            $pet->weight()->value(),
            $pet->size(),
            $pet->color()->value(),
            $pet->breed()->value(),
            $pet->species()->value(),
            $pet->birthDate()->value(),
            $pet->owner()->value(),
            $pet->habitat(),
            $pet->hasVaccines() ? 1 : 0,
            $pet->veterinarian()->value()
        );
    }

    public function fromRowToEntity(array $row): PetEntity
    {
        return new PetEntity(
            (string) $row['id'],
            (string) $row['name'],
            (string) $row['gender'],
            (float)  $row['weight'],
            (string) $row['size'],
            (string) $row['color'],
            (string) $row['breed'],
            (string) $row['species'],
            (string) $row['birth_date'],
            (string) $row['owner'],
            (string) $row['habitat'],
            (int)    $row['has_vaccines'],
            (string) $row['veterinarian'],
            isset($row['created_at']) ? (string) $row['created_at'] : null,
            isset($row['updated_at']) ? (string) $row['updated_at'] : null
        );
    }

    public function fromEntityToModel(PetEntity $entity): PetModel
    {
        return new PetModel(
            new PetId($entity->id()),
            new PetName($entity->name()),
            $entity->gender(),
            new PetWeight($entity->weight()),
            $entity->size(),
            new PetColor($entity->color()),
            new PetBreed($entity->breed()),
            new PetSpecies($entity->species()),
            new PetBirthDate($entity->birthDate()),
            new PetOwner($entity->owner()),
            $entity->habitat(),
            (bool) $entity->hasVaccines(),
            new PetVeterinarian($entity->veterinarian())
        );
    }

    public function fromRowToModel(array $row): PetModel
    {
        return $this->fromEntityToModel($this->fromRowToEntity($row));
    }

    public function fromRowsToModels(array $rows): array
    {
        $models = array();
        foreach ($rows as $row) {
            $models[] = $this->fromRowToModel($row);
        }
        return $models;
    }
}
