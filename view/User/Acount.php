<?php
require '../../config/v_session.php';
require '../../config/Conn.php';
if (!isset($_SESSION['user_id'])) {
  header('Location: ../../index.php');
}

if (!empty($_POST['password']) && !empty($_POST['password2'])) {
  $passActual = $user['password'];
  $passVerify = $_POST['password2'];
  if (password_verify($passVerify, $passActual)) {
    $sql = "UPDATE usuario  SET password = :password WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_POST['id']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    if ($stmt->execute()) {
      echo "<script>alert('Contraseña Actualizada ✅'); location='Acount.php'</script>";
    } else {
      echo "<script>alert('error al Cambiar la Contraseña ⚠️'); </script>";
    }
  } else {
    echo "<script>alert('Contraseña actual incorrecta ⚠️'); location='Acount.php'</script>";
  }
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
  <script src="../../src/assets/js/jquery.js"></script>
  <script src="../../src/assets/js/loader.js"></script>
  <link href="../../src/assets/css/loader.css" rel="stylesheet">
  <link href="../../src/assets/css/home.css" rel="stylesheet">

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

    }

    .edit-pass {
      color: blue;
      float: right;
    }

    .edit-pass:hover {
      color: rgb(95, 145, 238);
      float: right;
    }


    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->

</head>

<body class="">
  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <img class="img-fluid imagen" src="../../src/assets/img/logo3.png" alt="">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-item nav-link" href="Home.php"><i class="fas fa-home"></i> Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-item nav-link" href="Experiencias.php"><i class="fas fa-file-medical"></i> Experiencias</a>
            </li>
            <li class="nav-item">
              <a class="nav-item nav-link" href="Report.php"><i class="fas fa-file-medical-alt"></i> Reportes</a>
            </li>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle active" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              <i class="fas fa-user-circle"></i>  <?= $user['nombres']; ?> <?= $user['apellidos']; ?></a>

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
  </header>
  <div class="loader_bg">
    <div class="loader"></div>
  </div>
  <div class="container cont">
    <div class="row">
      <div class="col-md-12 order-md-1"><br><br><br><br>
        <h4 class="mb-3">Datos Personales</h4>
        <hr>
        <br>
        <form class="needs-validation" action="Acount-edit.php" method="POST" novalidate>
          <div class="mb-3">
            <label for="">Cedula: <?= $user['id']; ?></label>
          </div>
          <div class="mb-3">
            <label for="">Nombres: <?= $user['nombres']; ?></label>
          </div>
          <div class="mb-3">
            <label for="">Apellidos: <?= $user['apellidos']; ?></label>
          </div>
          <br>

          <h4 class="mb-3">Datos de Contactos</h4>
          <hr>
          <div class="mb-3">
            <label for="">Telefono: <?= $user['telefono']; ?></label>
          </div>
          <div class="mb-3">
            <label for="">Email: <?= $user['email']; ?></label>
          </div>
          <div class="mb-3">
            <label for="">Direccion: <?= $user['direccion']; ?></label>
          </div>
          <button class="btn btn-sm btn-dark " type="submit">Editar Datos</button>
          <a href="" class="edit-pass" data-toggle="modal" data-target="#exampleModal">Cambiar Contraseña</a>
        </form>
      </div>
    </div>
    <br>
    <!-- ventana modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Datos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="Acount.php" method="POST">
              <div class="form-group">
                <input type="hidden" class="form-control" id="" name="id" placeholder="" value="<?php echo $user['id']; ?>" required>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Contraseña Nueva:</label>
                <input type="password" class="form-control" name="password" required></input>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Contraseña Actual:</label>
                <input type="password" class="form-control" name="password2" required></input>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; Copyright RtsWeb 2020 </p>
    </footer>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery.slim.min.js"><\/script>')
  </script>
  <script src="../../src/assets/js/bootstrap.bundle.min.js"></script>
  <script src="../../src/assets/js/form-validation.js"></script>
  <script src="../../src/assets/js/bootstrap.min.js"></script>
  <script src="../../src/assets/js/jquery-3.2.1.min.js"></script>
</body>
</body>

</html>