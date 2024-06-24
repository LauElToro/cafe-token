<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/compraElSalvador.css">
    <link rel="stylesheet" href="assets/css/popup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Livvic:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Livvic:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <title>Finca el Salvador</title>
</head>
  <?php require_once 'header.php'; ?>
  <?php require_once 'admin/login.php'; ?>
<body>
    <section>
            <div class="firstContainer">
                <div class="firstContainerSubCont1">
                    <img src="assets/img/TokenElSalvador.png" alt="">
                </div>
                <div class="firstContainerSubCont2">
                    <div class="subContText">
                      <div class="subContTextMobile">
                        <div class="subContTextMobileImg">
                          <img src="assets/img/TokenElSalvador.png" alt="">
                          </div>
                        <div class="subContTextMobileText">
                          <h4>FINCA EL RUISEÑOR</h4>
                          <h5>U$D 100,00</h5>
                        </div>
                      </div>
                        <h4>FINCA EL RUISEÑOR</h4>
                        <h5>U$D 100,00</h5>
                        <p>The “El Ruiseñor” farm, in addition to its coffee growing vocation and the Eco Park, has a privileged location since the property can be accessed from the municipalities of Jayaque, Comasagua, Chiltiupán in the department of La Libertad, for which It is also close to the beach “el Zonte” for tourists who love surfing, who after their activities can easily move to our facilities and so after the sand and the sea, you can enjoy the biodiversity, the beautiful waterfalls, rivers , walks and other ecotourism activities.</p>


                        <form action="wallet.php" method="POST">
                        <div class="subContInp">

                        <input type="number" name="monto" value="<?php echo isset($_GET['monto']) ? $_GET['monto'] : '0'; ?>">
                             <button type="submit">BUY IT</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
    </section>
    <section class="testimonials">
      <div class="container">
        <div class="testimonials-content">
          <div class="swiper testimonials-slider js-testimonials-slider">
            <div class="swiper-wrapper">
              <div class="swiper-slide testimonials-item">
                <div class="info">
                  <img src="assets/img/FincaImg.png" alt="">
                </div>
              </div>
              <div class="swiper-slide testimonials-item">
                <div class="info">
                  <img src="assets/img/FincaImg.png" alt="">
                </div>
              </div>
              <div class="swiper-slide testimonials-item">
                <div class="info">
                  <img src="assets/img/FincaImg.png" alt="">
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination js-testimonials-pagination"></div>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
      const swiper = new Swiper('.js-testimonials-slider', {
        grabCursor: true,
        spaceBetween: 30,
        
        breakpoints:{
          767:{
            slidesPerView: 1
          }
        }
      });
    </script>
    <section>
        <h3 class="h3Products">MORE PRODUCTS</h3>
        <div class="moreProductsSection">
            <div class="moreProductsItem">
                <h6>HONDURAS</h6>
                <h5>Finca el Ajagual</h5>
                <img src="assets/img/TokenHonduras.png" alt="">
                <button>
                    <a href="">ADD TO CART</a>
                </button>
            </div>
            <div class="moreProductsItem">
                <h6>HONDURAS</h6>
                <h5>Finca el Ajagual</h5>
                <img src="assets/img/TokenHonduras.png" alt="">
                <button>
                    <a href="">ADD TO CART</a>
                </button>
            </div>
            <div class="moreProductsItem">
                <h6>HONDURAS</h6>
                <h5>Finca el Ajagual</h5>
                <img src="assets/img/TokenHonduras.png" alt="">
                <button>
                    <a href="">ADD TO CART</a>
                </button>
            </div>
        </div>
    </section>
    
  
</body>
<?php require_once 'footer.php'; ?>
</html>