<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar nuevo evento</title>
  <style>
    /* Estilo profesional inspirado en GitHub */
    :root {
      --fg: #24292f;
      --muted: #57606a;
      --border: #d0d7de;
      --bg: #f6f8fa;
      --box-bg: #ffffff;
      --primary: #0969da;
      --primary-hover: #0752ad;
      --success: #2ea44f;
      --success-hover: #2c974b;
    }
    * { box-sizing: border-box; }
    body {
      margin: 0; padding: 0;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif;
      color: var(--fg); background: var(--bg);
    }
    .container { max-width: 700px; margin: 30px auto; padding: 0 16px; }
    .Box {
      background: var(--box-bg); border: 1px solid var(--border); border-radius: 6px;
      padding: 20px;
    }
    h1 { font-size: 22px; margin: 0 0 16px; }
    label { display: block; font-weight: 600; margin-top: 12px; }
    input, textarea, select {
      width: 100%; margin-top: 6px; padding: 8px 10px;
      border: 1px solid var(--border); border-radius: 6px; background: #fff;
    }
    textarea { min-height: 100px; }
    .Actions { margin-top: 20px; display: flex; gap: 10px; }
    button {
      background: var(--success); color: #fff; border: none;
      padding: 10px 16px; border-radius: 6px; font-weight: 600; cursor: pointer;
    }
    button:hover { background: var(--success-hover); }
    a.btn-link {
      color: var(--primary); text-decoration: none; padding: 10px 16px;
    }
    a.btn-link:hover { text-decoration: underline; color: var(--primary-hover); }
  </style>
</head>
<body>
  <?php include __DIR__ . '/../layout/menu.php'; ?>

  <div class="container">
    <div class="Box">
      <h1>Registrar nuevo evento</h1>

      <form method="post" action="/gestion_eventos/index.php?route=store_event">
        <label for="title">Título</label>
        <input type="text" name="title" id="title" required>

        <label for="classification">Clasificación</label>
        <input type="text" name="classification" id="classification" required>

        <label for="start_at">Fecha inicio</label>
        <input type="datetime-local" name="start_at" id="start_at" required>

        <label for="end_at">Fecha fin</label>
        <input type="datetime-local" name="end_at" id="end_at" required>

        <label for="description">Descripción</label>
        <textarea name="description" id="description"></textarea>

        <label for="location_id">Ubicación</label>
        <select name="location_id" id="location_id" required>
          <option value="">-- Seleccione una ubicación --</option>
          <?php foreach ($locations as $loc): ?>
            <option value="<?= $loc['id'] ?>">
              <?= htmlspecialchars($loc['title']) ?> — <?= htmlspecialchars($loc['address']) ?>
            </option>
          <?php endforeach; ?>
        </select>

        <div class="Actions">
          <button type="submit">Guardar evento</button>
          <a href="/gestion_eventos/index.php?route=events" class="btn-link">Volver al listado</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
