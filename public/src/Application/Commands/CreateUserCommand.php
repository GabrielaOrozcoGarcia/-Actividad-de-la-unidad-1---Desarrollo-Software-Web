<?php

namespace Application\Commands;

class CreateUserCommand
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly int    $roleId
    ) {}
}
