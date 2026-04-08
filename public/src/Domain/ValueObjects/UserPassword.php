<?php

namespace Domain\ValueObjects;

use Domain\Exceptions\DomainException;

class UserPassword
{
    private string $hash;

    private function __construct(string $hash)
    {
        $this->hash = $hash;
    }

    // Usado al registrar o actualizar contraseña
    public static function fromPlainText(string $plain): self
    {
        if (strlen($plain) < 6) {
            throw new DomainException("La contraseña debe tener al menos 6 caracteres");
        }
        return new self(password_hash($plain, PASSWORD_BCRYPT));
    }

    // Usado al cargar desde la base de datos
    public static function fromHash(string $hash): self
    {
        return new self($hash);
    }

    // Usado al hacer login
    public function verifyPlain(string $plain): bool
    {
        return password_verify($plain, $this->hash);
    }

    public function value(): string
    {
        return $this->hash;
    }
}
