<?php

declare(strict_types=1);

class InvalidPetWeightException extends \InvalidArgumentException
{
    public static function becauseValueIsNotPositive(): self
    {
        return new self('El peso debe ser un numero positivo mayor que cero.');
    }
}
