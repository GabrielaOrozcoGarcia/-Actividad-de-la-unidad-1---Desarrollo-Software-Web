<?php

declare(strict_types=1);

final class PetModel
{
    private PetId           $id;
    private PetName         $name;
    private string          $gender;
    private PetWeight       $weight;
    private string          $size;
    private PetColor        $color;
    private PetBreed        $breed;
    private PetSpecies      $species;
    private PetBirthDate    $birthDate;
    private PetOwner        $owner;
    private string          $habitat;
    private bool            $hasVaccines;
    private PetVeterinarian $veterinarian;

    public function __construct(
        PetId           $id,
        PetName         $name,
        string          $gender,
        PetWeight       $weight,
        string          $size,
        PetColor        $color,
        PetBreed        $breed,
        PetSpecies      $species,
        PetBirthDate    $birthDate,
        PetOwner        $owner,
        string          $habitat,
        bool            $hasVaccines,
        PetVeterinarian $veterinarian
    ) {
        PetGenderEnum::ensureIsValid($gender);
        PetSizeEnum::ensureIsValid($size);
        PetHabitatEnum::ensureIsValid($habitat);
        $this->id           = $id;
        $this->name         = $name;
        $this->gender       = $gender;
        $this->weight       = $weight;
        $this->size         = $size;
        $this->color        = $color;
        $this->breed        = $breed;
        $this->species      = $species;
        $this->birthDate    = $birthDate;
        $this->owner        = $owner;
        $this->habitat      = $habitat;
        $this->hasVaccines  = $hasVaccines;
        $this->veterinarian = $veterinarian;
    }

    public function id(): PetId
    {
        return $this->id;
    }
    public function name(): PetName
    {
        return $this->name;
    }
    public function gender(): string
    {
        return $this->gender;
    }
    public function weight(): PetWeight
    {
        return $this->weight;
    }
    public function size(): string
    {
        return $this->size;
    }
    public function color(): PetColor
    {
        return $this->color;
    }
    public function breed(): PetBreed
    {
        return $this->breed;
    }
    public function species(): PetSpecies
    {
        return $this->species;
    }
    public function birthDate(): PetBirthDate
    {
        return $this->birthDate;
    }
    public function owner(): PetOwner
    {
        return $this->owner;
    }
    public function habitat(): string
    {
        return $this->habitat;
    }
    public function hasVaccines(): bool
    {
        return $this->hasVaccines;
    }
    public function veterinarian(): PetVeterinarian
    {
        return $this->veterinarian;
    }

    public function vaccinate(): self
    {
        return new self(
            $this->id,
            $this->name,
            $this->gender,
            $this->weight,
            $this->size,
            $this->color,
            $this->breed,
            $this->species,
            $this->birthDate,
            $this->owner,
            $this->habitat,
            true,
            $this->veterinarian
        );
    }

    public function toArray(): array
    {
        return array(
            'id'           => $this->id->value(),
            'name'         => $this->name->value(),
            'gender'       => $this->gender,
            'weight'       => $this->weight->value(),
            'size'         => $this->size,
            'color'        => $this->color->value(),
            'breed'        => $this->breed->value(),
            'species'      => $this->species->value(),
            'birth_date'   => $this->birthDate->value(),
            'owner'        => $this->owner->value(),
            'habitat'      => $this->habitat,
            'has_vaccines' => $this->hasVaccines,
            'veterinarian' => $this->veterinarian->value(),
        );
    }
}
