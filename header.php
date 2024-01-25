<?php $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand" href="index.php">
            <img src="assets/logo.png" width="250" height="50" alt="">
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ml-auto">
              <a class="nav-link" id="<?= $page == 'index.php' ? 'active':''; ?>" href="index.php">HOME</a>
            </li>
            <li class="nav-item ml-auto">
              <a class="nav-link" id="<?= $page == 'about.php' ? 'active':''; ?>" href="about.php">ABOUT US</a>
            </li>
            <li class="nav-item dropdown ml-auto ">
              <a class="nav-link dropdown-toggle" href="menu.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                MENU
              </a>
              <div class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="menu-sigcakes.php">SIGNATURE CAKES</a>
                <a class="dropdown-item" href="menu-cakedel.php">CAKE DELIGHTS</a>
                <a class="dropdown-item" href="menu-cheese.php">CHEESECAKES</a>
                <a class="dropdown-item" href="menu-pastries.php">PASTRIES</a>
                <a class="dropdown-item" href="menu-cupcakes.php">CUPCAKES</a>
                <a class="dropdown-item" href="menu-cookies.php">COOKIES</a>
                <a class="dropdown-item" href="menu-bars.php">BARS</a>
              </div>
            </li>
            <li class="nav-item ml-auto">
                <a class="nav-link" id="<?= $page == 'contact.php' ? 'active':''; ?>" href="contact.php">CONTACT</a>
            </li>
            <li class="nav-item ml-auto">
                <a class="btn" href="order.php" role="button">ORDER</a>
            </li>
            
          </ul>
        </div>
    </nav>
</header>