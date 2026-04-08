<?php

namespace Domain\Exceptions;

class UserAlreadyExistsException extends DomainException
{
    public function __construct(string $email)
    {
        parent::__construct("Ya existe un usuario con el email: $email");
    }
}
