<?php
require '../../config/v_session.php';
require '../../config/Conn.php';
include_once '../../control/Admin/TbUser.php';
if (!isset($_SESSION['user_id'])) {
  header('Location: ../../index.php');
}

if (!empty($_POST['cedula'])) {
  $Consulta = AdminUsers("filter", $_POST['cedula']);
} else {
  $Consulta = AdminUsers("all", 0);
}

if (isset($_POST['id'])) {
  deleteUser($_POST['id']);
  $Consulta = AdminUsers("all", 0);
  $messageSuccess = "Usuario eliminado";
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

    .cont {
      margin-top: 100px;
      min-height: calc(100% - 81px);
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
              <i class="fas fa-user-circle"></i><?= $user['nombres']; ?> <?= $user['apellidos']; ?>  </a>

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
          <li class="nav-item active">
            <a class="nav-link" href="AdminUser.php">Usuarios <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AdminExpe.php">Experiencias</a>
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
          &nbsp;&nbsp;&nbsp;&nbsp;<nav class="navbar-light bg-light">
            <form class="form-inline" action="AdminUser.php" method="post">
              <input class="form-control mr-sm-2" type="search" placeholder="cedula" name="cedula" aria-label="Search">
              <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <br>
          </nav>
          <table class="table table-responsive">
            <thead class="thead-light">
              <tr>
                <th scope="col">Cedula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">telefono</th>
                <th scope="col">email</th>
                <th scope="col">Direccion</th>
                <th scope="col" colspan="2">Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($usuarios = $Consulta->fetch(PDO::FETCH_ASSOC)) {
              ?>
                <tr>
                  <td><?php echo $usuarios['id'] ?></td>
                  <td><?php echo $usuarios['nombres'] ?></td>
                  <td><?php echo $usuarios['apellidos'] ?></td>
                  <td><?php echo $usuarios['telefono'] ?></td>
                  <td><?php echo $usuarios['email'] ?></td>
                  <td><?php echo $usuarios['direccion'] ?></td>
                  <td>
                    <form action="EditUser.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $usuarios['id'] ?>">
                      <input type="hidden" name="nombres" value="<?php echo $usuarios['nombres'] ?>">
                      <input type="hidden" name="apellidos" value="<?php echo $usuarios['apellidos'] ?>">
                      <input type="hidden" name="telefono" value="<?php echo $usuarios['telefono'] ?>">
                      <input type="hidden" name="email" value="<?php echo $usuarios['email'] ?>">
                      <input type="hidden" name="direccion" value="<?php echo $usuarios['direccion'] ?>">
                      <button class="btn btn-info"> <i class="fas fa-pen"></i></button>
                    </form>
                  </td>
                  <td>
                    <form action="AdminUser.php" method="POST">
                      <input type="hidden" name="id" value="<?php echo $usuarios['id'] ?>">
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
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="../../src/assets/js/bootstrap.bundle.min.js"></script>
  <script src="../../src/assets/js/form-validation.js"></script>
  <script src="../../src/assets/js/bootstrap.min.js"></script>
  <script src="../../src/assets/js/jquery-3.2.1.min.js"></script>
  <script src="../../src/assets/js/main.js"></script>
</body>

</html>