<?php

namespace Domain\Exceptions;

class InvalidCredentialsException extends DomainException
{
    public function __construct()
    {
        parent::__construct("Credenciales inválidas");
    }
}
