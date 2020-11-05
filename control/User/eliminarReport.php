<?php
require '../../config/v_session.php';
require '../../config/Conn.php';
if (!isset($_SESSION['user_id'])) {
  header('Location: ../../index.php');
}
$idR = $_POST['idR'];
$idU = $_POST['idU'];
$result = $conn->query("DELETE FROM reporte WHERE id = $idR AND idU = $idU");
if ($result) {
  echo "<script>alert('Reporte Elimada ✅'); location='../../view/User/Report.php'</script>";
} else {
  echo "<script>alert('error al eliminar Reporte'); location='../../view/User/Report.php'</script>";
}
