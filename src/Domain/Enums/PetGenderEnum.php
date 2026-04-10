<?php

declare(strict_types=1);

class PetGenderEnum
{
    const MALE   = 'MALE';
    const FEMALE = 'FEMALE';

    public static function values(): array
    {
        return array(self::MALE, self::FEMALE);
    }

    public static function isValid(string $value): bool
    {
        return in_array($value, self::values(), true);
    }

    public static function ensureIsValid(string $value): void
    {
        if (!self::isValid($value)) {
            throw InvalidPetGenderException::becauseValueIsInvalid($value);
        }
    }
}
