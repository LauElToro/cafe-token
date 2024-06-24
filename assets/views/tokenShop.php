<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/tokenShop.css">
    <link rel="stylesheet" href="assets/css/popup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Livvic:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Livvic:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Token shop</title>
</head>
    <?php require_once 'assets/views/header.php'; ?>
    <?php require_once 'admin/login.php'; ?>

<body>
    <section>
         <div class="tokenShopSection1">
             <h2>TOKEN SHOP</h2>
             <img src="assets/img/TokenShop.png" alt="">
         </div>
    </section>
    <section class="section2">
        <h6>BUY TOKENS</h6>
        <div class="buttonsCont">
            <div class="buttonsSubCont1">
                <a href="fincaElSalvador.php">
                    <h4>El Salvador</h4>
                    <img src="assets/img/El Salvador.png" alt="">
                </a>
            </div>
            <div class="buttonsSubCont2">
                <a href="fincaHonduras.php">
                    <h4>Honduras</h4>
                    <img src="assets/img/Honduras.png" alt="">
                </a>
            </div>
        </div>
    </section>
    <section>
        <div class="countriesCont1">
            <h6>COMING SOON</h6>
            <h4>NORTH AMERICA</h4>
            <div class="countriesFlags1">
                <img src="assets/img/EstadosUnidos.png" alt="">
                <img src="assets/img/Mexico.png" alt="">
            </div>
        </div>
    </section>
    <section>
        <div class="countriesCont2">
            <h6>COMING SOON</h6>
            <h4>CENTRAL AMERICA</h4>
            <div class="countriesFlags2">
                <img src="assets/img/Guatemala.png" alt="">
                <img src="assets/img/CostaRica.png" alt="">
                <img src="assets/img/Nicaragua.png" alt="">
                <img src="assets/img/Panama.png" alt="">
            </div>
        </div>
    </section>
    <section>
        <div class="countriesCont3">
            <h6>COMING SOON</h6>
            <h4>SOUTH AMERICA</h4>
            <div class="countriesFlags3">
                <img src="assets/img/Brasil.png" alt="">
                <img src="assets/img/Colombia.png" alt="">
                <img src="assets/img/Ecuador.png" alt="">
            </div>
        </div>
    </section>
    <section>
        <div class="countriesCont4">
            <h6>COMING SOON</h6>
            <h4>EUROPE</h4>
            <div class="countriesFlags4">
                <img src="assets/img/UnionEuropea.png" alt="">
                <img src="assets/img/ReinoUnido.png" alt="">
            </div>
        </div>
    </section>
    <section>
        <div class="countriesCont5">
            <h6>COMING SOON</h6>
            <h4>AFRICA</h4>
            <div class="countriesFlags5">
                <img src="assets/img/Ghana.png" alt="">
            </div>
        </div>
    </section>
    <section>
        <div class="countriesCont6">
            <h6>COMING SOON</h6>
            <h4>ASIA</h4>
            <div class="countriesFlags6">
                <img src="assets/img/Dubai.png" alt="">
                <img src="assets/img/CoreaDelSur.png" alt="">
            </div>
        </div>
    </section>
    <section>
      <div class="contactUs" id="contactUs">
        <div class="contactUsInfo">
        <h4>CONTACT NOW</h4>
        <h5>GET IN TOUCH</h5>
        <p>If our platform and its content have caught your attention, but you still have questions or want more information about it, fill out the following information; one of our experts will be in touch shortly to provide you with more details about CaféToken and the cryptoeconomy on which our business model is based. Remember that the response time is not immediate and could take between a few minutes and a few hours.</p
        <ul>
          <li><h6>PHONE</h6></li>
          <li><p>+503 7256 6214</p></li>
          <li><h6>Email</h6></li>
          <li><p>info@cafe-token.com</p></li>
          <li><h6>ADDRESS</h6></li>
            <li><p>Calle 1234, Buenos Aires , Argentina</p></li>
          </ul>
        </div>
        <div class="contactUsForm">
          <form>
            <div class="inputCont">
              <input class="inputText" type="text" name="" id="" placeholder="Your Name">
            </div>
            <div class="inputCont">
              <input class="inputText" type="number" name="" id="" placeholder="Phone Number">
            </div>
            <div class="inputCont">
              <input class="inputText" type="email" name="" id="" placeholder="Your Email">
            </div>
            <div class="inputCont">
              <textarea id="message" placeholder="Your Message"></textarea>
            </div>
            <div class="inputCont">
              <input class="inputBtn" type="submit" name="" id="" value="SEND MESSAGE">
            </div>
          </form>
        </div>
      </div>
    </section>
    
  
    <?php require_once 'footer.php'; ?>
</body>
</html>