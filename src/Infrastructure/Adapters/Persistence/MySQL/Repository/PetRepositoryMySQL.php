<?php

declare(strict_types=1);

final class PetRepositoryMySQL implements
    SavePetPort,
    UpdatePetPort,
    DeletePetPort,
    GetPetByIdPort,
    GetAllPetsPort
{
    private \PDO               $pdo;
    private PetPersistenceMapper $mapper;

    public function __construct(\PDO $pdo, PetPersistenceMapper $mapper)
    {
        $this->pdo    = $pdo;
        $this->mapper = $mapper;
    }

    public function save(PetModel $pet): PetModel
    {
        $dto  = $this->mapper->fromModelToDto($pet);
        $sql  = 'INSERT INTO pets
                 (id, name, gender, weight, size, color, breed, species,
                  birth_date, owner, habitat, has_vaccines, veterinarian,
                  created_at, updated_at)
                 VALUES
                 (:id, :name, :gender, :weight, :size, :color, :breed, :species,
                  :birth_date, :owner, :habitat, :has_vaccines, :veterinarian,
                  NOW(), NOW())';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(
            ':id'           => $dto->id(),
            ':name'         => $dto->name(),
            ':gender'       => $dto->gender(),
            ':weight'       => $dto->weight(),
            ':size'         => $dto->size(),
            ':color'        => $dto->color(),
            ':breed'        => $dto->breed(),
            ':species'      => $dto->species(),
            ':birth_date'   => $dto->birthDate(),
            ':owner'        => $dto->owner(),
            ':habitat'      => $dto->habitat(),
            ':has_vaccines' => $dto->hasVaccines(),
            ':veterinarian' => $dto->veterinarian(),
        ));
        $saved = $this->getById(new PetId($dto->id()));
        if ($saved === null) {
            throw new \RuntimeException('La mascota no pudo recuperarse despues de guardarse.');
        }
        return $saved;
    }

    public function update(PetModel $pet): PetModel
    {
        $dto  = $this->mapper->fromModelToDto($pet);
        $sql  = 'UPDATE pets SET
                 name=:name, gender=:gender, weight=:weight, size=:size,
                 color=:color, breed=:breed, species=:species,
                 birth_date=:birth_date, owner=:owner, habitat=:habitat,
                 has_vaccines=:has_vaccines, veterinarian=:veterinarian,
                 updated_at=NOW()
                 WHERE id=:id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(
            ':id'           => $dto->id(),
            ':name'         => $dto->name(),
            ':gender'       => $dto->gender(),
            ':weight'       => $dto->weight(),
            ':size'         => $dto->size(),
            ':color'        => $dto->color(),
            ':breed'        => $dto->breed(),
            ':species'      => $dto->species(),
            ':birth_date'   => $dto->birthDate(),
            ':owner'        => $dto->owner(),
            ':habitat'      => $dto->habitat(),
            ':has_vaccines' => $dto->hasVaccines(),
            ':veterinarian' => $dto->veterinarian(),
        ));
        $updated = $this->getById(new PetId($dto->id()));
        if ($updated === null) {
            throw new \RuntimeException('La mascota no pudo recuperarse despues de actualizarse.');
        }
        return $updated;
    }

    public function getById(PetId $petId): ?PetModel
    {
        $sql  = 'SELECT * FROM pets WHERE id = :id LIMIT 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(':id' => $petId->value()));
        $row = $stmt->fetch();
        return $row === false ? null : $this->mapper->fromRowToModel($row);
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM pets ORDER BY name ASC');
        $rows = $stmt->fetchAll();
        return $this->mapper->fromRowsToModels($rows);
    }

    public function delete(PetId $petId): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM pets WHERE id = :id');
        $stmt->execute(array(':id' => $petId->value()));
    }
}
