<?php

declare(strict_types=1);

class PetOwner
{
    private string $value;

    public function __construct(string $value)
    {
        $normalized = trim($value);
        if ($normalized === '') {
            throw InvalidPetOwnerException::becauseValueIsEmpty();
        }
        $this->value = $normalized;
    }

    public function value(): string
    {
        return $this->value;
    }
    public function equals(PetOwner $other): bool
    {
        return $this->value === $other->value();
    }
    public function __toString(): string
    {
        return $this->value;
    }
}
