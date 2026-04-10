<?php

declare(strict_types=1);

final class CreatePetCommand
{
    private string $id;
    private string $name;
    private string $gender;
    private float  $weight;
    private string $size;
    private string $color;
    private string $breed;
    private string $species;
    private string $birthDate;
    private string $owner;
    private string $habitat;
    private bool   $hasVaccines;
    private string $veterinarian;

    public function __construct(
        string $id,
        string $name,
        string $gender,
        float $weight,
        string $size,
        string $color,
        string $breed,
        string $species,
        string $birthDate,
        string $owner,
        string $habitat,
        bool $hasVaccines,
        string $veterinarian
    ) {
        $this->id           = trim($id);
        $this->name         = trim($name);
        $this->gender       = trim($gender);
        $this->weight       = $weight;
        $this->size         = trim($size);
        $this->color        = trim($color);
        $this->breed        = trim($breed);
        $this->species      = trim($species);
        $this->birthDate    = trim($birthDate);
        $this->owner        = trim($owner);
        $this->habitat      = trim($habitat);
        $this->hasVaccines  = $hasVaccines;
        $this->veterinarian = trim($veterinarian);
    }

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
}
