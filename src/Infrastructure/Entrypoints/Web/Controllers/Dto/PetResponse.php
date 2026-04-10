<?php

declare(strict_types=1);

final class PetResponse
{
    public function __construct(
        private string $id,
        private string $name,
        private string $gender,
        private float  $weight,
        private string $size,
        private string $color,
        private string $breed,
        private string $species,
        private string $birthDate,
        private string $owner,
        private string $habitat,
        private bool   $hasVaccines,
        private string $veterinarian
    ) {}

    public function getId(): string
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getGender(): string
    {
        return $this->gender;
    }
    public function getWeight(): float
    {
        return $this->weight;
    }
    public function getSize(): string
    {
        return $this->size;
    }
    public function getColor(): string
    {
        return $this->color;
    }
    public function getBreed(): string
    {
        return $this->breed;
    }
    public function getSpecies(): string
    {
        return $this->species;
    }
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }
    public function getOwner(): string
    {
        return $this->owner;
    }
    public function getHabitat(): string
    {
        return $this->habitat;
    }
    public function getHasVaccines(): bool
    {
        return $this->hasVaccines;
    }
    public function getVeterinarian(): string
    {
        return $this->veterinarian;
    }

    public function toArray(): array
    {
        return array(
            'id'           => $this->id,
            'name'         => $this->name,
            'gender'       => $this->gender,
            'weight'       => $this->weight,
            'size'         => $this->size,
            'color'        => $this->color,
            'breed'        => $this->breed,
            'species'      => $this->species,
            'birth_date'   => $this->birthDate,
            'owner'        => $this->owner,
            'habitat'      => $this->habitat,
            'has_vaccines' => $this->hasVaccines,
            'veterinarian' => $this->veterinarian,
        );
    }
}
