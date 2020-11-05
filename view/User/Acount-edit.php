<?php
require '../../config/v_session.php';
require '../../config/Conn.php';
if (!isset($_SESSION['user_id'])) {
  header('Location: ../../index.php');
}
if (!empty($_POST['id']) && !empty($_POST['email'])) {
  $sql = "UPDATE usuario  SET nombres = :nombres ,apellidos = :apellidos,
                              telefono = :telefono, email = :email, direccion = :direccion WHERE id = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $_POST['id']);
  $stmt->bindParam(':nombres', $_POST['nombres']);
  $stmt->bindParam(':apellidos', $_POST['apellidos']);
  $stmt->bindParam(':telefono', $_POST['telefono']);
  $stmt->bindParam(':email', $_POST['email']);
  $stmt->bindParam(':direccion', $_POST['direccion']);
  $message = "";
  if ($stmt->execute()) {
    echo "<script>alert('Datos Actualizados✅');</script>";
    header('Location: Acount.php');
  } else {
    $message = 'El Numero de cedula ya se Encuentra registrado';
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
      background-color: white;
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
              <i class="fas fa-user-circle"></i><?= $user['nombres']; ?> <?= $user['apellidos']; ?></a>

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
        <h4 class="mb-3">Datos Personales y de Contactos</h4>
        <hr>
        <br>
        <form class="needs-validation" action="Acount-edit.php" method="POST" novalidate>
          <div class="mb-3">

            <input type="hidden" class="form-control" id="address" name="id" placeholder="" value="<?php echo $user['id'] ?>" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">Nombres</label>
              <input type="text" class="form-control" id="firstName" name="nombres" placeholder="" value="<?php echo $user['nombres'] ?>" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Apellidos</label>
              <input type="text" class="form-control" id="lastName" name="apellidos" placeholder="" value="<?php echo $user['apellidos'] ?>" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="address">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="" value="<?php echo $user['telefono'] ?>" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>
          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?php echo $user['email'] ?>" required>
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Direccion</label>
            <input type="text" class="form-control" id="address" name="direccion" value="<?php echo $user['direccion'] ?>" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>
          <a href="Acount.php" class="btn btn-danger">Cancelar</a>
          <button class="btn btn-success" type="submit">Guarda</button>

          <br>

        </form>
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

</html>