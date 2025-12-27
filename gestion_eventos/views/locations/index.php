<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de ubicaciones</title>
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
    .edit-btn { background:#f59e0b; color:#fff; padding:6px 10px; border-radius:6px; cursor:pointer; }
    .delete-btn { background:#dc2626; color:#fff; padding:6px 10px; border-radius:6px; text-decoration:none; }
    .delete-btn:hover { background:#b91c1c; }
    .button { background:#2563eb; color:#fff; padding:8px 12px; border-radius:6px; text-decoration:none; }
    .button:hover { background:#1d4ed8; }
    .back-btn { background:#6b7280; color:#fff; padding:8px 12px; border-radius:6px; text-decoration:none; margin-left:10px; }
    .back-btn:hover { background:#4b5563; }

    /* Modal */
    .modal { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); justify-content:center; align-items:center; z-index:1000; }
    .modal.open { display:flex; }
    .modal-content { background:#fff; padding:20px; border-radius:12px; width:420px; box-shadow:0 10px 25px rgba(0,0,0,0.2); position:relative; }
    .close-btn { position:absolute; top:10px; right:10px; background:transparent; border:none; font-size:22px; cursor:pointer; }
    label { display:block; margin-top:10px; font-weight:bold; }
    input { width:100%; padding:8px; margin-top:4px; border:1px solid #ccc; border-radius:6px; }
    .submit-btn { margin-top:15px; background:#2563eb; color:#fff; padding:10px 16px; border:none; border-radius:6px; cursor:pointer; }
    .submit-btn:hover { background:#1d4ed8; }
  </style>
</head>
<body>
  <header>
    <a href="/gestion_eventos/index.php?route=logout">Cerrar sesión</a>
  </header>

  <main>
    <h1>Listado de ubicaciones</h1>
    <a class="button" href="/gestion_eventos/index.php?route=create_location">+ Crear nueva ubicación</a>
    <a class="back-btn" href="/gestion_eventos/index.php?route=inicio">← Atrás</a>

    <div class="table-container">
      <?php if (!empty($locations)): ?>
        <table>
          <tr>
            <th>Título</th><th>Dirección</th><th>Latitud</th><th>Longitud</th><th>Acciones</th>
          </tr>
          <?php foreach ($locations as $loc): ?>
            <tr data-id="<?= $loc['id'] ?>">
              <td class="col-title"><?= htmlspecialchars($loc['title']) ?></td>
              <td class="col-address"><?= htmlspecialchars($loc['address']) ?></td>
              <td class="col-latitude"><?= htmlspecialchars($loc['latitude']) ?></td>
              <td class="col-longitude"><?= htmlspecialchars($loc['longitude']) ?></td>
              <td>
                <span class="edit-btn"
                  onclick="openLocationModal(
                    '<?= $loc['id'] ?>',
                    '<?= htmlspecialchars($loc['title']) ?>',
                    '<?= htmlspecialchars($loc['address']) ?>',
                    '<?= htmlspecialchars($loc['latitude']) ?>',
                    '<?= htmlspecialchars($loc['longitude']) ?>'
                  )">Editar</span>
                <a href="/gestion_eventos/index.php?route=delete_location&id=<?= $loc['id'] ?>" class="delete-btn"
                   onclick="return confirm('¿Seguro que deseas eliminar esta ubicación?');">Eliminar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      <?php else: ?>
        <p>No hay ubicaciones registradas.</p>
      <?php endif; ?>
    </div>
  </main>

  <!-- Modal -->
  <div id="locationModal" class="modal">
    <div class="modal-content">
      <button type="button" class="close-btn" onclick="closeLocationModal()">&times;</button>
      <h2>Editar ubicación</h2>
      <form id="editLocationForm">
        <input type="hidden" name="id" id="loc_id">
        <label>Título:</label>
        <input type="text" name="title" id="loc_title" required>
        <label>Dirección:</label>
        <input type="text" name="address" id="loc_address">
        <label>Latitud:</label>
        <input type="text" name="latitude" id="loc_latitude">
        <label>Longitud:</label>
        <input type="text" name="longitude" id="loc_longitude">
        <button type="submit" class="submit-btn">Actualizar ubicación</button>
      </form>
    </div>
  </div>

  <script>
    const modal = document.getElementById('locationModal');

    function openLocationModal(id, title, address, lat, longi) {
      document.getElementById('loc_id').value = id;
      document.getElementById('loc_title').value = title;
      document.getElementById('loc_address').value = address;
      document.getElementById('loc_latitude').value = lat;
      document.getElementById('loc_longitude').value = longi;
      modal.classList.add('open');
    }

    function closeLocationModal() {
      modal.classList.remove('open');
    }

    // AJAX para actualizar ubicación
    document.getElementById('editLocationForm').addEventListener('submit', function(e) {
      e.preventDefault();
      const formData = new FormData(this);

      fetch('/gestion_eventos/index.php?route=update_location', {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        if (data.success) {
          const row = document.querySelector(`tr[data-id="${formData.get('id')}"]`);
          row.querySelector('.col-title').textContent = formData.get('title');
          row.querySelector('.col-address').textContent = formData.get('address');
          row.querySelector('.col-latitude').textContent = formData.get('latitude');
          row.querySelector('.col-longitude').textContent = formData.get('longitude');
          closeLocationModal();
        } else {
          alert("Error al actualizar la ubicación");
        }
      })
      .catch(err => console.error(err));
    });
  </script>
</body>
</html>
