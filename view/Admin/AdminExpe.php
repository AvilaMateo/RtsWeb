<?php
require '../../config/v_session.php';
require '../../config/Conn.php';
include_once '../../control/Admin/TbExpe.php';
if (!isset($_SESSION['user_id'])) {
  header('Location: ../../index.php');
}
if (!empty($_POST['cedula'])) {
  $Consulta = AdminExp("filter", $_POST['cedula']);
} else {
  $Consulta = AdminExp("all", 0);
}

if (isset($_POST['id'])) {
  deleteExp($_POST['id']);
  $Consulta = AdminExp("all", 0);
  $messageSuccess = "Experiencia eliminada";
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

    .ic {
      background-color: rgba(15, 15, 15, 0.74);
      padding: 10px;
      border-radius: 10px;
    }

    .is {
      background-color: rgba(15, 15, 15, 0.74);
    }


    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="../../src/assets/css/home.css" rel="stylesheet">
  <script src="../../src/assets/js/jquery.js"></script>
  <script src="../../src/assets/js/loader.js"></script>
  <link href="../../src/assets/css/loader.css" rel="stylesheet">
</head>

<body class="">
  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <img class="img-fluid imagen" src="../../src/assets/img/logo3.png" alt="">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-item nav-link" href="Home.php"><i class="fas fa-home"></i> Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-item nav-link active" href="AdminUser.php"> <i class="fas fa-database"></i> Base de Datos</a>
            </li>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <i class="fas fa-user-circle"></i>  <?= $user['nombres']; ?> <?= $user['apellidos']; ?> </a>

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
  <div class="loader_bg">
    <div class="loader"></div>
  </div>

  <div class="container col-sm-12 cont">
    <br>
    <h4>Tablas de la Base de datos</h4>
    <hr>
    <?php if (!empty($messageSuccess)) : ?>
      <p class="msg-succ" id="msg"> <?= $messageSuccess ?></p>
    <?php endif; ?>
    <nav class="navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-table"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="AdminUser.php">Usuarios <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="AdminExpe.php">Experiencias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AdminReport.php">Reportes</a>
          </li>
        </ul>
      </div>
    </nav>
    <hr>
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          &nbsp;&nbsp;&nbsp;&nbsp; <nav class="navbar-light bg-light">
            <form class="form-inline" action="AdminExpe.php" method="post">
              <input class="form-control mr-sm-2" type="search" placeholder="cedula del usuario" name="cedula" aria-label="Search">
              <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form><br>
          </nav>
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">Ref#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Resumen</th>
                <th scope="col">Fecha</th>
                <th scope="col" colspan="2">Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($expe = $Consulta->fetch(PDO::FETCH_ASSOC)) {
              ?>
                <tr>
                  <td><?php echo $expe['id'] ?></td>
                  <td><?php echo $expe['idU'] ?></td>
                  <td><?php echo $expe['experiencia'] ?></td>
                  <td><?php echo $expe['fecha'] ?></td>
                  <td>
                    <form action="EditExpe.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $expe['id'] ?>">
                      <input type="hidden" name="experiencia" value="<?php echo $expe['experiencia'] ?>">
                      <input type="hidden" name="fecha" value="<?php echo $expe['fecha'] ?>">
                      <button class="btn btn-info"> <i class="fas fa-pen"></i></button>
                    </form>
                  </td>
                  <td>
                    <form action="AdminExpe.php" method="post" id="miFormulario">
                      <input type="hidden" name="id" value="<?php echo $expe['id'] ?>">
                      <button class="btn btn-danger"> <i class="fas fa-trash-alt"></i></button>
                    </form>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; Copyright RtsWeb 2020 </p>
    </footer>
  </div>
  <script type="text/javascript">
    (function() {
      var form = document.getElementById('miFormulario');
      form.addEventListener('submit', function(event) {
        // si es false entonces que no haga el submit
        if (!confirm('Realmente desea eliminar?')) {
          event.preventDefault();
        }
      }, false);
    })();
  </script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="../../src/assets/js/bootstrap.bundle.min.js"></script>
  <script src="../../src/assets/js/form-validation.js"></script>
  <script src="../../src/assets/js/bootstrap.min.js"></script>
  <script src="../../src/assets/js/jquery-3.2.1.min.js"></script>
  <script src="../../src/assets/js/main.js"></script>


</body>

</html>