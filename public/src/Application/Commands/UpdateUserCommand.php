<?php

namespace Application\Commands;

class UpdateUserCommand
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly int    $roleId,
        public readonly string $status
    ) {}
}
