<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de contactos</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 0; background: #f9fafb; }
    header {
      background: #f3f4f6; padding: 14px 24px; color: #374151;
      display: flex; justify-content: flex-end; align-items: center;
      border-bottom: 1px solid #d1d5db;
    }
    header a {
      color: #fff; text-decoration: none; font-weight: 600;
      padding: 8px 12px; background: #dc2626;
      border: 1px solid #b91c1c; border-radius: 6px;
    }
    header a:hover { background: #b91c1c; }
    main { padding: 20px; }
    h1 { color: #333; }
    .table-container {
      background: #fff; padding: 20px; border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin-top: 20px;
    }
    table { width: 100%; border-collapse: separate; border-spacing: 0; }
    th, td { padding: 12px; text-align: left; }
    th { background: #2563eb; color: white; font-weight: bold; }
    tr:nth-child(even) td { background: #f3f4f6; }
    td { border-bottom: 1px solid #e5e7eb; }
    a.button {
      display: inline-block; padding: 8px 12px; background: #28a745; color: white;
      text-decoration: none; border: 1px solid #1e7e34; border-radius: 6px; margin-right: 10px;
    }
    a.button:hover { background: #1e7e34; }
    .back-button {
      display: inline-block; padding: 8px 12px; background: #2563eb; color: white;
      text-decoration: none; border: 1px solid #1d4ed8; border-radius: 6px;
    }
    .back-button:hover { background: #1d4ed8; }
    .edit-btn {
      background:#f59e0b; color:#fff; padding:6px 10px; text-decoration:none;
      border-radius:6px; margin-right:5px;
    }
    .edit-btn:hover { background:#d97706; }
    .delete-btn {
      background:#dc2626; color:#fff; padding:6px 10px; text-decoration:none;
      border-radius:6px;
    }
    .delete-btn:hover { background:#b91c1c; }
  </style>
</head>
<body>
  <header>
    <a href="/gestion_eventos/index.php?route=logout">Cerrar sesión</a>
  </header>

  <main>
    <h1>Listado de contactos</h1>

    <a href="/gestion_eventos/index.php?route=inicio" class="back-button">← Atrás</a>
    <a href="/gestion_eventos/index.php?route=create_contact" class="button">Registrar nuevo contacto</a>

    <div class="table-container">
      <?php if (!empty($contacts)): ?>
        <table>
          <tr>
            <th>Nombre completo</th><th>Email</th><th>Teléfono</th><th>Acciones</th>
          </tr>
          <?php foreach ($contacts as $ct): ?>
            <tr>
              <td><?= htmlspecialchars($ct['full_name']) ?></td>
              <td><?= htmlspecialchars($ct['email']) ?></td>
              <td><?= htmlspecialchars($ct['phone']) ?></td>
              <td>
                <a href="/gestion_eventos/index.php?route=edit_contact&id=<?= $ct['id'] ?>" class="edit-btn">Editar</a>
                <a href="/gestion_eventos/index.php?route=delete_contact&id=<?= $ct['id'] ?>" class="delete-btn"
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
