<?php

declare(strict_types=1);

class InvalidPetColorException extends \InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('El color de la mascota no puede estar vacio.');
    }
}
