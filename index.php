<?php
session_start();
if (isset($_SESSION['usuario_id'])) {
    header("Location: /login-php-mysql/dashboard.php");
    exit();
}
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center" style="min-height:100vh">
    <div class="card shadow" style="width:100%;max-width:420px">
        <div class="card-body p-4">
            <h4 class="card-title text-center mb-4">Iniciar sesión</h4>
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form action="auth/login.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
            <p class="text-center mt-3 mb-0">
                ¿No tienes cuenta? <a href="register.php">Regístrate</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>