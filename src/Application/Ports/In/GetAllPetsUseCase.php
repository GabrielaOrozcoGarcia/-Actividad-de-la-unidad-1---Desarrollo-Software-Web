<?php

declare(strict_types=1);

interface GetAllPetsUseCase
{
    /** @return PetModel[] */
    public function execute(GetAllPetsQuery $query): array;
}
