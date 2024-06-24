
<header class="header">
    <div class="logo">
        <a href="index.php"> <img src="assets/img/logo.png" alt="Logo de la marca"></a>
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="tokenShop.php">Token Shop</a></li>
            <li><a href="sustentability.php">Sustentability</a></li>

            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="index.php" id="logoutLink">Logout</a></li>
            <?php else: ?>
                <li><a href="#" id="loginLink">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <a onclick="toggleNav()" class="menu" href="#">
        <button>Menu</button>
    </a>
    <div id="mobile-menu" class="overlay">
        <a onclick="toggleNav()" href="#" class="close">&times;</a>
        <div class="overlay-content">
            <a href="tokenShop.php">Token Shop</a>
            <a href="index.php">Home</a>
            <a href="aboutUs.php">About Us</a>
            <a href="sustentability.php">Sustentability</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="index.php" id="logoutLink">Logout</a>
            <?php else: ?>
                <a href="#" id="loginLink2">Login</a>
            <?php endif; ?>
        </div>
    </div>
    <script>
        function toggleNav() {
            const menu = document.getElementById("mobile-menu");
            menu.classList.toggle("show");
        }
    </script>
    <?php require_once 'admin/login.php'; ?>
</header>
