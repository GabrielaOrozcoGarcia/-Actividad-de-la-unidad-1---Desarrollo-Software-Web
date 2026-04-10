<?php

declare(strict_types=1);

interface GetAllPetsPort
{
    /** @return PetModel[] */
    public function getAll(): array;
}
