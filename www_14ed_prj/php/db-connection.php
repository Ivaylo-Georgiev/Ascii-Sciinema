<?php

function openConnection() {
  $configs = include('../php/config.php');

  $host = $configs->DB_HOST;
  $user = $configs->DB_USER;
  $password = $configs->DB_PASSWORD;
  $name = $configs->DB_NAME;
  $conn = new PDO("mysql:host=$host;dbname=$name", $user, $password);

  return $conn;
}

?>
