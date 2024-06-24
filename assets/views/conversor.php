<?php



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Conver.css">
    <link rel="stylesheet" href="assets/css/popup.css">
    <title>Crypto Converter</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<?php require_once 'header.php'; ?>
  <?php require_once 'admin/login.php'; ?>

<body>
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
        <div class="converterCont">
        <form>
            <div class="DivCurrency">
                <div class="DivCstyle">
                    <label for="cryptoFrom">From</label>
                    <div class="DivMonstos">
                        <input type="number" id="amountInput" name="cryptoAmount" placeholder="Enter amount: " required>
                        <select id="cryptoFrom" name="cryptoFrom">
                            <option value="USD">USD</option>
                            <option value="BTC">BTC</option>
                            <option value="USDT">USDT</option>
                            <option value="BUSD">BUSD</option>
                            <option value="USDC">USDC</option>
                            <option value="DAI">DAI</option>
                            <option value="LTC">LTC</option>
                            <option value="ETH">ETH</option>
                            <option value="BNB">BNB</option>
                        </select>
                    </div>
                </div>
            </div>            
            <div><img class="felchasTarder" src="../img/flechas.png" alt=""></div>
            <div class="DivCurrency">
                <div class="DivCstyle">
                    <label for="cryptoFrom">To</label>
                    <div class="DivMonstos">
                <input type="text" id="resultInput" placeholder="0.00" readonly>
                <select id="cryptoTo" name="cryptoTo">
                    <option value="BTC">BTC</option>
                    <option value="USDT">USDT</option>
                    <option value="BUSD">BUSD</option>
                    <option value="USDC">USDC</option>
                    <option value="DAI">DAI</option>
                    <option value="LTC">LTC</option>
                    <option value="ETH">ETH</option>
                    <option value="BNB">BNB</option>
                </select>
            </div>
        </div>
    </div>
            <button class="btnConver" type="button" id="convertButton">Enter an amount</button>
        </form>

        <script>
            let rotationDegrees = 0;

            function rotateImage(image) {
                rotationDegrees += 360;
                image.style.transform = `rotate(${rotationDegrees}deg)`;
            }
            $(document).ready(function () {
                $("#convertButton").click(function () {
                    var amount = parseFloat($("input[name='cryptoAmount']").val());
                    var cryptoFrom = $("#cryptoFrom").val();
                    var cryptoTo = $("#cryptoTo").val();

                    if (amount > 0 && cryptoFrom && cryptoTo) {
                        var apiUrl = "https://min-api.cryptocompare.com/data/price?fsym=" + cryptoFrom + "&tsyms=" + cryptoTo;

                        $.get(apiUrl, function (data) {
                            var convertedAmount = (amount * data[cryptoTo]).toFixed(5);

                            $("#resultInput").val(convertedAmount).show();
                        });
                    }
                });

                // Función para actualizar el resultado cada 10 minutos
                function updateResult() {
                    $("#convertButton").trigger("click");
                }

                // Llama a la función de actualización cada 10 minutos
                setInterval(updateResult, 600000); // 10 minutos en milisegundos
            });

        </script>
        </div>
    </section>
    
  
</body>
<?php require_once 'footer.php'; ?>

</html>