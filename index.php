<?php 

// Analizar la URL solicitada
$requestURI = $_SERVER['REQUEST_URI'];
$baseURI = '/cafephp/';

// Eliminar la parte base de la URL
$route = str_replace($baseURI, '', $requestURI);

// Enrutador simple
switch ($route) {
    case 'index.php':
        require_once 'assets/views/home.php';
        break;
        case 'aboutUs.php':
            require_once 'assets/views/aboutUs.php';
            break;
        case 'tokenShop.php':
            require_once 'assets/views/tokenShop.php';
            break;
        case 'sustentability.php':
            require_once 'assets/views/sustentability.php';
            break;
        case 'fincaElSalvador.php':
            require_once 'assets/views/fincaElSalvador.php';
            break;
        case 'compraElSalvador.php':
            require_once 'assets/views/compraElSalvador.php';
            break;
        case 'fincaHonduras.php':
            require_once 'assets/views/fincaHonduras.php';
            break;
        case 'compraHonduras.php':
            require_once 'assets/views/compraHonduras.php';
            break;
        case 'wallet.php':
            require_once 'assets/views/wallet.php';
            break;
        case 'pagos.php':
            require_once 'assets/views/pagos.php';
            break;
        case 'conversor.php':
            require_once 'assets/views/conversor.php';
            break;
        case 'error.php':
            require_once 'assets/views/error.php';
            break;
        case 'success.php':
            require_once 'assets/views/success.php';
            break;
        case 'cancel.php':
            require_once 'assets/views/cancel.php';
            break;
        case 'new-pass.php':
            require_once 'assets/views/new-pass.php';
            break;

       

}











?>