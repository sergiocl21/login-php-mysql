<?php
session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre   = trim($_POST['nombre']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    $errores = [];

    if (empty($nombre) || empty($email) || empty($password)) {
        $errores[] = "Todos los campos son obligatorios.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email no es válido.";
    }
    if (strlen($password) < 6) {
        $errores[] = "La contraseña debe tener al menos 6 caracteres.";
    }
    if ($password !== $confirm) {
        $errores[] = "Las contraseñas no coinciden.";
    }

    if (empty($errores)) {
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $errores[] = "Ya existe una cuenta con ese email.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$nombre, $email, $hash]);
            $_SESSION['usuario_id']     = $pdo->lastInsertId();
            $_SESSION['usuario_nombre'] = $nombre;
            header("Location: /login-php-mysql/dashboard.php");
            exit();
        }
    }

    $_SESSION['errores'] = $errores;
    header("Location: /login-php-mysql/register.php");
    exit();
}