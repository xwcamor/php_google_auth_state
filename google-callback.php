<?php
require_once 'config.php'; // Incluye tu $pdo y config
session_start();

if (isset($_GET['code'])) {
    // Paso 1: Intercambiar código por token
    $tokenData = http_build_query([
        'code' => $_GET['code'],
        'client_id' => $clientID,
        'client_secret' => $clientSecret,
        'redirect_uri' => $redirectUri,
        'grant_type' => 'authorization_code',
    ]);

    $ch = curl_init('https://oauth2.googleapis.com/token');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $tokenData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $tokenInfo = json_decode($response, true);

    if (isset($tokenInfo['access_token'])) {
        // Paso 2: Obtener datos del usuario
        $ch = curl_init('https://www.googleapis.com/oauth2/v1/userinfo?alt=json');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $tokenInfo['access_token']]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $userData = curl_exec($ch);
        curl_close($ch);

        $user = json_decode($userData, true);

        if (isset($user['email'])) {
            // Verificar si ya existe en la base de datos
            $stmt = $pdo->prepare("SELECT estado FROM usuarios_google WHERE email = ?");
            $stmt->execute([$user['email']]);
            $registro = $stmt->fetch();

            // 🚫 Si ya tiene sesión activa, bloquear acceso
            if ($registro && $registro['estado'] == 1) {
                echo "<script>alert('Ya tienes una sesión activa en otro navegador.'); window.location.href='index.php';</script>";
                exit;
            }

            // ✅ Insertar o actualizar estado = 1
            if (!$registro) {
                $stmt = $pdo->prepare("INSERT INTO usuarios_google (nombre, email, foto, proveedor, creado_en, estado) VALUES (?, ?, ?, 'google', NOW(), 1)");
                $stmt->execute([
                    $user['name'],
                    $user['email'],
                    $user['picture']
                ]);
            } else {
                $stmt = $pdo->prepare("UPDATE usuarios_google SET estado = 1 WHERE email = ?");
                $stmt->execute([$user['email']]);
            }

            // ✅ Guardar datos en sesión
            $_SESSION['nombre'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['foto'] = $user['picture'];

            header('Location: dashboard.php');
            exit;
        }
    } else {
        echo "Error al obtener token de acceso.";
    }
} else {
    echo "Código de autorización no recibido.";
}
?>
