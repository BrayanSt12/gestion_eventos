<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar evento</title>
  <link rel="stylesheet" href="/gestion_eventos/views/layout/style.css">
</head>
<body>
  <?php include __DIR__ . '/../layout/menu.php'; ?>
  <h1>Editar evento</h1>
  <form method="POST" action="/gestion_eventos/update_event">
    <input type="hidden" name="id" value="<?= $event['id'] ?>">

    <label>Título:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($event['title']) ?>" required>

    <label>Clasificación:</label>
    <select name="classification">
      <option value="Conferencia" <?= $event['classification']=='Conferencia'?'selected':'' ?>>Conferencia</option>
      <option value="Taller" <?= $event['classification']=='Taller'?'selected':'' ?>>Taller</option>
      <option value="Seminario" <?= $event['classification']=='Seminario'?'selected':'' ?>>Seminario</option>
      <option value="Otro" <?= $event['classification']=='Otro'?'selected':'' ?>>Otro</option>
    </select>

    <label>Inicio:</label>
    <input type="datetime-local" name="start_at" value="<?= date('Y-m-d\TH:i', strtotime($event['start_at'])) ?>" required>

    <label>Fin:</label>
    <input type="datetime-local" name="end_at" value="<?= date('Y-m-d\TH:i', strtotime($event['end_at'])) ?>" required>

    <label>Descripción:</label>
    <textarea name="description"><?= htmlspecialchars($event['description']) ?></textarea>

    <label>Ubicación:</label>
    <select name="location_id">
      <?php foreach ($locations as $loc): ?>
        <option value="<?= $loc['id'] ?>" <?= $event['location_id']==$loc['id']?'selected':'' ?>>
          <?= htmlspecialchars($loc['title']) ?>
        </option>
      <?php endforeach; ?>
    </select>

    <button type="submit">Actualizar</button>
  </form>
</body>
</html>

