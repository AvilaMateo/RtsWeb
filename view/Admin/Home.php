<?php
require '../../config/v_session.php';
require '../../config/Conn.php';
if (!isset($_SESSION['user_id'])) {
  header('Location: ../../index.php');
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v4.1.1">
  <link rel="icon" type="image/png" href="../../src/assets/img/icono.png" />

  <title>RtsWeb</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">


  <!-- Bootstrap core CSS -->
  <link href="../../src/assets/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/0ee106494a.js" crossorigin="anonymous"></script>

  <link href="../../src/assets/css/loader.css" rel="stylesheet">
  <script src="../../src/assets/js/jquery.js"></script>

  <script>
    $(document).ready(function() {
      setTimeout(function() {
        $('.loader_bg').fadeToggle();
      }, 1000);

      $('.ir-arriba').click(function() {
        $('body, html').animate({
          scrollTop: '0px'
        });
      });
    });
  </script>


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    html,
    body {
      height: 100%;
      background-color: #F3F3F3;
    }

    body {
      display: -ms-flexbox;
      display: flex;
      color: black;
      
    }

    .modal {
      color: black;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="../../src/assets/css/home.css" rel="stylesheet">
</head>

<body class="text-center">
  <div class="loader_bg">
    <div class="loader"></div>
  </div>
  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <img class="img-fluid imagen" src="../../src/assets/img/logo3.png" alt="">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-item nav-link active" href="Home.php"><i class="fas fa-home"></i> Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-item nav-link" href="AdminUser.php"> <i class="fas fa-database"></i> Base de Datos</a>
            </li>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fas fa-user-circle"></i> <?= $user['nombres']; ?> <?= $user['apellidos']; ?></a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="Acount.php"> <i class="fas fa-user-cog"></i> Mi cuenta</a>
                <a class="dropdown-item" href="../../config/close.php"> <i class="fas fa-sign-out-alt"></i> Cerra Sesion</a>
              </div>

            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <main role="main" class="inner cover">
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <h3>Bienvenido Eres el Admin de RtsWeb </h3><br>
            Gestiona la base de datos RstWeb
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-sm">
            <a href="./AdminUser.php"><img class="db" src="../../src/assets/img/database.png" alt="" width="100px"></a>
          </div>
        </div>
      </div>
    </main>

    <footer class="mastfoot mt-auto">
      <div class="inner">
        <p>&copy; Copyright RtsWeb 2020 </p>
      </div>
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="../../src/assets/js/bootstrap.bundle.min.js"></script>
  <script src="../../src/assets/js/bootstrap.min.js"></script>
  <script src="../../src/assets/js/jquery-3.2.1.min.js"></script>
</body>

</html>