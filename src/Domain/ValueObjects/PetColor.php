<?php

declare(strict_types=1);

class PetColor
{
    private string $value;

    public function __construct(string $value)
    {
        $normalized = trim($value);
        if ($normalized === '') {
            throw InvalidPetColorException::becauseValueIsEmpty();
        }
        $this->value = $normalized;
    }

    public function value(): string
    {
        return $this->value;
    }
    public function equals(PetColor $other): bool
    {
        return $this->value === $other->value();
    }
    public function __toString(): string
    {
        return $this->value;
    }
}
