<?php


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/popup.css">
    <title>Cancel</title>
  </head>
  
  <?php require_once 'header.php'; ?>
  <?php require_once 'admin/login.php'; ?>
<style>
    body {
        animation: success 2s forwards;
    }

    .animation-container {
        width: 200px;
        height: 200px;
        position: relative;
        margin: auto;
        margin-top: 15%;
        margin-bottom: 15%;
        border-radius: 50%;
        background: radial-gradient(#FF2B2B 56%, #fff 80%);
        overflow: hidden;
    }

    .imgAnime {
        width: 60%;
        position: absolute;
        top: 45%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    @keyframes success {
        to {
            background: #FF2B2B;
        }
    }

    @keyframes drawCheckmark {
        to {
            width: 100px;
            height: 100px;
            transform: translate(-50%, -50%) rotate(45deg);
        }
    }
</style>
</head>
<body>
<div class="animation-container">
    <div> <a href="pagos.php"> <img class="imgAnime" src="assets/img/6.png" alt="Compra incompleta"></a></div>
</div>

</body>
<?php require_once 'footer.php'; ?>
   
</html>
