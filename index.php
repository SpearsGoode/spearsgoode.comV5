<?php require './projectData.php'; ?>

<!DOCTYPE html>
<html  lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <meta name="description" content="Project Portfolio for some of the more important projects I've worked on.">
  <title>SpearsGoode.com - Project Portfolio</title>
  <link rel="shortcut icon" type="image/svg" href="./img/SGlogoV2.svg">
  <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
  <link href="./node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"/>
  <link href="./css/main.css" type="text/css" rel="stylesheet">
</head>

<body class="container-fluid justify-content-center bg-dark">

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
              <a class="nav-link" href="#contact">Contact</a> <!--FIXME-->
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

<!-- INTRO -->
  <div class=" card text-center m-4 ms-auto me-auto shadow opacity-75" style="max-width: 960px">
    <figure class="card-body mb-0 pb-0">
      <p class="lead">Let's make the world a better place!</p>
      <blockquote class="mt-4">
        <p>I have been interested in technology for as long as I can remember. As a result, I am very knowledgeable in many related fields: including but not limited to programming, web development/design, networks, blockchain, security, privacy, social networking, and a multitude of hardware and software that benefit such fields. My wish is to use the knowledge, skills, and experience I have gained to help make the world a better place. I am focused, hardworking, and punctual with excellent interpersonal, problem-solving, and organizational skills. I am a self-starter who has single-handedly deployed websites and is always working on a project. I am very interested in working with you and believe that collaboration would help us both to achieve our aspirations.</p>
      </blockquote>
    </figure>
    <div class="card-footer list-inline">
      <a href="https://github.com/SpearsGoode/" class="list-inline-item" target="_blank">
        <i class="bi bi-github"></i>
      </a>
      <a href="https://www.linkedin.com/in/spears-goode/" class="list-inline-item" target="_blank">
        <i class="bi bi-linkedin"></i>
      </a>
      <a href="https://twitter.com/SpearsGoode/" class="list-inline-item" target="_blank">
        <i class="bi bi-twitter"></i>
      </a>
      <a href="https://www.instagram.com/spearsgoode/" class="list-inline-item" target="_blank">
      <i class="bi bi-instagram"></i>
      </a>
      <a href="#contact" class="list-inline-item"> <!--FIXME-->
        <i class="bi bi-send"></i>
      </a>
    </div>
  </div>

<!-- PROJECT CARDS -->
  <div class="row row-cols-1 row-cols-lg-2 g-4">
    <?php
      foreach ($projectData as $proj) {
        echo "<div class\"col\">";
          echo "<div class=\"card mt-2 shadow opacity-75\" id=\"" . $proj['title'] . "\">";
            echo "<div class=\"card-header\">";
              echo "<div class \"list-inline\">";
                echo "<h4 class=\"card-title list-inline-item\">" . $proj['title'] . "</h4>";
                echo "<span class=\"badge bg-info float-end list-inline-item\">" . $proj['date'] . "</span>";
              echo "</div>";
            echo "</div>";
             echo "<div class=\"card-body\">";
              echo "<img src=\"./img/" . $proj['img'] . "\" class=\"img-fluid\" alt=\"" . $proj['alt'] . "\">";
              echo "<p class=\"card-text\">" . $proj['intro'] . "</p>";
            echo "</div>";
            echo "<div class=\"card-footer\">";
              echo "<button type=\"button\" class=\"btn btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#" . $proj['tag'] . "Modal\"> More Info </button>";
              if ($proj['link'] != "none") {
                echo "<a href=\"" . $proj['link'] . "\" class=\"btn btn-success float-end\">Visit Site</a>";
              }
            echo "</div>";
          echo "</div>";
        echo "</div>";
      }
    ?>
  </div>

<!-- MODALS -->
  <?php
    foreach ($projectData as $proj) {
      echo "<div class=\"modal fade\" id=\"" . $proj['tag'] . "Modal\" tabindex=\"-1\" aria-labelledby=\"" . $proj['tag'] . "ModalLabel\" aria-hidden=\"true\">";
        echo "<div class=\"modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-lg-down modal-xl\">";
          echo "<div class=\"modal-content\">";
            echo "<div class=\"modal-header\">";
              echo "<h5 class=\"modal-title\" id=\"" . $proj['tag'] . "ModalLabel\">" . $proj['title'] . "</h5>";
              echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
            echo "</div>";
            echo "<div class=\"modal-body\">";
              echo $proj['info'];
            echo "</div>";
            echo "<div class=\"modal-footer\">";
              echo "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Close</button>";
            echo "</div>";
          echo "</div>";
        echo "</div>";
      echo "</div>";
    }
  ?>

<!-- CONTACT -->

  <footer>
    &copy; Spears Goode
  </footer>

  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
