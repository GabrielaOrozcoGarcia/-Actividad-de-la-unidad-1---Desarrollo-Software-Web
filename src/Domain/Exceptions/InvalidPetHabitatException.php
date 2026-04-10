<?php

declare(strict_types=1);

class InvalidPetHabitatException extends \InvalidArgumentException
{
    public static function becauseValueIsInvalid(string $value): self
    {
        return new self('El hábitat "' . $value . '" no es válido.');
    }
}
