<?php

declare(strict_types=1);

final class PetController
{
    private CreatePetUseCase  $createPetUseCase;
    private UpdatePetUseCase  $updatePetUseCase;
    private GetPetByIdUseCase $getPetByIdUseCase;
    private GetAllPetsUseCase $getAllPetsUseCase;
    private DeletePetUseCase  $deletePetUseCase;
    private PetWebMapper      $mapper;

    public function __construct(
        CreatePetUseCase  $createPetUseCase,
        UpdatePetUseCase  $updatePetUseCase,
        GetPetByIdUseCase $getPetByIdUseCase,
        GetAllPetsUseCase $getAllPetsUseCase,
        DeletePetUseCase  $deletePetUseCase,
        PetWebMapper      $mapper
    ) {
        $this->createPetUseCase  = $createPetUseCase;
        $this->updatePetUseCase  = $updatePetUseCase;
        $this->getPetByIdUseCase = $getPetByIdUseCase;
        $this->getAllPetsUseCase  = $getAllPetsUseCase;
        $this->deletePetUseCase  = $deletePetUseCase;
        $this->mapper            = $mapper;
    }

    public function index(): array
    {
        $pets = $this->getAllPetsUseCase->execute(new GetAllPetsQuery());
        return $this->mapper->fromModelsToResponses($pets);
    }

    public function show(string $id): PetResponse
    {
        $query = $this->mapper->fromIdToGetByIdQuery($id);
        $pet   = $this->getPetByIdUseCase->execute($query);
        return $this->mapper->fromModelToResponse($pet);
    }

    public function store(CreatePetWebRequest $request): PetResponse
    {
        $command = $this->mapper->fromCreateRequestToCommand($request);
        $pet     = $this->createPetUseCase->execute($command);
        return $this->mapper->fromModelToResponse($pet);
    }

    public function update(UpdatePetWebRequest $request): PetResponse
    {
        $command = $this->mapper->fromUpdateRequestToCommand($request);
        $pet     = $this->updatePetUseCase->execute($command);
        return $this->mapper->fromModelToResponse($pet);
    }

    public function delete(string $id): void
    {
        $command = $this->mapper->fromIdToDeleteCommand($id);
        $this->deletePetUseCase->execute($command);
    }
}
