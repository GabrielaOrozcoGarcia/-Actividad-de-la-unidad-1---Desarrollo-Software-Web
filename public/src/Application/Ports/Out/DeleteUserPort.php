<?php

namespace Application\Ports\Out;

interface DeleteUserPort
{
    public function delete(string $id): void;
}
