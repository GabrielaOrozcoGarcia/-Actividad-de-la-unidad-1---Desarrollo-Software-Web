<?php

declare(strict_types=1);

class InvalidPetNameException extends \InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('El nombre de la mascota no puede estar vacío.');
    }

    public static function becauseLengthIsTooShort(int $min): self
    {
        return new self('El nombre debe tener al menos ' . $min . ' caracteres.');
    }
}
