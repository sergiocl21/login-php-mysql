<?php
session_start();
if (isset($_SESSION['usuario_id'])) {
    header("Location: /login-php-mysql/dashboard.php");
    exit();
}
$errores = $_SESSION['errores'] ?? [];
unset($_SESSION['errores']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
    <div class="card shadow" style="width:100%;max-width:440px">
        <div class="card-body p-4">
            <h4 class="card-title text-center mb-4">Crear cuenta</h4>
            <?php if (!empty($errores)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errores as $e): ?>
                            <li><?= htmlspecialchars($e) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form action="auth/register.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nombre completo</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirmar contraseña</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Registrarse</button>
            </form>
            <p class="text-center mt-3 mb-0">
                ¿Ya tienes cuenta? <a href="index.php">Inicia sesión</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>