<?php
$server = 'localhost';
$username = 'root';
$password = '123';
$database = 'RtsWeb';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
?>