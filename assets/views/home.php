<?php
require_once 'config/config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/index.css">
  <link rel="stylesheet" href="assets/css/hovers.css">
  <link rel="stylesheet" href="assets/css/wallet.css">
  <link rel="stylesheet" href="assets/css/popup.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Livvic:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Livvic:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <title>Home</title>
  <script src="https://js.stripe.com/v3/"></script>

  <script>
    function showButton(element) {
  element.querySelector('h6').style.display = 'none';
  element.querySelector('h5').style.display = 'none';
  element.querySelector('button').style.display = 'block';
  element.querySelector('h6').style.opacity = '0';
  element.querySelector('h5').style.opacity = '0';
  element.querySelector('button').style.opacity = '1';
}
function showText(element) {
  element.querySelector('h6').style.display = 'block';
  element.querySelector('h5').style.display = 'block';
  element.querySelector('button').style.display = 'none';
  element.querySelector('h6').style.opacity = '1';
  element.querySelector('h5').style.opacity = '1';
  element.querySelector('button').style.opacity = '0';
}
  </script>

  
  
</head>
<?php require_once 'admin/login.php'; ?>
<header class="header">
  <div class="logo">
    <a href="#"> <img src="assets/img/logo.png" alt="Logo de la marca"></a>
  </div>
  <nav>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="aboutUs.php">About Us</a></li>
      <li><a href="tokenShop.php">Token Shop</a></li>
      <li><a href="sustentability.php">Sustentability</a></li>
      <li><a href="#" id="loginLink">Login</a></li>
    </ul>
  </nav>

  <a onclick="toggleNav()" class="menu" href="#">
    <button>Menu</button>
  </a>
  <div id="mobile-menu" class="overlay">
    <a onclick="toggleNav()" href="#" class="close">&times;</a>
    <div class="overlay-content.php">
      <a href="tokenShop.php">Token Shop</a>
      <a href="index.php">Home</a>
      <a href="aboutUs.php">About Us</a>
      <a href="sustentability.php">Sustentability</a>
      <a href="#" id="loginLink2">Login</a>
    </div>
  </div>
  <script>
    function toggleNav() {
      const menu = document.getElementById("mobile-menu");
      menu.classList.toggle("show");
    }
  </script>
</header>
<body>
  <section id="hero">
    <div class="mainInfo">
      <div class="mainInfoContainer">
        <div class="mainH4">
          <h4>Café Token</h4>
          <img src="assets/img/CafeTokenSubrayado.png" alt="">
        </div>
        <div class="mainH1">
        <h1 class="colored-heading"><br>AND EXPONENTIAL SOLUTIONS <br>FOR THE COFFE SECTOR</h1>
        </div>
        <div class="mainBtn">
          <button>
            <a href="tokenShop.php">GET YOUR TOKENS</a>
          </button>
        </div>
      </div>
    </div>
      <video muted autoplay loop>
        <source src="assets/img/Cafe Token Index.mp4" type="video/mp4">
      </video>
      <div class="capa"></div>
  </section>
  <section>
    <div class="secondContainer">
      <div class="superposicion"></div>
      <video muted autoplay loop>
        <source src="assets/img/Bitcoin.mp4">
      </video>
      <div class="secondContainerInfo">
        <h5>OUR NFTs</h5>
        <h3>What is Cafe Token?</h3>
        <h4>Innovating coffee farming through blockchain technology</h4>
        <p>Is the first tokenization platform for coffee plants and beans. This allows the coffee grower to finance from the planting stage and thus enter the world of crypto-economics. The primary purpose is to develop a flow of financing between the coffee farmer and the investor directly through the generation of a new financial asset through the creation of plant-backed tokens and the production of coffee beans.</p>
        <button>
          <a href="tokenShop.php">TOKEN SHOP</a>
        </button>
      </div>
    </div>
  </section>
  <section id="hero2">
    <div class="thirdContainer">
      <div class="thirdContainerInfo">
        <p>Blockchain: It can be defined as a mathematical structure for storing <br>data in a way that is almost impossible to falsify. It's a public e-book <br>that can be shared openly between disparate users, creating an <br>immutable record of your transactions.</p>
        <div class="thirdContainerSubCont">
          <button>
            <img src="assets/img/Play.png" alt="">
          </button>
          <h4>Watch the video</h4>
          </div>
      </div>
    </div>
        <video muted autoplay loop>
        <source src="assets/img/CafeTokenBackground.mp4" type="video/mp4">
        </video>
      <div class="capa2"></div>
  </section>
  <section>
    <div  class="fourthContainer">
      <div class="fourthContainerTittle">
          <h4>RECENTLY COMPLETED WORK</h4>
          <h3>Explore Our Projects</h3>
      </div>
      <div class="fourthContainerInfo">
        <div class="infoCont" onmouseover="showButton(this)" onmouseout="showText(this)">
          <img src="assets/img/CafeImg1.png" alt="">
          <h6>Read our</h6>
          <h5>Whitepaper</h5>
          <button style="display: none;">
            <a href="https://www.canva.com/design/DAFPV4gzol4/T04t1sS84szv2uxnux5bDA/view?utm_content=DAFPV4gzol4&utm_campaign=designshare&utm_medium=link&utm_source=publishsharelink#14">DOWNLOAD PDF</a>
          </button>
        </div>
        <div class="infoCont2" onmouseover="showButton(this)" onmouseout="showText(this)">
          <img src="assets/img/CafeImg2.png" alt="">
          <h6>Get a token</h6>
          <h5>Plant a Tree</h5>
            <button style="display: none;">
              <a href="tokenShop.php">TOKEN SHOP</a>
            </button>
        </div>
        <div class="infoCont3" onmouseover="showButton(this)" onmouseout="showText(this)">
          <img src="assets/img/CafeImg3.png" alt="">
          <h6>Join us</h6>
          <h5>Be a partner</h5>
          <button style="display: none;">
            <a href="#contactUs">PARTNERSHIP</a>
          </button>
        </div>
      </div>
      <div class="fourthContainerTokens">
        <div class="fourthContainerTokensSubCont">
          <a href="compraElSalvador.php">
            <img src="assets/img/TokenElSalvador2.png" alt="">
            <h5>El Salvador</h5>
            <h4>Finca Ruiseñor</h4>
            <button>BUY IT</button>
          </a>
          <a href="compraHonduras.php">
            <img src="assets/img/TokenHonduras2.png" alt="">
            <h5>Honduras</h5>
            <h4>Finca Ajagual</h4>
            <button>BUY IT</button>
          </a>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="fifthContainer">
      <div class="fifthContainerSubCont1">
        <img src="assets/img/OndasBg.png" alt="">
          <h4 class="h4Box">OUR BENEFITS</h4>
      </div>
      <div class="fifthContainerSubCont2">
        <div class="fifthContainerBox">
          <img src="assets/img/ContImg1.png" alt="">
          <h4>FUNDING</h4>
          <p>Financing effectively and innovatively all stages of coffee cultivation to achieve sustainability and development in the coffee sector.</p>
        </div>
        <div class="fifthContainerBox2">
          <img src="assets/img/ContImg2.png" alt="">
          <h4>RELIABILITY</h4>
          <p>Make secure financing investments through applications based on blockchain technology and the Smart contract tool.</p>
        </div>
        <div class="fifthContainerBox3">
          <img src="assets/img/ContImg3.png" alt="">
          <h4>COMMERCIALIZATION</h4>
          <p>Develop a commercial traceability strategy and direct distribution to position coffee in the world market.</p>
        </div>
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
  <section>
    <div class="seventhContainer">
      <div class="seventhSubCont1">
        <img src="assets/img/CafeTokenIcono.png" alt="">
        <h4>We are Leader in Coffe Market</h4>
      </div>
      <div class="seventhSubCont2">
        <button>
          <a href="aboutUs.php">DISCOVER MORE</a>
        </button>
      </div>
    </div>
  </section>
  

</body>
<footer>
  <div class="footerCont">
    <div class="footerInfo">
      <div class="footerLogo">
        <img src="assets/img/logo.png" alt="">
        <p>Digitize through BlockChain technology the cycle of coffee cultivation worldwide through CaféToken. As a result, it will alleviate the sector’s financial burden. But at the same time, it will build a revolutionary and impactful model for the coffee industry.
        </p>
      </div>
      <img src="assets/img/footerImg1.png" alt="">
      <div class="footerRedes">
        <a href="">
          <img src="assets/img/facebook.png" alt="">
        </a>
        <a href="">
          <img src="assets/img/twitter.png" alt="">
        </a>
        <a href="">
          <img src="assets/img/youtube.png" alt="">
        </a>
        <a href="">
          <img src="assets/img/instagram.png" alt="">
        </a>
      </div>
    </div>
    <div class="footerLinks">
      <ul class="ul1">
        <h4>Useful Links</h4>
        <li><a href="">New Projects</a></li>
        <li><a href="">Our Services</a></li>
        <li><a href="">Testimonials</a></li>
        <li><a href="aboutUs.php">About us</a></li>
        <li><a href="#contactUs">Contact us</a></li>
      </ul>
      <ul class="ul2">
        <h4>Newsletter</h4>
        <li><p>Suscribe to our weekly Newsletter and receive updates via email.</p></li>
        <li>
          <div class="footerInput">
            <input class="footerEmail" type="email" placeholder="Enter your email here...">
            <input class="footerBtn" type="submit" value="GO">
          </div>
        </li>
      </ul>
    </div>
  </div>
  <img class="footerImg2" src="assets/img/footerImg2.png" alt="">
  <div class="footerLow">
    <div class="footerCopy">
    <p>
      Copyright ©Smart Agro. All Right Reserved.
    </p>
  </div>
    <div class="footerTerms">
      <a href="">Terms & Conditions</a>
      <a href="">Privacy Policy</a>
    </div>
  </div>
</footer>
</html>