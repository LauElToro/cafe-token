<?php
// Este archivo contiene funciones para verificar transacciones de stablecoins (USDT, DAI, BUSD) en la red de Ethereum

// Función para verificar transacción de stablecoin en la red de Ethereum
function verificarTransaccionStablecoinETH($currency, $transactionHash) {
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
        return 'Error de conexión';
    }

    // Verifica si hay un error en la respuesta
    if (isset($responseData['error'])) {
        // Hubo un error en la solicitud o la transacción no fue encontrada
        return 'No encontrada';
    }

    // Verifica si la transacción fue encontrada y contiene información
    if (isset($responseData['result']) && $responseData['result'] !== null) {
        // La transacción fue encontrada, se puede considerar como aprobada
        return 'Aprobada';
    }

    // Si llegamos aquí, no se pudieron obtener detalles de la transacción
    return 'Estado desconocido';
}

function obtenerDetallesTransaccionStablecoinETH($currency, $transactionHash) {
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
            'symbol' => $currency,
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
            'symbol' => $currency,
            'sender' => 'No disponible',
            'receiver' => 'No disponible',
            'network' => 'Ethereum'
        );
    }

    // Verifica si la transacción fue encontrada y contiene información
    if (isset($responseData['result']) && $responseData['result'] !== null) {
        // La transacción fue encontrada, se puede obtener sus detalles
        $inputData = $responseData['result']['input'];
        $amountHex = '0x' . substr($inputData, -64); // Ajuste aquí según el formato de datos
        $amountDecimal = hexdec($amountHex); // Convertir hex a decimal
        
        // Obtener solo los números antes del punto
        $amountInt = intval($amountDecimal);

        $transactionDetails = array(
            'amount' => $amountInt,
            'symbol' => $currency,
            'sender' => $responseData['result']['from'],
            'receiver' => $responseData['result']['to'],
            'network' => 'Ethereum'
        );
        return $transactionDetails;
    }

    // Si llegamos aquí, no se pudieron obtener detalles de la transacción
    return array(
        'amount' => 'No disponible',
        'symbol' => $currency,
        'sender' => 'No disponible',
        'receiver' => 'No disponible',
        'network' => 'Ethereum'
    );
}
?>
