<?php

declare(strict_types=1);

class PetName
{
    private string $value;

    public function __construct(string $value)
    {
        $normalized = trim($value);
        if ($normalized === '') {
            throw InvalidPetNameException::becauseValueIsEmpty();
        }
        if (mb_strlen($normalized) < 2) {
            throw InvalidPetNameException::becauseLengthIsTooShort(2);
        }
        $this->value = $normalized;
    }

    public function value(): string
    {
        return $this->value;
    }
    public function equals(PetName $other): bool
    {
        return $this->value === $other->value();
    }
    public function __toString(): string
    {
        return $this->value;
    }
}
