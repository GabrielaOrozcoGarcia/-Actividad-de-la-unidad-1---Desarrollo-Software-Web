<?php

declare(strict_types=1);

class InvalidPetBreedException extends \InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('La raza de la mascota no puede estar vacia.');
    }
}
