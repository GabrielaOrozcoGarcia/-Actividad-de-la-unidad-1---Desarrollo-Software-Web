<?php

namespace Domain\Exceptions;

class UserNotFoundException extends DomainException
{
    public function __construct(string $id)
    {
        parent::__construct("Usuario no encontrado: $id");
    }
}
