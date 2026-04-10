<?php

declare(strict_types=1);

class InvalidPetBirthDateException extends \InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('La fecha de nacimiento no puede estar vacía.');
    }

    public static function becauseFormatIsInvalid(string $value): self
    {
        return new self('La fecha "' . $value . '" no tiene formato válido (YYYY-MM-DD).');
    }

    public static function becauseIsInTheFuture(): self
    {
        return new self('La fecha de nacimiento no puede ser en el futuro.');
    }
}
