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
  <script src="https://kit.fontawesome.com/0ee106494a.js" crossorigin="anonymous"></script>
  <link href="../../src/assets/css/bootstrap.min.css" rel="stylesheet">
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
      background-color: #E7E6E6;
    }

    body {
      display: -ms-flexbox;
      display: flex;
      color: #fff;
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
  <link href="../../src/assets/css/carousel.css" rel="stylesheet">

</head>

<body class="text-center">
  <div class="loader_bg">
    <div class="loader"></div>
  </div>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
               <img class="img-fluid imagen" src="../../src/assets/img/logo3.png" alt="">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-center" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-item nav-link active" href="Home.php"><i class="fas fa-home"></i> Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="Experiencias.php"><i class="fas fa-file-medical"></i> Experiencias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="Report.php"><i class="fas fa-file-medical-alt"></i> Reportes</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user-circle"></i> <?= $user['nombres']; ?> <?= $user['apellidos']; ?></a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="Acount.php"> <i class="fas fa-user-cog"></i> Mi cuenta</a>
                                <a class="dropdown-item" href="../../config/close.php">  <i class="fas fa-sign-out-alt"></i> Cerra Sesion</a>
                            </div>
                             
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
  </header>
  <div class="app">
    <br><br>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
      <img src="../../src/assets/img/Slaider/img3.webp" alt="">
        <div class="container">
          <div class="carousel-caption text-center text-white">
            <h4>Tu salud es Primero</h4>
            <p>En nuestra plataforma podras comentarnos tu estado de salud</p>
            <p><a class="btn btn-lg btn-info" href="#" role="button">Ver mas</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <!-- C:\xampp\htdocs\EPS\src\assets\img\Slaider -->
      <img src="../../src/assets/img/Slaider/img2.webp" alt="">
        <div class="container">
          <div class="carousel-caption">
            <h4>Experiencias</h4>
            <p>Conoce las experiencias de otras personas con su salud</p>
            <p>!Puedes compartir tu experiencia para que los demas las vean</p>
            <p><a class="btn btn-lg btn-info" href="#" role="button">Ver mas</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img src="../../src/assets/img/Slaider/img4.webp" alt="">
      <div class="container">
          <div class="carousel-caption text-center">
            <p>Cuidate y cuida a tu familia</p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
    
    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; Copyright RtsWeb 2020 </p>
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="../../src/assets/js/bootstrap.bundle.min.js"></script>
  <script src="../../src/assets/js/bootstrap.min.js"></script>
  <script src="../../src/assets/js/jquery-3.2.1.min.js"></script>
</body>

</html>

