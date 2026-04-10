<?php

declare(strict_types=1);

class InvalidPetSizeException extends \InvalidArgumentException
{
    public static function becauseValueIsInvalid(string $value): self
    {
        return new self('El tamaño "' . $value . '" no es válido.');
    }
}
