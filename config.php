<?php
// Credenciales de Google
$clientID = 'TU_ID_CLIENTE';
$clientSecret = 'TU_CLIENTE_SECRETO';
$redirectUri = 'http://localhost/google/google-callback.php'; //TU URL

// Datos de conexión
$host = 'localhost';
$db = 'google';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
