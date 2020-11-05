<?php
require '../../config/v_session.php';
require '../../config/Conn.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
if (!empty($user['id']) && !empty($_POST['texto'])) {
    $fechaActual = date('d-m-Y H:i:s');
    $sql = "INSERT INTO reporte (idU, fecha, sintomas) VALUES (:id_u, :fecha, :resumen)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_u', $user['id']);
    $stmt->bindParam(':fecha', $fechaActual);
    $stmt->bindParam(':resumen', $_POST['texto']);
    if ($stmt->execute()) {
        $to = "map970330@gmail.com"; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
        $email_subject = "RtsWeb Reporte:  Nuevo reporte";
        $email_body = $user['nombres'] . $user['apellidos'] . ".\n\n" . "Reporte estado de salud
        :\n\nReporte:" . $_POST['texto'];
        $headers = "From:" . $user['email'] . "\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
        $headers .= "Reply-To:" . $user['email'];
        mail($to, $email_subject, $email_body, $headers);
        echo "<script>alert('Reporte enviado');Location:'./Report.php'</script>";
        header('Location: ./Report.php');
    } else {
        echo "<scrip>alert('Algo salio mal, verifique ⚠️');</scrip>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../src/assets/img/icono.png" />

    <title>RtsWeb</title>

    <link rel="stylesheet" href="../../src/assets/css/styles.css">
    <link href="../../src/assets/css/bootstrap.min.css" rel="stylesheet">


    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/0ee106494a.js" crossorigin="anonymous"></script>

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://kit.fontawesome.com/0ee106494a.js" crossorigin="anonymous"></script>

    <link href="../../src/assets/css/home.css" rel="stylesheet">
    <script src="../../src/assets/js/jquery.js"></script>
    <script src="../../src/assets/js/loader.js"></script>
    <link href="../../src/assets/css/loader.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar  navbar-expand-lg navbar-light bg-light fixed-top">
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
                            <a class="nav-item nav-link active" href="Report.php"><i class="fas fa-file-medical-alt"></i> Reportes</a>
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
    <br><br><br><br>
    <div class="container cont">
        <main class="Main">
            <div class="Main-nurse">
                <img src="../../src/assets/img/nurse.webp" alt="">
            </div>
            <div class="Main-textarea">
                <div class="Main-textarea-btns">
                    <button class="btn btn-primary" id="botongrabar">
                        <i class="fas fa-play"></i> Hablar
                    </button>
                    <button class="btn btn-danger" id="botonpausar">
                        <i class="fas fa-pause" ></i> Pausar
                    </button>
                </div>
                <form action="nuevoReporte.php" method="post" class="Main-textarea-area">
                    <textarea name="texto" id="texto" cols="30" rows="10" placeholder="Aquí se verá tu reporte!!"></textarea>
                    <button class="btn btn-success">Enviar Reporte</button>
                </form>
            </div>

        </main>

    </div>
    <br><br><br><br><br>
    <footer>
        <p> &copy; </p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="../../src/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../src/assets/js/form-validation.js"></script>
    <script src="../../src/assets/js/bootstrap.min.js"></script>
    <script src="../../src/assets/js/jquery-3.2.1.min.js"></script>
    <script src="../../src/assets/js/index.js"></script>


    <script>
        new WOW().init();
    </script>




</body>

</html>