<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "google");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener los usuarios
$sql = "SELECT id, nombre, email FROM usuarios ORDER BY id DESC";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Usuarios Registrados</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #121212;
      color: white;
      padding: 20px;
    }
    table {
      width: 100%;
      background: #1e1e1e;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 12px;
      border-bottom: 1px solid #333;
    }
    th {
      background: #222;
    }
    a {
      color: #18ffff;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <h1>Usuarios Registrados</h1>
  <a href="index.php">← Volver</a>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
          <td><?= $fila['id'] ?></td>
          <td><?= htmlspecialchars($fila['nombre']) ?></td>
          <td><?= htmlspecialchars($fila['email']) ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>

<?php
$conexion->close();
?>
