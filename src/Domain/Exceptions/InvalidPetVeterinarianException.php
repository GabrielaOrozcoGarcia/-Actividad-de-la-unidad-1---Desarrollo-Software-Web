<?php

declare(strict_types=1);

class InvalidPetVeterinarianException extends \InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('El veterinario no puede estar vacío.');
    }
}
