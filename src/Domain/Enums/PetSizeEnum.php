<?php

declare(strict_types=1);

class PetSizeEnum
{
    const SMALL  = 'SMALL';
    const MEDIUM = 'MEDIUM';
    const LARGE  = 'LARGE';

    public static function values(): array
    {
        return array(self::SMALL, self::MEDIUM, self::LARGE);
    }

    public static function isValid(string $value): bool
    {
        return in_array($value, self::values(), true);
    }

    public static function ensureIsValid(string $value): void
    {
        if (!self::isValid($value)) {
            throw InvalidPetSizeException::becauseValueIsInvalid($value);
        }
    }
}
