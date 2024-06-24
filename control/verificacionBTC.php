<?php
function verificarHashBTC($transactionHash) {
    $binanceApiKey = 'lpp4n0vLpvBrE5LVkkAlWufQj52MgiqY7a4dkTH5aI30K6fcEfhkETTCIrFS6VgX';
    $binanceApiSecret = 'D3q7ybTdE0Cw4hnG6wEnHih189cmDsbAeLMZWTYfMCXS0GqtPFtGzO6n65s9yoE8';

    $url = 'https://api.binance.com/api/v3/allOrders';
    $params = array(
        'symbol' => 'BTCUSDT',
        'timestamp' => round(microtime(true) * 1000),
        'recvWindow' => 5000
    );
    $signature = hash_hmac('sha256', http_build_query($params), $binanceApiSecret);
    $params['signature'] = $signature;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-MBX-APIKEY: ' . $binanceApiKey));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $orders = json_decode($response);

    foreach ($orders as $order) {
        if ($order->clientOrderId == $transactionHash) {
            return 'Aprobada';
        }
    }
    return 'Pendiente';
}

function obtenerDetallesTransaccionBTC($txid) {
    // Configura tus credenciales de Binance
    $api_key = 'lpp4n0vLpvBrE5LVkkAlWufQj52MgiqY7a4dkTH5aI30K6fcEfhkETTCIrFS6VgX';
    $api_secret = 'D3q7ybTdE0Cw4hnG6wEnHih189cmDsbAeLMZWTYfMCXS0GqtPFtGzO6n65s9yoE8';

    $url = 'https://api.binance.com/api/v3/allOrders';
    $endpointTransactions = '/api/v3/myTrades';
    $symbol = 'BTCUSDT';

    $paramsTransactions = 'symbol=' . $symbol . '&timestamp=' . round(microtime(true) * 1000);
    $signature = hash_hmac('sha256', $paramsTransactions, $api_secret);
    $paramsTransactions .= '&signature=' . $signature;

    $curlTransactions = curl_init();
    curl_setopt($curlTransactions, CURLOPT_URL, $url . $endpointTransactions . '?' . $paramsTransactions);
    curl_setopt($curlTransactions, CURLOPT_HTTPHEADER, array('X-MBX-APIKEY: ' . $api_key));
    curl_setopt($curlTransactions, CURLOPT_RETURNTRANSFER, true);

    $responseTransactions = curl_exec($curlTransactions);
    curl_close($curlTransactions);

    $transactionData = json_decode($responseTransactions, true);

    foreach ($transactionData as $transaction) {
        if (isset($transaction['orderId']) && $transaction['orderId'] === $txid) {
            return array(
                'amount' => $transaction['qty'],
                'symbol' => $transaction['symbol'],
                'sender' => $transaction['commissionAsset'],
                'receiver' => $transaction['commissionAsset'],
                'network' => 'Bitcoin'
            );
        }
    }

    return array(
        'amount' => 'No disponible',
        'symbol' => 'No disponible',
        'sender' => 'No disponible',
        'receiver' => 'No disponible',
        'network' => 'Bitcoin'
    );
}
?>
