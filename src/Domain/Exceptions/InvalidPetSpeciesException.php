<?php

declare(strict_types=1);

class InvalidPetSpeciesException extends \InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('La especie de la mascota no puede estar vacía.');
    }
}
