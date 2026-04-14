<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>
<h1>Detalle de mascota</h1>
<?php if (!empty($message)): ?>
    <div class="alert-error"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></div>
<?php endif; ?>
<table class="detail-table">
    <tr>
        <th>ID</th>
        <td><?= htmlspecialchars($pet->getId(),           ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Nombre</th>
        <td><?= htmlspecialchars($pet->getName(),          ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Especie</th>
        <td><?= htmlspecialchars($pet->getSpecies(),       ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Raza</th>
        <td><?= htmlspecialchars($pet->getBreed(),         ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Genero</th>
        <td><?= htmlspecialchars($pet->getGender(),        ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Peso</th>
        <td><?= htmlspecialchars((string)$pet->getWeight(), ENT_QUOTES, 'UTF-8') ?> kg</td>
    </tr>
    <tr>
        <th>Tamaño</th>
        <td><?= htmlspecialchars($pet->getSize(),          ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Color</th>
        <td><?= htmlspecialchars($pet->getColor(),         ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Fecha nacimiento</th>
        <td><?= htmlspecialchars($pet->getBirthDate(),     ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Propietario</th>
        <td><?= htmlspecialchars($pet->getOwner(),         ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Habitat</th>
        <td><?= htmlspecialchars($pet->getHabitat(),       ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
    <tr>
        <th>Vacunas</th>
        <td><?= $pet->getHasVaccines() ? 'Si' : ' No' ?></td>
    </tr>
    <tr>
        <th>Veterinario</th>
        <td><?= htmlspecialchars($pet->getVeterinarian(),  ENT_QUOTES, 'UTF-8') ?></td>
    </tr>
</table>
<p style="margin-top: 16px;">
    <a class="btn btn-warning" href="?route=pets.edit&amp;id=<?= urlencode($pet->getId()) ?>">Editar</a>
    &nbsp;
    <a class="btn" href="?route=pets.index">Volver al listado</a>
</p>
<?php require __DIR__ . '/../layouts/footer.php'; ?>