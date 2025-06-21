<?php
require_once 'config.php';

$loginURL = "https://accounts.google.com/o/oauth2/v2/auth?" . http_build_query([
    'client_id' => $clientID,
    'redirect_uri' => $redirectUri,
    'response_type' => 'code',
    'scope' => 'email profile',
    'prompt' => 'select_account',
]);
?>
<!-- el resto del código de index.php que ya me diste queda igual -->

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear cuenta | Registro con Google o manual</title>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      height: 100vh;
      font-family: 'Orbitron', sans-serif;
      background: #0d0f14;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }

    .bg-blob {
      position: absolute;
      width: 600px;
      height: 600px;
      background: linear-gradient(135deg, #6f42c1, #18ffff);
      filter: blur(150px);
      border-radius: 50%;
      animation: float 8s ease-in-out infinite;
    }

    .blob1 {
      top: -200px;
      left: -200px;
    }

    .blob2 {
      bottom: -200px;
      right: -200px;
      background: linear-gradient(135deg, #ff0181, #ff8c00);
    }

    @keyframes float {
      0%, 100% { transform: translateY(0) scale(1); }
      50% { transform: translateY(20px) scale(1.1); }
    }

    .login-card {
      position: relative;
      width: 360px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255,255,255,0.2);
      border-radius: 20px;
      backdrop-filter: blur(20px);
      box-shadow: 0 8px 32px rgba(0,0,0,0.7);
      color: #fff;
      z-index: 2;
      text-align: center;
    }

    .login-card h2 {
      margin-bottom: 25px;
      font-size: 28px;
      letter-spacing: 2px;
    }

    .formulario {
    display: flex;
    flex-direction: column;
    gap: 10px;
    width: 100%;
    }

    .formulario label {
    text-align: left;
    font-size: 14px;
    margin-top: 10px;
    margin-bottom: 5px;
    color: #fff;
    }

    .formulario input,
    .formulario button {
    width: 100%;
    box-sizing: border-box;
    }


    form {
      display: flex;
      flex-direction: column;
      align-items: stretch;
      gap: 10px;
      margin-top: 20px;
      text-align: left;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    .form-group label {
      margin-bottom: 5px;
      font-size: 14px;
      color: #ccc;
    }

    .login-card input {
      width: 100%;
      padding: 12px 16px;
      border: none;
      border-radius: 10px;
      background: rgba(255,255,255,0.1);
      color: #fff;
      font-size: 14px;
      transition: background 0.3s;
    }

    .login-card input:focus {
      background: rgba(255,255,255,0.2);
      outline: none;
    }

    .btn {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
      transition: background 0.3s;
    }

    .btn-login {
      background: linear-gradient(135deg, #18ffff, #6f42c1);
      color: #111;
    }

    .btn-login:hover {
      background: linear-gradient(135deg, #6f42c1, #18ffff);
    }

    .google-btn {
    background: rgba(255,255,255,0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 12px;
    width: 100%;
    box-sizing: border-box;
    border-radius: 10px;
    margin-bottom: 15px;
    color: #fff;
    font-size: 14px;
    transition: background 0.3s;
    text-decoration: none;
    }

    .google-btn:hover {
    background: rgba(255,255,255,0.2);
    }

    .google-btn img {
    width: 20px;
    height: 20px;
    }


    .footer {
      margin-top: 20px;
      font-size: 13px;
      color: #aaa;
    }

    .footer a {
      color: #18ffff;
      text-decoration: none;
    }

    .footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="bg-blob blob1"></div>
  <div class="bg-blob blob2"></div>

  <div class="login-card">
    <h2>Acceso Neón</h2>

    <a class="btn google-btn" href="<?php echo htmlspecialchars($loginURL); ?>">
    <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google">
    Entrar con Google
    </a>


    <form action="validar_login.php" method="POST" class="formulario">
    <label for="email">Correo electrónico</label>
    <input type="email" name="email" id="email" placeholder="Ingresa tu correo" required>

    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña" required>

    <button type="submit" class="btn btn-login">Iniciar Sesión</button>
    </form>



    <div class="footer">
      ¿No tienes cuenta? <a href="#" onclick="mostrarModal()">Regístrate</a><br>
      <a href="#">¿Olvidaste tu contraseña?</a>
    </div>
  </div>

  <!-- MODAL DE REGISTRO -->
  <div id="modalRegistro" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.8); z-index:999; justify-content:center; align-items:center;">
  <div style="background:#1a1a1a; padding:30px; border-radius:15px; width:350px; position:relative; color:white;">
    <h2 style="margin-bottom: 15px;">Crear cuenta</h2>

    <form action="procesar_registro.php" method="POST" style="display:flex; flex-direction:column; gap:10px;">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" required style="padding:10px; border-radius:8px; background:#333; color:white; border:none;">

      <label for="email_registro">Correo</label>
      <input type="email" name="email" id="email_registro" required style="padding:10px; border-radius:8px; background:#333; color:white; border:none;">

      <label for="password_registro">Contraseña</label>
      <input type="password" name="password" id="password_registro" required style="padding:10px; border-radius:8px; background:#333; color:white; border:none;">

      <button type="submit" style="padding:12px; border:none; border-radius:10px; background:linear-gradient(135deg, #18ffff, #6f42c1); color:#111; font-weight:bold;">Registrarse</button>
    </form>

    <button onclick="cerrarModal()" style="position:absolute; top:10px; right:15px; background:none; border:none; color:#aaa; font-size:20px; cursor:pointer;">×</button>
  </div>
</div>

<script>
  function mostrarModal() {
    document.getElementById('modalRegistro').style.display = 'flex';
  }

  function cerrarModal() {
    document.getElementById('modalRegistro').style.display = 'none';
  }
</script>


</body>
</html>
