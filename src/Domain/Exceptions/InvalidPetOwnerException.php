<?php

declare(strict_types=1);

class InvalidPetOwnerException extends \InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('El propietario no puede estar vacio.');
    }
}
