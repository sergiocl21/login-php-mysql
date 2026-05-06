<?php
require_once 'includes/middleware.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand mb-0 h1">Mi Panel</span>
    <a href="auth/logout.php" class="btn btn-outline-light btn-sm">Cerrar sesión</a>
</nav>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body p-4">
            <h4>¡Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre']) ?>! 👋</h4>
            <p class="text-muted mt-2">
                Accediste correctamente al panel privado.<br>
                Esta página está protegida — solo usuarios autenticados pueden verla.
            </p>
            <hr>
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="card text-center border-primary">
                        <div class="card-body">
                            <h5 class="card-title">🔐 Sesión activa</h5>
                            <p class="card-text text-muted">Tu sesión está iniciada correctamente.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center border-success">
                        <div class="card-body">
                            <h5 class="card-title">✅ Ruta protegida</h5>
                            <p class="card-text text-muted">Acceso denegado sin autenticación.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center border-warning">
                        <div class="card-body">
                            <h5 class="card-title">🔒 Contraseña segura</h5>
                            <p class="card-text text-muted">Encriptada con password_hash.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>