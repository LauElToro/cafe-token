<?php
session_start();

function check_auth() {
    if (!isset($_SESSION['user_id'])) {
        // Redirigir a la página de inicio de sesión si el usuario no está autenticado
        header('Location: index.php');
        exit;
    }
}
?>