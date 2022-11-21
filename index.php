<?php require './projectData.php'; ?>

<!DOCTYPE html>
<html  lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="description" content=""> <!--FIXME-->
  <title>SpearsGoode.com - Project Portfolio</title>
  <link rel="shortcut icon" type="image/svg" href="./img/Logo.svg">
  <link href='./node_modules/bootstrap/dist/css/bootstrap.min.css' type='text/css' rel='stylesheet'>
  <link href='./css/main.css' type='text/css' rel='stylesheet'>
</head>

<body class="container-fluid bg-dark">

<!-- NAVIGATION -->
  <nav class="navbar navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="./img/SGlogoV2.svg" alt="Spears Goode Logo" width="50" height="50">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav nav-fill justify-content-end flex-grow-1 pe-3">

            <?php
              foreach ($projectData as $proj) {
                echo "<li class=\"nav-item\">";
                  echo "<a class=\"nav-link\" aria-current=\"page\" href=\"#" . $proj['title'] . "\">" . $proj['title'] . "</a>";
                echo "</li>";
              }
            ?>

            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a> <!--FIXME-->
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

<!-- PROJECT CARDS -->
  <div class="container-lg">
    <?php
      foreach ($projectData as $proj) {
        echo "<div class=\"card mt-2\" id=\"" . $proj['title'] . "\">";
          echo "<div class=\"card-header\">";
            echo "<h5 class=\"card-title\">" . $proj['title'] . "<span class=\"badge bg-info float-end\">" . $proj['date'] . "</span></h5>";
          echo "</div>";
          echo "<div class=\"card-body\">";
            echo "<img src=\"" . $proj['img'] . "\" class=\"img-fluid\" alt=\"" . $proj['alt'] . "\">";
            echo "<p class=\"card-text\">" . $proj['intro'] . "</p>";
            echo "<a href=\"#\" class=\"btn btn-success\">More Info</a>"; //FIXME
            echo "<a href=\"" . $proj['link'] . "\" class=\"btn btn-success float-end\">Visit Site</a>";
          echo "</div>";
        echo "</div>";
      }
    ?>
  </div>

  <footer>
  </footer>

  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
