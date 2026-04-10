<?php

declare(strict_types=1);

interface UpdatePetPort
{
    public function update(PetModel $pet): PetModel;
}
