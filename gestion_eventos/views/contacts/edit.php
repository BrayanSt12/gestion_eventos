<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar contacto</title>
  <link rel="stylesheet" href="/gestion_eventos/views/layout/style.css">
</head>
<body>
  <?php include __DIR__ . '/../layout/menu.php'; ?>
  <h1>Editar contacto</h1>
  <form method="POST" action="/gestion_eventos/update_contact">
    <input type="hidden" name="id" value="<?= $contact['id'] ?>">

    <label>Tratamiento:</label>
    <input type="text" name="salutation" value="<?= htmlspecialchars($contact['salutation']) ?>">

    <label>Nombre completo:</label>
    <input type="text" name="full_name" value="<?= htmlspecialchars($contact['full_name']) ?>" required>

    <label>Cédula:</label>
    <input type="text" name="national_id" value="<?= htmlspecialchars($contact['national_id']) ?>">

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($contact['email']) ?>">

    <label>Teléfono:</label>
    <input type="text" name="phone" value="<?= htmlspecialchars($contact['phone']) ?>">

    <label>Foto (URL):</label>
    <input type="text" name="photo_url" value="<?= htmlspecialchars($contact['photo_url']) ?>">

    <button type="submit">Actualizar contacto</button>
  </form>
</body>
</html>
