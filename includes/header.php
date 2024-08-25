<nav class="navbar navbar-expand-lg fixed-top w-100">
  <div class="container">
    <a class="navbar-brand me-auto" href="#">
      <img src="/PetPal/assets/images/PetPal-logo.png" alt="PetPal-logo" width="100px" height="100px"/>
    </a>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
          <img src="/PetPal/assets/images/PetPal-logo.png" alt="PetPal-logo" width="70px" height="70px"/>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav flex-column flex-lg-row justify-content-center flex-lg-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link mx-lg-2 <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="/PetPal/index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mx-lg-2 <?= basename($_SERVER['PHP_SELF']) == 'adopt.php' ? 'active' : ''; ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Adopt a Pet
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/PetPal/adopt.php">Dogs</a></li>
              <li><a class="dropdown-item" href="/PetPal/adopt.php">Cats</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2 <?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>" href="/PetPal/about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2 <?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>" href="/PetPal/contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
    <a href="/PetPal/registerAndLogin.php" class="signup-button">Register</a>
    <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
