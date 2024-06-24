<?php
// Este archivo contiene funciones para verificar transacciones en la red Ethereum

function verificarTransaccion($currency, $transactionHash) {
    $infuraProjectId = 'c4732e1e867f4c5e95a982af6f67759b';
    $ethereumNodeUrl = "https://mainnet.infura.io/v3/$infuraProjectId";

    $jsonRpcUrl = $ethereumNodeUrl;

    $transaction = array(
        'jsonrpc' => '2.0',
        'method' => 'eth_getTransactionByHash',
        'params' => array($transactionHash),
        'id' => 1
    );

    $transactionJson = json_encode($transaction);

    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/json',
            'content' => $transactionJson
        )
    );

    $context = stream_context_create($options);

    $response = file_get_contents($jsonRpcUrl, false, $context);

    $responseData = json_decode($response, true);

    if ($responseData === false) {
        return 'Error de conexión';
    }

    if (isset($responseData['error'])) {
        return 'No encontrada';
    }

    if (isset($responseData['result']) && $responseData['result'] !== null) {
        return 'Completada';
    }

    return 'Estado desconocido';
}

// Función para obtener detalles de la transacción Ethereum
function obtenerDetallesTransaccionETH($transactionHash) {
    $infuraProjectId = 'c4732e1e867f4c5e95a982af6f67759b';
    $ethereumNodeUrl = "https://mainnet.infura.io/v3/$infuraProjectId";

    // Crea la URL de la API JSON-RPC de Ethereum
    $jsonRpcUrl = $ethereumNodeUrl;

    // Crea el objeto de la transacción
    $transaction = array(
        'jsonrpc' => '2.0',
        'method' => 'eth_getTransactionByHash',
        'params' => array($transactionHash),
        'id' => 1
    );

    // Codifica la transacción en formato JSON
    $transactionJson = json_encode($transaction);

    // Configura las opciones para la solicitud HTTP
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/json',
            'content' => $transactionJson
        )
    );

    // Crea el contexto para la solicitud HTTP
    $context = stream_context_create($options);

    // Realiza la solicitud HTTP a la API JSON-RPC de Ethereum
    $response = file_get_contents($jsonRpcUrl, false, $context);

    // Decodifica la respuesta JSON
    $responseData = json_decode($response, true);

    // Verifica si la respuesta es válida
    if ($responseData === false) {
        // La respuesta no es un JSON válido, hubo un error en la solicitud
        return array(
            'amount' => 'No disponible',
            'symbol' => 'No disponible',
            'sender' => 'No disponible',
            'receiver' => 'No disponible',
            'network' => 'Ethereum'
        );
    }

    // Verifica si hay un error en la respuesta
    if (isset($responseData['error'])) {
        // Hubo un error en la solicitud o la transacción no fue encontrada
        return array(
            'amount' => 'No disponible',
            'symbol' => 'No disponible',
            'sender' => 'No disponible',
            'receiver' => 'No disponible',
            'network' => 'Ethereum'
        );
    }

    // Verifica si la transacción fue encontrada y contiene información
    if (isset($responseData['result']) && $responseData['result'] !== null) {
        // La transacción fue encontrada, se puede obtener sus detalles
        $transactionDetails = array(
            'amount' => hexdec($responseData['result']['value']) / 1e18,  // Ajuste aquí
            'symbol' => 'ETH',  // Ajuste aquí
            'sender' => $responseData['result']['from'],
            'receiver' => $responseData['result']['to'],
            'network' => 'Ethereum'
        );
        return $transactionDetails;
    }

    // Si llegamos aquí, no se pudieron obtener los detalles de la transacción
    return array(
        'amount' => 'No disponible',
        'symbol' => 'No disponible',
        'sender' => 'No disponible',
        'receiver' => 'No disponible',
        'network' => 'Ethereum'
    );
}

// Uso de la función para verificar una transacción específica (reemplaza 'TX_HASH' con el hash de transacción que deseas verificar)
$txHash = 'TX_HASH';
$estadoTransaccionETH = verificarTransaccion('ETH', $txHash);

// Mostrar el estado de la transacción ETH
echo 'Estado de la transacción: ' . $estadoTransaccionETH . '<br>';

// Mostrar los detalles de la transacción ETH si está completada
if ($estadoTransaccionETH === 'Completada') {
    $detallesTransaccionETH = obtenerDetallesTransaccionETH($txHash);
    echo 'Hash: ' . $txHash . '<br>';
    echo 'Monto de la transacción: ' . $detallesTransaccionETH['amount'] . ' ' . $detallesTransaccionETH['symbol'] . '<br>';
    echo 'Emisor: ' . $detallesTransaccionETH['sender'] . '<br>';
    echo 'Receptor: ' . $detallesTransaccionETH['receiver'] . '<br>';
    echo 'Red: ' . $detallesTransaccionETH['network'] . '<br>';
}
?>
