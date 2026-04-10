<?php

declare(strict_types=1);

class PetHabitatEnum
{
    const DOMESTIC = 'DOMESTIC';
    const WILD     = 'WILD';

    public static function values(): array
    {
        return array(self::DOMESTIC, self::WILD);
    }

    public static function isValid(string $value): bool
    {
        return in_array($value, self::values(), true);
    }

    public static function ensureIsValid(string $value): void
    {
        if (!self::isValid($value)) {
            throw InvalidPetHabitatException::becauseValueIsInvalid($value);
        }
    }
}
