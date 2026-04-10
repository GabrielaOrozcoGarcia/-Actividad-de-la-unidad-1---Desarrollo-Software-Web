<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>
<h1>Lista de mascotas</h1>
<?php if (!empty($success)): ?>
    <div class="alert-success"><?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?></div>
<?php endif; ?>
<?php if (!empty($message)): ?>
    <div class="alert-error"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></div>
<?php endif; ?>
<p><a class="btn btn-primary" href="?route=pets.create">+ Registrar mascota</a></p>
<?php if (empty($pets)): ?>
    <p>No hay mascotas registradas todavia.</p>
<?php else: ?>
    <table border="1" cellpadding="8" cellspacing="0" style="border-collapse:collapse">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Raza</th>
                <th>Género</th>
                <th>Tamaño</th>
                <th>Hábitat</th>
                <th>Vacunas</th>
                <th>Propietario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pets as $pet): ?>
                <tr>
                    <td><?= htmlspecialchars($pet->getName(),    ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($pet->getSpecies(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($pet->getBreed(),   ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($pet->getGender(),  ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($pet->getSize(),    ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($pet->getHabitat(), ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= $pet->getHasVaccines() ? 'Si' : ' No' ?></td>
                    <td><?= htmlspecialchars($pet->getOwner(),   ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                        <a class="btn btn-sm" href="?route=pets.show&amp;id=<?= urlencode($pet->getId()) ?>">Ver</a>
                        <a class="btn btn-sm btn-warning" href="?route=pets.edit&amp;id=<?= urlencode($pet->getId()) ?>">Editar</a>
                        <form method="POST" action="?route=pets.delete" style="display:inline"
                            onsubmit="return confirm('¿Eliminar esta mascota?')">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($pet->getId(), ENT_QUOTES, 'UTF-8') ?>">
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<?php require __DIR__ . '/../layouts/footer.php'; ?>