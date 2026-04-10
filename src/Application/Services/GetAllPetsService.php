<?php

declare(strict_types=1);

final class GetAllPetsService implements GetAllPetsUseCase
{
    private GetAllPetsPort $getAllPetsPort;

    public function __construct(GetAllPetsPort $getAllPetsPort)
    {
        $this->getAllPetsPort = $getAllPetsPort;
    }

    public function execute(GetAllPetsQuery $query): array
    {
        return $this->getAllPetsPort->getAll();
    }
}
