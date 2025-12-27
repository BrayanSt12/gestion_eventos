<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de eventos</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 0; background: #f9fafb; }
    header { background: #f3f4f6; padding: 14px 24px; display:flex; justify-content:flex-end; border-bottom:1px solid #d1d5db; }
    header a { background:#dc2626; color:#fff; padding:8px 12px; border-radius:6px; text-decoration:none; }
    header a:hover { background:#b91c1c; }
    main { padding:20px; }
    h1 { color:#333; }
    .table-container { background:#fff; padding:20px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,0.1); margin-top:20px; }
    table { width:100%; border-collapse:collapse; }
    th, td { padding:12px; border-bottom:1px solid #e5e7eb; }
    th { background:#2563eb; color:#fff; }
    tr:nth-child(even) td { background:#f3f4f6; }
    .delete-btn { background:#dc2626; color:#fff; padding:6px 10px; border-radius:6px; text-decoration:none; }
    .delete-btn:hover { background:#b91c1c; }
    .button { background:#2563eb; color:#fff; padding:8px 12px; border-radius:6px; text-decoration:none; }
    .button:hover { background:#1d4ed8; }
    .back-btn { background:#6b7280; color:#fff; padding:8px 12px; border-radius:6px; text-decoration:none; margin-left:10px; }
    .back-btn:hover { background:#4b5563; }
  </style>
</head>
<body>
  <header>
    <a href="index.php?route=logout">Cerrar sesión</a>
  </header>

  <main>
    <h1>Listado de eventos</h1>
    <a class="button" href="index.php?route=create_event">+ Crear nuevo evento</a>
    <a class="back-btn" href="index.php?route=inicio">← Atrás</a>
    <div class="table-container">
      <?php if (!empty($events)): ?>
        <table>
          <tr>
            <th>Título</th>
            <th>Clasificación</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Descripción</th>
            <th>Ubicación</th>
            <th>Acciones</th>
          </tr>
          <?php foreach ($events as $ev): ?>
            <tr>
              <td><?= htmlspecialchars($ev['title']) ?></td>
              <td><?= htmlspecialchars($ev['classification']) ?></td>
              <td><?= htmlspecialchars($ev['start_at']) ?></td>
              <td><?= htmlspecialchars($ev['end_at']) ?></td>
              <td><?= htmlspecialchars($ev['description']) ?></td>
              <td><?= htmlspecialchars($ev['location_title']) ?></td>
              <td>
                <a href="index.php?route=delete_event&id=<?= $ev['id'] ?>" class="delete-btn"
                   onclick="return confirm('¿Seguro que deseas eliminar este evento?');">Eliminar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php else: ?>
        <p>No hay eventos registrados.</p>
      <?php endif; ?>
    </div>
  </main>
</body>
</html>
