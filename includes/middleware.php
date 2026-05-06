<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: /login-php-mysql/index.php");
    exit();
}