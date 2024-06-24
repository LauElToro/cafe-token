<?php

// Credenciales de la base de datos local
define('LOCAL_DB_HOST', 'localhost');
define('LOCAL_DB_NAME', 'bd_email_token'); 
define('LOCAL_DB_USER', 'root'); 
define('LOCAL_DB_PASS', ''); 

function getDatabaseConnection() {
    $conn = new mysqli(LOCAL_DB_HOST, LOCAL_DB_USER, LOCAL_DB_PASS, LOCAL_DB_NAME);
    if ($conn->connect_error) {
        die("Conexión fallida a la base de datos: " . $conn->connect_error);
    }
    return $conn;
}

function validateToken($token) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("SELECT email FROM email_tokens WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    return $email ? $email : false;
}

function updatePassword($email, $newPassword) {
    global $liberty_pdo;

    try {
        $hashedPassword = hash('sha512', $newPassword);  // Cambiado a sha512
        $stmt = $liberty_pdo->prepare("UPDATE commerces SET clave_comercio = :clave_comercio WHERE email_comercio = :email_comercio");
        $stmt->execute(array(':clave_comercio' => $hashedPassword, ':email_comercio' => $email));
        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        error_log("Error al actualizar la contraseña: " . $e->getMessage());
        return false;
    }
}

function deleteToken($token) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("DELETE FROM email_tokens WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $email_comercio = validateToken($token);

    if (!$email_comercio) {
        die("Token inválido o expirado.");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $password = $_POST['clave_comercio'] ?? '';
        $confirmPassword = $_POST['confirmar_clave_comercio'] ?? '';

        if ($password === $confirmPassword) {
            if (updatePassword($email_comercio, $password)) {
                deleteToken($token);
                header("Location: ../panel/commerce");
                exit;
            } else {
                $error = "Error al actualizar la contraseña. Por favor, inténtalo de nuevo.";
            }
        } else {
            $error = "Las contraseñas no coinciden.";
        }
    }
} else {
    die("Token no proporcionado.");
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/wallet.css">
    <link rel="stylesheet" href="assets/css/popup.css">
    <title>New Pass</title>
</head>
<body>
<?php require_once 'header.php'; ?>
<?php require_once 'admin/login.php'; ?>

<input type="text">
<input type="text">
<button>enviar</button>

</body>

<?php require_once 'footer.php'; ?>

</html>
