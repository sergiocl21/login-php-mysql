<?php
session_start();
session_destroy();
header("Location: /login-php-mysql/index.php");
exit();