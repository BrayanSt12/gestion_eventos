<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio</title>
  <style>
    body {
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif;
      background: #f9fafb;
      margin: 0;
      padding: 0;
    }
    header {
      background: linear-gradient(90deg, #2563eb, #1d4ed8);
      padding: 14px 24px;
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header .left {
      display: flex;
      gap: 20px;
    }
    header a {
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      transition: opacity 0.2s ease;
    }
    header a:hover {
      opacity: 0.8;
    }
    main {
      padding: 40px;
      text-align: center;
    }
    h1 {
      font-size: 28px;
      color: #111827;
      margin-bottom: 16px;
    }
    p {
      font-size: 16px;
      color: #374151;
    }
    .card-container {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 30px;
    }
    .card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 20px;
      width: 200px;
      transition: transform 0.2s ease;
    }
    .card:hover {
      transform: translateY(-4px);
    }
    .card a {
      display: block;
      text-decoration: none;
      color: #2563eb;
      font-weight: 600;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <header>
    <div class="left">
      <a href="index.php?route=inicio">Inicio</a>
    </div>
    <div class="right">
      <a href="index.php?route=logout">Cerrar sesión</a>
    </div>
  </header>
  <main>
    <h1>Bienvenido al sistema de gestión de eventos</h1>
    <p>Selecciona una opción para comenzar:</p>

    <div class="card-container">
      <div class="card">
        <h3>Eventos</h3>
        <p>Gestiona tus eventos fácilmente.</p>
        <a href="index.php?route=events">Ir a Eventos</a>
      </div>
      <div class="card">
        <h3>Ubicaciones</h3>
        <p>Administra las ubicaciones disponibles.</p>
        <a href="index.php?route=locations">Ir a Ubicaciones</a>
      </div>
      <div class="card">
        <h3>Contactos</h3>
        <p>Maneja tu lista de contactos.</p>
        <a href="index.php?route=contacts">Ir a Contactos</a>
      </div>
    </div>
  </main>
</body>
</html>
