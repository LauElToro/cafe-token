<?php
require_once 'config/config.php';

// Crear conexión PDO
$pdo = new PDO("mysql:host=$servernameProd;dbname=$dbnameProd", $usernameProd, $passwordProd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Crear conexión PDO
$pdo = new PDO("mysql:host=$servernameProd;dbname=$dbnameProd", $usernameProd, $passwordProd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Función para iniciar sesión
function login($email, $password, $pdo) {
    $stmt = $pdo->prepare("SELECT id, email, secret FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['secret'])) {
        // Usuario autenticado correctamente
        $sessionId = session_create_id(); // Generar un ID de sesión único
        $expires = time() + (60 * 60 * 24); // Sesión válida por 24 horas

        // Almacenar la sesión en la base de datos
        $stmt = $pdo->prepare("INSERT INTO sessions (session_id, expires, user_id, createdAt) VALUES (:session_id, :expires, :user_id, NOW())");
        $stmt->bindParam(':session_id', $sessionId);
        $stmt->bindParam(':expires', $expires);
        $stmt->bindParam(':user_id', $user['id']);
        $stmt->execute();

        // Establecer una cookie con el ID de sesión
        setcookie('session_id', $sessionId, $expires, '/');

        // Redirigir al usuario a wallet.php
        header('Location: wallet.php');
        exit; // Asegurar que el script se detenga después de la redirección
    } else {
        echo "Usuario no encontrado o contraseña incorrecta"; 
        return null;
    }
}

// Función para registrar un nuevo usuario
function register($email, $password, $pdo) {
    try {
        // Verificar si el email ya está registrado
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return ['success' => false, 'message' => 'El email ya está registrado'];
        }

        // Generar un ID único para el nuevo usuario
        $id = uniqid();

        // Hashear la contraseña
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insertar el nuevo usuario en la base de datos
        $stmt = $pdo->prepare("INSERT INTO users (id, email, secret) VALUES (:id, :email, :password)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();

        // Iniciar sesión del usuario automáticamente después del registro
        session_start();
        $_SESSION['user_id'] = $id;

        // Redirigir al usuario a wallet.php
        header('Location: wallet.php');
        exit;

        return ['success' => true, 'message' => 'Registro exitoso'];
    } catch(PDOException $e) {
        return ['success' => false, 'message' => 'Error al registrar el usuario: ' . $e->getMessage()];
    }
}

// Manejar la solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (isset($_POST['action'])) {
            if ($_POST['action'] === 'register') {
                // Manejar el registro de usuario
                $registration_result = register($email, $password, $pdo);
                
                if ($registration_result['success']) {
                    echo "Registro exitoso: " . $registration_result['message'];
                } else {
                    echo "Error al registrar: " . $registration_result['message'];
                }
            } elseif ($_POST['action'] === 'login') {
                // Manejar el inicio de sesión
                login($email, $password, $pdo);
            } else {
                echo "Error: Acción no válida.";
            }
        } else {
            echo "Error: No se especificó una acción.";
        }
    } else {
        echo "Error: Falta el email o la contraseña.";
    }
}

// Cerrar la conexión
$pdo = null;
?>


<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const loginLink = document.getElementById('loginLink');
    const signUpLink = document.getElementById('signUpLink');
    const forgotPasswordLink = document.getElementById('forgotPasswordLink');
    const popupOverlay = document.getElementById('popupOverlay');
    const closeButton = document.getElementById('closeButton');
    const closeButton2 = document.getElementById('closeButton2');

    loginLink.addEventListener('click', (event) => {
        event.preventDefault();
        popupOverlay.style.display = 'flex';
    });

    signUpLink.addEventListener('click', (event) => {
        event.preventDefault();
        document.getElementById('popupCont').style.display = 'none';
        document.getElementById('popupCont2').style.display = 'flex';
    });

    forgotPasswordLink.addEventListener('click', (event) => {
        event.preventDefault();
        document.getElementById('popupCont').style.display = 'none';
        document.getElementById('popupCont3').style.display = 'flex';;
    });

    closeButton.addEventListener('click', () => {
        popupOverlay.style.display = 'none';
    });

    closeButton2.addEventListener('click', () => {
        popupOverlay.style.display = 'none';
    });
    closeButton3.addEventListener('click', () => {
        popupOverlay.style.display = 'none';
    });
    popupOverlay.addEventListener('click', (event) => {
        if (event.target === popupOverlay) {
            popupOverlay.style.display = 'none';
        }
    });
});

document.addEventListener('DOMContentLoaded', (event) => {
    const signUpLink = document.getElementById('signUpLink');
    const accessLink = document.getElementById('accessLink');
    const popupCont = document.getElementById('popupCont');
    const popupCont2 = document.getElementById('popupCont2');
    const popupCont3 = document.getElementById('popupCont3');

    signUpLink.addEventListener('click', (event) => {
        event.preventDefault();
        popupCont.style.display = 'none';
        popupCont2.style.display = 'flex';
    });

    accessLink.addEventListener('click', (event) => {
        event.preventDefault();
        popupCont.style.display = 'flex';
        popupCont2.style.display = 'none';
    });

    closeButton2.addEventListener('click', () => {
        popupCont2.style.display = 'none';
        popupCont.style.display = 'flex';
    });
    closeButton3.addEventListener('click', () => {
        popupCont2.style.display = 'none';
        popupCont.style.display = 'flex';
    });

    popupCont2.addEventListener('click', (event) => {
        if (event.target === popupCont2) {
            popupCont2.style.display = 'none';
            popupCont.style.display = 'flex';
        }
    });
    popupCont3.addEventListener('click', (event) => {
        if (event.target === popupCont3) {
            popupCont2.style.display = 'none';
            popupCont.style.display = 'flex';
        }
    });
});
</script>

<section>
    <div id="popupOverlay" class="popupOverlay">
        <div id="popupCont" class="popupCont">
            <button class="closeButton" id="closeButton">X</button>
            <div class="popupData">
                <h1>Login</h1>
                <form id="login-form" method="post" action="">
                    <input type="hidden" name="action" value="login">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                    <br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <br>
                    <button type="submit">Login</button>
                    <p>¿You do not have an account? <a href="" id="signUpLink">Sign up here</a></p>
                    <p>¿Forgot your password? <a href="" id="forgotPasswordLink">Click here</a></p>
                </form>
            </div>
        </div>
        <div id="popupCont2" class="popupCont2">
            <button class="closeButton" id="closeButton2">X</button>
            <h1>Register</h1>
            <form id="register-form" method="post" action="">
                <input type="hidden" name="action" value="register">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <br>
                <button type="submit">Register</button>
                <p>Do you already have an account? <a id="accessLink" href="">Access here!</a></p>
            </form>
        </div>
        <div id="popupCont3" class="popupCont2">
            <button class="closeButton" id="closeButton3">X</button>
            <h1>Recovery Pass</h1>
            <form id="recovery-form" method="post">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
                <br>
                <button type="submit">Send</button>
                <br>
                <p>Do you already have an account? <a id="accessLink" href="">Access here!</a></p>
            </form>
        </div>
    </div>
</section>
