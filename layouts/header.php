<?php
    session_name("Lion2023-WebApp");
    session_start();

?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentikációs rendszer alapjai</title>
    <link rel="stylesheet" href="../assets/Bootsrap\css\bootstrap.min.css">
    <script src="../assets/Bootsrap\js\bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="../assets/style.css">

    <script src="../assets/scripts/jquery_3_7.js"></script>
    <script src="../assets/scripts/input-mask.js"></script>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="../assets/fontawesome/css/all.css">
    <script src="../assets/fontawesome/js/all.js"></script>
    <script src=" ../assets/scripts/parsley.js"></script>

    <!-- JQuery table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</head>

<body>
    <h1>Navbar</h1>
    <!-- Page content begin -->
    <div class="contain" id="pageContent">
        <!-- Navbar begin -->
        <nav class="navbar navbar-dark bg-dark fixed-top">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
              aria-controls="offcanvasNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasNavbar"
              aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                <button type="button" class="closeButton" data-bs-dismiss="offcanvas" aria-label="Close">X</button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../views/index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../views/create_registration.php">Registration</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Products</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                      <a class="dropdown-item" href="../views/index.php?cat=Funko">Pop figures</a>
                      <a class="dropdown-item" href="../views/index.php?cat=Coffee">Coffees</a>
                      <a class="dropdown-item" href="../views/index.php?cat=Human">Students for hire</a>
                    </div>
                  </li>
                </ul>
                <?php
                if (isset($_SESSION['user']) == false) {
                  echo ' <!-- Login form -->
              <form class="mt-2" action="../controllers/login.php" method="POST">
                  <div class="row m-1">
                      <input type="text" name="username" class="form-input mb-2" placeholder="Username">
                  </div>
                  <div class="row m-1">
                      <input type="password" name="password" class="form-input mb-2" placeholder="Password">
                  </div>
                  <div class="row m-1">
                      <button class="btn btn-outline-success" type="submit" name="submit">Login</button>
                  </div>
              </form>';
              } else {
                  echo '<form class="mt-2" action="../controllers/logout.php" method="POST">';
                  echo '<div class="row m-1">';
                  echo '<button class="btn btn-outline-danger" type="submit" name="submit">Logout</button>';
                  echo '</div>';
                  echo '</form>';
              }
              ?>
                
              
              
                

                </form>
              </div>
            </div>
          </div>
        </nav>
        <!-- navbar End -->