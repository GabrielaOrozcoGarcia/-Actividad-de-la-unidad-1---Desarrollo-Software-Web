<?php

namespace Domain\ValueObjects;

use Domain\Exceptions\DomainException;

class UserEmail
{
    private string $value;

    public function __construct(string $value)
    {
        $value = trim(strtolower($value));
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new DomainException("El email '$value' no es válido");
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
