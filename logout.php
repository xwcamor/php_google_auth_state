<?php
session_start();
require_once 'config.php';

if (isset($_SESSION['email'])) {
    $stmt = $pdo->prepare("UPDATE usuarios_google SET estado = 0 WHERE email = ?");
    $stmt->execute([$_SESSION['email']]);
}

session_unset();
session_destroy();
header("Location: index.php");
exit;
?>
