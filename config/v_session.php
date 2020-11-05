<?php
session_start();
require 'Conn.php';
if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT id, nombres,apellidos, telefono,email, password, direccion, Tipo FROM usuario WHERE id = :id_cliente');
  $records->bindParam(':id_cliente', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  $user = null;
  if (count($results) > 0) {
    $user = $results;
  }
}
