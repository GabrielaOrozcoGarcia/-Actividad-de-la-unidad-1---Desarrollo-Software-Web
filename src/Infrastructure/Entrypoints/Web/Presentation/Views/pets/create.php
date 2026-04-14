<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/menu.php'; ?>
<h1>Registrar mascota</h1>
<?php if (!empty($message)): ?>
    <div class="alert-error"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></div>
<?php endif; ?>
<form method="POST" action="?route=pets.store">
    <div class="form-group">
        <label>Nombre</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['name'])): ?><div class="field-error"><?= htmlspecialchars($errors['name'], ENT_QUOTES, 'UTF-8') ?></div><?php endif; ?>
    </div>
    <div class="form-group">
        <label>Especie</label><br>
        <input type="text" name="species" value="<?= htmlspecialchars($old['species'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['species'])): ?><div class="field-error"><?= htmlspecialchars($errors['species'], ENT_QUOTES, 'UTF-8') ?></div><?php endif; ?>
    </div>
    <div class="form-group">
        <label>Raza</label><br>
        <input type="text" name="breed" value="<?= htmlspecialchars($old['breed'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['breed'])): ?><div class="field-error"><?= htmlspecialchars($errors['breed'], ENT_QUOTES, 'UTF-8') ?></div><?php endif; ?>
    </div>
    <div class="form-group">
        <label>Genero</label><br>
        <select name="gender">
            <?php foreach ($genderOptions as $opt): ?>
                <option value="<?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>"
                    <?= (($old['gender'] ?? '') === $opt) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Peso (kg)</label><br>
        <input type="number" name="weight" step="0.01" min="0.01"
            value="<?= htmlspecialchars($old['weight'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['weight'])): ?><div class="field-error"><?= htmlspecialchars($errors['weight'], ENT_QUOTES, 'UTF-8') ?></div><?php endif; ?>
    </div>
    <div class="form-group">
        <label>Tamaño</label><br>
        <select name="size">
            <?php foreach ($sizeOptions as $opt): ?>
                <option value="<?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>"
                    <?= (($old['size'] ?? '') === $opt) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Color</label><br>
        <input type="text" name="color" value="<?= htmlspecialchars($old['color'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['color'])): ?><div class="field-error"><?= htmlspecialchars($errors['color'], ENT_QUOTES, 'UTF-8') ?></div><?php endif; ?>
    </div>
    <div class="form-group">
        <label>Fecha de nacimiento</label><br>
        <input type="date" name="birth_date" value="<?= htmlspecialchars($old['birth_date'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['birth_date'])): ?><div class="field-error"><?= htmlspecialchars($errors['birth_date'], ENT_QUOTES, 'UTF-8') ?></div><?php endif; ?>
    </div>
    <div class="form-group">
        <label>Propietario</label><br>
        <input type="text" name="owner" value="<?= htmlspecialchars($old['owner'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['owner'])): ?><div class="field-error"><?= htmlspecialchars($errors['owner'], ENT_QUOTES, 'UTF-8') ?></div><?php endif; ?>
    </div>
    <div class="form-group">
        <label>Habitat</label><br>
        <select name="habitat">
            <?php foreach ($habitatOptions as $opt): ?>
                <option value="<?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>"
                    <?= (($old['habitat'] ?? '') === $opt) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($opt, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>
            <input type="checkbox" name="has_vaccines" value="1"
                <?= !empty($old['has_vaccines']) ? 'checked' : '' ?>>
            ¿Tiene vacunas?
        </label>
    </div>
    <div class="form-group">
        <label>Veterinario</label><br>
        <input type="text" name="veterinarian" value="<?= htmlspecialchars($old['veterinarian'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <?php if (!empty($errors['veterinarian'])): ?><div class="field-error"><?= htmlspecialchars($errors['veterinarian'], ENT_QUOTES, 'UTF-8') ?></div><?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Registrar mascota</button>
    &nbsp;<a class="btn" href="?route=pets.index">Cancelar</a>
</form>
<?php require __DIR__ . '/../layouts/footer.php'; ?>