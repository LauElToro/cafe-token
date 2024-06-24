<?php

require_once 'assets/lib/phpqrcode/qrlib.php';


// Directorio donde se guardarán los códigos QR generados
$tempDir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;

// Verifica si el directorio existe, si no, créalo
if (!is_dir($tempDir)) {
    mkdir($tempDir, 0777, true);
}

$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

$qrContent = "Contenido del código QR";

$fileName = $tempDir . 'qr_' . md5($qrContent) . '.png';

QRcode::png($qrContent, $fileName, QR_ECLEVEL_L, 6);

$montoCompra = isset($_POST['monto']) ? $_POST['monto'] : 0;


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
    <title>Wallet</title>
</head>
<body>
<?php require_once 'header.php'; ?>
<?php require_once 'admin/login.php'; ?>


<section class="Wallet">
    <div class="btn-menu">
        <label for="btn-menu" class="icon-menu">
            <img src="assets/img/simbolo.png" alt="">
        </label>
    </div>
    <input type="checkbox" id="btn-menu">
    <div class="container-menu">
        <div class="cont-menu">
            <div class="nav-menu">
                <a href="wallet.php">Deposits</a>
                <a href="">Transfer Network</a>
                <a href="conversor.php">Foreign Exchange</a>
            </div>
            <label for="btn-menu" class="icon-equis">X</label>
        </div>
    </div>
    <div class="NavWallet">
        <div>
            <ul>
                <li><a href="wallet.php">Deposits</a></li>
                <li><a href="">Transfer Network</a></li>
                <li><a href="conversor.php">Foreign Exchange</a></li>
            </ul>
        </div>
    </div>
    <div class="Fondos">
        <div class="FondosDiv">
            <p>Your Wallet</p>
            <div class="Tokens">
                <h4 class="mr-5"><?php echo $montoCompra; ?> Cafe-Tokens</h4>
                <p>Total Balance</p>
            </div>
        </div>
        <div class="btnsWallet">
            <!-- Botón y pop-up de depósito -->
            <button id="showQRButton" class="DepoWallet">Deposit</button>
            <div id="qrPopup" class="popup">
                <div class="pupDiv">
                    <h1>Depositar wallet</h1>
                    <div class="qrDP">
                        <img id="qrImage" src="<?php echo 'assets/views/temp/' . basename($fileName); ?>" alt="Código QR">
                    </div>
                    <span class="close" id="closeQRButton">&times;</span>
                    <div class="DivWallet">
                        <p id="walletAddress"></p>
                        <button id="copyButton"><img src="assets/img/copiar.png" alt="Copiar"></button>
                    </div>
                    <!-- <div class="qrDP mt-3"><a href="success.php">Depositar</a></div> -->
                    <div class="qrDP mt-3"><a href="pagos.php">Verification</a></div>
                </div>
            </div>
            <button class="DepoWallet">Withdraw</button>
        </div>
        <br><br><br>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const showQRButton = document.getElementById('showQRButton');
    const qrPopup = document.getElementById('qrPopup');
    const closeQRButton = document.getElementById('closeQRButton');

    showQRButton.addEventListener('click', () => {
        qrPopup.style.display = 'block'; // Mostrar el popup al hacer clic en el botón
        const walletAddress = '0x5174a5899eC011AF490f463678c46Cd0E8C56B2e'; // Dirección de la billetera
        const walletAddressParagraph = document.getElementById('walletAddress');
        walletAddressParagraph.textContent = walletAddress;
    });

    closeQRButton.addEventListener('click', () => {
        qrPopup.style.display = 'none'; // Cerrar el popup al hacer clic en el botón de cerrar
    });
});
</script>

</body>

<?php require_once 'footer.php'; ?>

</html>
