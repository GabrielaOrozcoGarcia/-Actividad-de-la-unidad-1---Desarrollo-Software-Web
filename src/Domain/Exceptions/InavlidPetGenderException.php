<?php

declare(strict_types=1);

class InvalidPetGenderException extends \InvalidArgumentException
{
    public static function becauseValueIsInvalid(string $value): self
    {
        return new self('El genero "' . $value . '" no es valido.');
    }
}
