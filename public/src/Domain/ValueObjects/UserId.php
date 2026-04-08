<?php

namespace Domain\ValueObjects;

use Domain\Exceptions\DomainException;

class UserId
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty(trim($value))) {
            throw new DomainException("El ID no puede estar vacío");
        }
        $this->value = $value;
    }

    public static function generate(): self
    {
        return new self(sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        ));
    }

    public function value(): string
    {
        return $this->value;
    }
}
