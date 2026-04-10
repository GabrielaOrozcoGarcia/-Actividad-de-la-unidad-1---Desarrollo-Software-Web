<?php

declare(strict_types=1);

class PetNotFoundException extends DomainException
{
    public static function becauseIdWasNotFound(string $id): self
    {
        return new self('No se encontró una mascota con el ID: ' . $id);
    }
}
