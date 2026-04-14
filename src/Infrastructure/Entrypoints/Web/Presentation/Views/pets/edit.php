<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>
<h1>Editar mascota</h1>
<?php if (!empty($message)): ?>
    <div class="alert-error"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></div>
<?php endif; ?>
<form method="POST" action="?route=pets.update">
    <input type="hidden" name="id" value="<?= htmlspecialchars($old['id'] ?? $pet->getId(), ENT_QUOTES, 'UTF-8') ?>">
    <div class="form-group">
        <label>Nombre</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($old['name'] ?? $pet->getName(), ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['name'])): ?><div class="field-error"><?= htmlspecialchars($errors['name'], ENT_QUOTES, 'UTF-8') ?></div><?php endif; ?>
    </div>
    <div class="form-group">
        <label>Especie</label><br>
        <input type="text" name="species" value="<?= htmlspecialchars($old['species'] ?? $pet->getSpecies(), ENT_QUOTES, 'UTF-8') ?>">
    </div>
    <div class="form-group">
        <label>Raza</label><br>
        <input type="text" name="breed" value="<?= htmlspecialchars($old['breed'] ?? $pet->getBreed(), ENT_QUOTES, 'UTF-8') ?>">
    </div>
    <div class="form-group">
        <label>Genero</label><br>
        <select name="gender">
            <?php foreach ($genderOptions as $opt): ?>
                <option value="<?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>"
                    <?= (($old['gender'] ?? $pet->getGender()) === $opt) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Peso (kg)</label><br>
        <input type="number" name="weight" step="0.01" min="0.01"
            value="<?= htmlspecialchars((string)($old['weight'] ?? $pet->getWeight()), ENT_QUOTES, 'UTF-8') ?>">
    </div>
    <div class="form-group">
        <label>Tamaño</label><br>
        <select name="size">
            <?php foreach ($sizeOptions as $opt): ?>
                <option value="<?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>"
                    <?= (($old['size'] ?? $pet->getSize()) === $opt) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Color</label><br>
        <input type="text" name="color" value="<?= htmlspecialchars($old['color'] ?? $pet->getColor(), ENT_QUOTES, 'UTF-8') ?>">
    </div>
    <div class="form-group">
        <label>Fecha de nacimiento</label><br>
        <input type="date" name="birth_date" value="<?= htmlspecialchars($old['birth_date'] ?? $pet->getBirthDate(), ENT_QUOTES, 'UTF-8') ?>">
    </div>
    <div class="form-group">
        <label>Propietario</label><br>
        <input type="text" name="owner" value="<?= htmlspecialchars($old['owner'] ?? $pet->getOwner(), ENT_QUOTES, 'UTF-8') ?>">
    </div>
    <div class="form-group">
        <label>Habitat</label><br>
        <select name="habitat">
            <?php foreach ($habitatOptions as $opt): ?>
                <option value="<?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>"
                    <?= (($old['habitat'] ?? $pet->getHabitat()) === $opt) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>
            <input type="checkbox" name="has_vaccines" value="1"
                <?= (isset($old['has_vaccines']) ? !empty($old['has_vaccines']) : $pet->getHasVaccines()) ? 'checked' : '' ?>>
            ¿Tiene vacunas?
        </label>
    </div>
    <div class="form-group">
        <label>Veterinario</label><br>
        <input type="text" name="veterinarian" value="<?= htmlspecialchars($old['veterinarian'] ?? $pet->getVeterinarian(), ENT_QUOTES, 'UTF-8') ?>">
    </div>
    <button type="submit" class="btn btn-primary">Guardar cambios</button>
    &nbsp;<a class="btn" href="?route=pets.index">Cancelar</a>
</form>
<?php require __DIR__ . '/../layouts/footer.php'; ?>