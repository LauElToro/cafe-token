<?php
// Conexión MySQL - Producción

$servernameProd = "cripto-cafe-db.cddiel1dqxsg.us-east-1.rds.amazonaws.com";
$portProd = 3306; // Puerto predeterminado de MySQL
$usernameProd = "admin";
$passwordProd = "TQDy9R1YjK8NRyNjjoJ7";
$dbnameProd = "hash";


// Crear conexión PDO
$cafe_token_pdo = new PDO("mysql:host=$servernameProd;port=$portProd;dbname=$dbnameProd", $usernameProd, $passwordProd);


// Configurar opciones de manejo de errores y excepciones
$cafe_token_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
