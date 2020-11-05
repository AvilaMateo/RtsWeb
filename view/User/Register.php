<?php
error_reporting(0);
session_start();
require '../../config/Conn.php';
if (isset($_SESSION['user_id'])) {
  header('Location: Home.php');
}
$message = '';
if (!empty($_POST['email']) && !empty($_POST['password'])) {

  $records = $conn->prepare('SELECT * FROM usuario WHERE id = :cedula');
  $records->bindParam(':cedula', $_POST['cedula']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  if ($results['email'] != $_POST['email'] && $results['id'] != $_POST['cedula']) {
    $sql = "INSERT INTO usuario (id,nombres,apellidos,telefono,email,password, direccion, Tipo) VALUES (:cedula,:nombre,:apellidos, :telefono,:email, :password, :direccion, :Tipo)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cedula', $_POST['cedula']);
    $stmt->bindParam(':nombre', $_POST['nombres']);
    $stmt->bindParam(':apellidos', $_POST['apellidos']);
    $stmt->bindParam(':telefono', $_POST['telefono']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':direccion', $_POST['direccion']);
    $stmt->bindParam(':Tipo', $_POST['tipo']);
    if ($stmt->execute()) {
      $records = $conn->prepare('SELECT * FROM usuario WHERE id = :cedula');
      $records->bindParam(':cedula', $_POST['cedula']);
      $records->execute();
      $results = $records->fetch(PDO::FETCH_ASSOC);
      if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header("Location: Home.php");
      }
    }
  } else {
    $records = $conn->prepare('SELECT * FROM usuario WHERE id = :cedula');
    $records->bindParam(':cedula', $_POST['cedula']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $id1=$results['id'];
    $id2 = $_POST['cedula'];
    if ($id1 == $id2) {
      $message = 'la cedula  ya se Encuentra registrado';

    // } else {
    //   $message = 'El Email ya se encuentra registrado';
    }else{
      $message = 'El email ya se Encuentra registrado';
    }
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

  <title>RtsWeb-Registro</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

  <!-- Bootstrap core CSS -->
  <link href="../../src/assets/css/bootstrap.min.css" rel="stylesheet">
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

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="../../src/assets/css/register.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="loader_bg">
    <div class="loader"></div>
  </div>
  <div class="container">
    <div class="py-5 text-center">
    <a href="../../index.php"><img class="mb-4" src="../../src/assets/img/logo3.png" alt="" width="350" height="110"></a>
      <hr>
      <h2>Registrate</h2><a href="../../index.php">Ya tengo una cuenta</a>
      <p class="lead">Por favor rellena con datos Verdaderos los campos que se piden acontinuacion</p>
    </div>

    <div class="row">
      <div class="col-md-12 order-md-1">
        <h4 class="mb-3">Datos Personales y de Contactos</h4>
        <br>
        <?php if (!empty($message)) : ?>
          <p class="msg" id="msg"> <?= $message ?></p>
        <?php endif; ?>
        <form class="needs-validation" action="Register.php" method="POST" novalidate>
          <div class="mb-3">
            <label for="address">Cedula</label>
            <input type="text" class="form-control" id="address" name="cedula" placeholder="" value="<?php echo $_POST['cedula'] ?>" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">Nombres</label>
              <input type="text" class="form-control" id="firstName" name="nombres" placeholder="" value="<?php echo $_POST['nombres'] ?>" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Apellidos</label>
              <input type="text" class="form-control" id="lastName" name="apellidos" placeholder="" value="<?php echo $_POST['apellidos'] ?>" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="" value="<?php echo $_POST['cedula'] ?>" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $_POST['email'] ?>" required>
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Direccion</label>
            <input type="text" class="form-control" id="address" name="direccion" value="<?php echo $_POST['direccion'] ?>" required>
            <input type="hidden" class="form-control"  name="tipo" value="2" required>

            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar Datos</button>
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
  <script src="../../src/assets/js/main.js"></script>
  <script src="../../src/assets/js/bootstrap.bundle.min.js"></script>
  <script src="../../src/assets/js/form-validation.js"></script>
  <script src="../../src/assets/js/bootstrap.min.js"></script>
  <script src="../../src/assets/js/jquery-3.2.1.min.js"></script>
</body>

</html>