<?php

declare(strict_types=1);

final class PetEntity
{
    private string  $id;
    private string  $name;
    private string  $gender;
    private float   $weight;
    private string  $size;
    private string  $color;
    private string  $breed;
    private string  $species;
    private string  $birthDate;
    private string  $owner;
    private string  $habitat;
    private int     $hasVaccines;
    private string  $veterinarian;
    private ?string $createdAt;
    private ?string $updatedAt;

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
        int $hasVaccines,
        string $veterinarian,
        ?string $createdAt = null,
        ?string $updatedAt = null
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
        $this->createdAt    = $createdAt;
        $this->updatedAt    = $updatedAt;
    }

    public function id(): string
    {
        return $this->id;
    }
    public function name(): string
    {
        return $this->name;
    }
    public function gender(): string
    {
        return $this->gender;
    }
    public function weight(): float
    {
        return $this->weight;
    }
    public function size(): string
    {
        return $this->size;
    }
    public function color(): string
    {
        return $this->color;
    }
    public function breed(): string
    {
        return $this->breed;
    }
    public function species(): string
    {
        return $this->species;
    }
    public function birthDate(): string
    {
        return $this->birthDate;
    }
    public function owner(): string
    {
        return $this->owner;
    }
    public function habitat(): string
    {
        return $this->habitat;
    }
    public function hasVaccines(): int
    {
        return $this->hasVaccines;
    }
    public function veterinarian(): string
    {
        return $this->veterinarian;
    }
    public function createdAt(): ?string
    {
        return $this->createdAt;
    }
    public function updatedAt(): ?string
    {
        return $this->updatedAt;
    }
}
