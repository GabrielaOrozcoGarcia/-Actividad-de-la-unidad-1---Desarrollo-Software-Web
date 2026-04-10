<?php

declare(strict_types=1);

interface SavePetPort
{
    public function save(PetModel $pet): PetModel;
}
