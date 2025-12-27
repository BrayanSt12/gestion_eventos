<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de contactos</title>
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
  </style>
</head>
<body>
  <header>
    <a href="index.php?route=logout">Cerrar sesión</a>
  </header>

  <main>
    <h1>Listado de contactos</h1>
    <a class="button" href="index.php?route=create_contact">+ Crear nuevo contacto</a>
    <div class="table-container">
      <?php if (!empty($contacts)): ?>
        <table>
          <tr>
            <th>Nombre completo</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
          </tr>
          <?php foreach ($contacts as $c): ?>
            <tr>
              <td><?= htmlspecialchars($c['full_name']) ?></td>
              <td><?= htmlspecialchars($c['email']) ?></td>
              <td><?= htmlspecialchars($c['phone']) ?></td>
              <td>
                <a href="index.php?route=delete_contact&id=<?= $c['id'] ?>" class="delete-btn"
                   onclick="return confirm('¿Seguro que deseas eliminar este contacto?');">Eliminar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php else: ?>
        <p>No hay contactos registrados.</p>
      <?php endif; ?>
    </div>
  </main>
</body>
</html>
