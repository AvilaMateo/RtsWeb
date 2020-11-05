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

  <script src="../../src/assets/js/jquery.js"></script>
  <script src="../../src/assets/js/loader.js"></script>
  <link href="../../src/assets/css/loader.css" rel="stylesheet">

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
      background-color: #F9F9F9;
    }

    body {
      display: -ms-flexbox;
      display: flex;
      color: #fff;
    }

    .cont {
      margin-top: 100px;
      height: 100%;
      max-width: 960px;
      color: black;
      position: relative;
    }

    .lead {
      font-style: italic;
    }

    .hora {
      color: #85AFFE;
      float: right;

    }

    .name {
      margin-top: -2rem;

      font-weight: bold;

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

<body class="">
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <img class="img-fluid imagen" src="../../src/assets/img/logo3.png" alt="">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-center"  id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <a class="nav-item nav-link" href="Home.php"><i class="fas fa-home"></i> Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link" href="Experiencias.php"><i class="fas fa-file-medical"></i> Experiencias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link active" href="Report.php"><i class="fas fa-file-medical-alt"></i> Reportes</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user-circle"></i> <?= $user['nombres']; ?> <?= $user['apellidos']; ?> </a>

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
  </header>
  <div class="loader_bg">
    <div class="loader"></div>
  </div>
  <div class="container cont">
    <br><br>
    <h5 class="mb-3">Nuevo Reporte</h5>
    <a href="./nuevoReporte.php" class="btn btn-dark"><i class="fas fa-plus-circle"></i></a>
    <hr>
    <br><br>
    <h5 class="mb-3">Tus Sintomas</h5>
    <hr>
    <div class="col-md-12 order-md-1">
      <?php
        $id_U = $user['id'];
        foreach ($conn->query("SELECT r.id, u.nombres, u.apellidos, r.fecha, r.sintomas FROM reporte as r 
                                 INNER JOIN usuario as u ON r.idU = u.id WHERE r.idU = $id_U") as $row) { ?>
        <div class="jumbotron mt-3">
          <h6 class="name"><?php echo $row['nombres'] ?> <?php echo $row['apellidos'] ?></h6>
          <p class="lead"><?php echo $row['sintomas'] ?></p>
          <i class="hora"><?php echo $row['fecha'] ?></i>
          <form action="../../control/User/eliminarReport.php" method="POST">
            <input type="hidden" name="idR" value="<?php echo $row['id'] ?>">
            <input type="hidden" name="idU" value="<?php echo $user['id'] ?>">
            <input type="submit" name="" class="btn btn-outline-danger" value="X">
          </form>
        </div>
      <?php
        }
      ?>
    </div>

    <!-- ventana modal -->

    
    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; Copyright RtsWeb 2020 </p>
    </footer>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="../../src/assets/js/bootstrap.bundle.min.js"></script>
  <script src="../../src/assets/js/form-validation.js"></script>
  <script src="../../src/assets/js/bootstrap.min.js"></script>
  <script src="../../src/assets/js/jquery-3.2.1.min.js"></script>

</body>

</html>
