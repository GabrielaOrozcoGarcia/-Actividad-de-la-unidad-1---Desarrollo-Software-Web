<?php

namespace Application\Commands;

class DeleteUserCommand
{
    public function __construct(
        public readonly string $id
    ) {}
}
