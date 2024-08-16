<header id="header" class="header d-flex align-items-center fixed-top" style="background: purple;">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Selecao</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <?php if (!isset($_SESSION['user_id'])):?>
          <li><a href="login.php">Login</a></li>
          <li><a href="register.php">Registration</a></li>
          <?php else:?>
          <li><a href="dashboard.php">Dashboard</a></li>
          <li class="dropdown"><a href="#"><span>(<?=$_SESSION['user_name']?>)Profile</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li class="dropdown"><a href="logout.php"><span>Logout</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              </li>
            </ul>
          </li>
          <?php endif;?>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>