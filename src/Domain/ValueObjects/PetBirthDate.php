<?php

declare(strict_types=1);

class PetBirthDate
{
    private string $value;

    public function __construct(string $value)
    {
        $normalized = trim($value);
        if ($normalized === '') {
            throw InvalidPetBirthDateException::becauseValueIsEmpty();
        }
        $date = \DateTime::createFromFormat('Y-m-d', $normalized);
        if ($date === false || $date->format('Y-m-d') !== $normalized) {
            throw InvalidPetBirthDateException::becauseFormatIsInvalid($normalized);
        }
        if ($date > new \DateTime()) {
            throw InvalidPetBirthDateException::becauseIsInTheFuture();
        }
        $this->value = $normalized;
    }

    public function value(): string
    {
        return $this->value;
    }
    public function equals(PetBirthDate $other): bool
    {
        return $this->value === $other->value();
    }
    public function __toString(): string
    {
        return $this->value;
    }
}
