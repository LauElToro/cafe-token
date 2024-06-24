<?php
require_once 'config/config.php'; 

// Crear conexión PDO
$pdo = new PDO("mysql:host=$servernameProd;port=$portProd;dbname=$dbnameProd", $usernameProd, $passwordProd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Función para guardar la transacción en la base de datos
function guardarTransaccion($currency, $transactionHash, $estado, $transactionDetails, $pdo) {
    try {
        $emisor = $transactionDetails['sender'];
        $receptor = $transactionDetails['receiver'];
        $monto = $transactionDetails['amount'];
        $red = $transactionDetails['network'];
        $fecha = date("Y-m-d H:i:s");

        // Preparar y ejecutar la consulta para insertar el registro utilizando PDO
        $stmt = $pdo->prepare("INSERT INTO transacciones (coin, hash, estado, emisor, receptor, monto, red, fecha) VALUES (:coin, :hash, :estado, :emisor, :receptor, :monto, :red, :fecha)");

        // Enlazar los valores a los marcadores de posición
        $stmt->bindParam(':coin', $currency);
        $stmt->bindParam(':hash', $transactionHash);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':emisor', $emisor);
        $stmt->bindParam(':receptor', $receptor);
        $stmt->bindParam(':monto', $monto);
        $stmt->bindParam(':red', $red);
        $stmt->bindParam(':fecha', $fecha);

        // Ejecutar la consulta
        $stmt->execute();

        // Redirigir según el estado de la transacción
        if ($estado === "No encontrada") {
            header('Location: cancel.php');
            exit;
        } elseif ($estado === "Completada" || $estado === "Aprobada") {
            header('Location: success.php');
            exit;
        }

        // Mostrar detalles de la transacción
        echo "<p>Detalles de la transacción:</p>";
        echo "<p>Moneda: $currency</p>";
        echo "<p>Hash: $transactionHash</p>";
        echo "<p>Estado: $estado</p>";
        echo "<p>Emisor: $emisor</p>";
        echo "<p>Receptor: $receptor</p>";
        echo "<p>Monto: $monto</p>";
        echo "<p>Red: $red</p>";
        echo "<p>Fecha: $fecha</p>";
    } catch(PDOException $e) {
        echo "Error al guardar la transacción: " . $e->getMessage();
    }
}

// Manejar la solicitud POST
if (isset($_POST['submit'])) {
    $currency = $_POST['currency'];
    $transactionHash = $_POST['transaction-hash'];

    if ($currency === 'USDT' || $currency === 'DAI' || $currency === 'BUSD' || $currency === 'USDC') {
        require_once 'control/verificacionstablecoins.php';
        $result = verificarTransaccionStablecoinETH($currency, $transactionHash);
        $transactionDetails = obtenerDetallesTransaccionStablecoinETH($currency, $transactionHash);
    } elseif ($currency === 'BTC') {
        require_once 'control/verificacionbtc.php';
        $result = verificarHashBTC($transactionHash);
        $transactionDetails = obtenerDetallesTransaccionBTC($transactionHash);
    } else {
        require_once 'control/verificacioneth.php';
        $result = verificarTransaccion($currency, $transactionHash);
        $transactionDetails = obtenerDetallesTransaccionETH($transactionHash);
    }

    // Guarda la transacción en la base de datos
    guardarTransaccion($currency, $transactionHash, $result, $transactionDetails, $pdo);
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
    <title>Medios de pago</title>
</head>
<body>
<?php require_once 'header.php'; ?>
<?php require_once 'admin/login.php'; ?>

<div class="Wallet">
    <div class="Fondos">
        <h1 style="margin-top:3%;">Transaction Verification</h1>
        <form method="post">
            <label for="currency">Choose the currency:</label>
            <select class="DepoWallet" id="currency" name="currency">
                <option value="USDT">USDT (Tether)</option>
                <option value="DAI">DAI (Dai Stablecoin)</option>
                <option value="BTC">BTC (Bitcoin)</option>
                <option value="BUSD">BUSD (Binance USD)</option>
                <option value="USDC">USDC (USD Coin)</option>
                <option value="WBTC">BTC (Bitcoin, ERC-20)</option>
                <option value="ETH">ETH (Ethereum, ERC-20)</option>
            </select>
            <br>
            <label for="transaction-hash">Enter the hash of the transaction:</label>
            <input class="DepoWallet" type="text" id="transaction-hash" name="transaction-hash" required>
            <br>
            <input class="DepoWallet";" type="submit" name="submit" value="Verify">
        </form>
<section>
        <br><br><br>
    </div>
</div>
<?php require_once 'footer.php'; ?>
</body>
</html>
