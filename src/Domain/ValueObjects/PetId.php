<?php

declare(strict_types=1);

class PetId
{
    private string $value;

    public function __construct(string $value)
    {
        $normalized = trim($value);
        if ($normalized === '') {
            throw new \InvalidArgumentException('El ID de la mascota no puede estar vacío.');
        }
        $this->value = $normalized;
    }

    public function value(): string
    {
        return $this->value;
    }
    public function equals(PetId $other): bool
    {
        return $this->value === $other->value();
    }
    public function __toString(): string
    {
        return $this->value;
    }
}
