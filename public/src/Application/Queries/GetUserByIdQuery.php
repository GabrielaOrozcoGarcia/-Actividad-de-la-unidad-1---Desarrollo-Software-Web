<?php

namespace Application\Queries;

class GetUserByIdQuery
{
    public function __construct(
        public readonly string $id
    ) {}
}
