<?php

declare(strict_types=1);

class PetWeight
{
    private float $value;

    public function __construct(float $value)
    {
        if ($value <= 0) {
            throw InvalidPetWeightException::becauseValueIsNotPositive();
        }
        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }
    public function equals(PetWeight $other): bool
    {
        return $this->value === $other->value();
    }
    public function __toString(): string
    {
        return (string) $this->value;
    }
}
