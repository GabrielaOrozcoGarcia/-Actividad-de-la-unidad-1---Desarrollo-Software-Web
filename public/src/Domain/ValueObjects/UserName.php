<?php

namespace Domain\ValueObjects;

use Domain\Exceptions\DomainException;

class UserName
{
    private string $value;

    public function __construct(string $value)
    {
        $value = trim($value);
        if (empty($value)) {
            throw new DomainException("El nombre no puede estar vacío");
        }
        if (strlen($value) < 2) {
            throw new DomainException("El nombre debe tener al menos 2 caracteres");
        }
        if (strlen($value) > 100) {
            throw new DomainException("El nombre no puede superar 100 caracteres");
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
