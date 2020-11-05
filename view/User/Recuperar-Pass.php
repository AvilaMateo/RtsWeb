<?php
error_reporting(0);
session_start();
require '../../config/Conn.php';
if (isset($_SESSION['user_id'])) {
  header('Location: Home.php');
}


//Esto es opcional, aqui pueden colocar un mensaje de "enviado correctamente" o redireccionarlo a algun lugar

if (!empty($_POST['cedula'])) {
  $records = $conn->prepare('SELECT * FROM usuario WHERE id = :cedula');
  $records->bindParam(':cedula', $_POST['cedula']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  $message = '';
  $cedula = $_POST['cedula'];
  if ($results['id'] == $cedula) {
    //generamos contraseña nueva
    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    $password = "";
    //Reconstruimos la contraseña segun la longitud que se quiera
    for($i=0;$i<11;$i++) {
       //obtenemos un caracter aleatorio escogido de la cadena de caracteres
       
       $pass .= substr($str,rand(0,62),1);
    }
       $password = password_hash($pass, PASSWORD_BCRYPT);
        $to = $results['email']; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
        $email_subject = "RtsWeb:  Recuperar contraseña";
        $email_body = "$nombres.\n\n"."Esta es tu nueva contraseña
        :\n\nPassword: $pass";
        $headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
        $headers .= "Reply-To: $email_address";   
        mail($to,$email_subject,$email_body,$headers);
        $conn->query( "UPDATE usuario SET password = '$password' WHERE id = $cedula"); 
    echo "<script>alert('Hemos enviado una nueva contraseña a tu correo electronico,  Revisa tu Correo electronico ✅'); location='../../index.php'</script>";
  } else {
    $message = 'Esta cedula no secencuentra registrada';
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

  <title>RtsWeb-Recuperar Contraseña</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">

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
  <link href="../../src/assets/css/login.css" rel="stylesheet">
</head>

<body>
  <div class="loader_bg">
    <div class="loader"></div>
  </div>
  <form class="form-signin" action="Recuperar-Pass.php" method="post">
    <div class="text-center mb-4">
    <a href="../../index.php"><img class="mb-4" src="../../src/assets/img/logo3.png" alt="" width="350" height="110"></a>
      <hr>
      <h1 class="h3 mb-3 font-weight-normal">Recuperar Contraseña</h1>
      <p>Prorfavor ingrese su numero cedula para verificar sus datos. si existe una cuenta
        asocida a esta cedula se le enviara un correo electronico con la informacion necesaria para recuperar su contraseña</p>
      <br>
      <?php if (!empty($message)) : ?>
        <p class="msg" id="msg"> <?= $message ?></p>
      <?php endif; ?>
    </div>

    <div class="form-label-group">
      <input type="text" id="cedula" class="form-control" name="cedula" required autofocus>
      <label for="inputEmail">Cedula</label>
    </div>
    <div class="checkbox mb-3">
      <label>
        <a href="../../index.php">Tengo una cuenta</a>
      </label>
      <label>|
        <a href="./Register.php">Registrate</a>
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Recuperar</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy; Copyright RtsWeb 2020 </p>
  </form>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery.slim.min.js"><\/script>')
  </script>
  <script src="../../src/assets/js/bootstrap.bundle.min.js"></script>
  <script src="../../src/assets/js/form-validation.js"></script>
  <script src="../../src/assets/js/bootstrap.min.js"></script>
  <script src="../../src/assets/js/jquery-3.2.1.min.js"></script>
  <script src="../../src/assets/js/main.js"></script>
  <script src="../../src/assets/js/jqBootstrapValidation.js"></script>
  <script src="../../src/assets/js/jquery.min.js"></script>
</body>

</html>