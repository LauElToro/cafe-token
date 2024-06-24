<?php
// Este archivo contiene la función para verificar el hash de transacción de BUSD en la red Ethereum (ERC20)

function verificarHashBUSD($transactionHash) {
    return verificarHash('BUSD', $transactionHash);
}

function verificarHash($currency, $transactionHash) {
    // Configura la URL del nodo Ethereum
    $ethereumNodeUrl = 'https://mainnet.infura.io/v3/c4732e1e867f4c5e95a982af6f67759b';

    // Realiza la conexión con el nodo Ethereum
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $ethereumNodeUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
        'jsonrpc' => '2.0',
        'method' => 'eth_getTransactionByHash',
        'params' => [$transactionHash],
        'id' => 1,
    ]));
    $response = curl_exec($ch);
    curl_close($ch);

    // Decodifica la respuesta JSON
    $result = json_decode($response);

    if (isset($result->result)) {
        $transaction = $result->result;

        // Verifica si el to de la transacción coincide con la dirección del contrato de BUSD
        if (($currency === 'BUSD' && $transaction->to === '0x4fabb145d64652a948d72533023f6e7a623c7c53')) {
            return 'Aprobada';
        } else {
            return 'Pendiente';
        }
    } else {
        return 'No encontrada';
    }
}
?>