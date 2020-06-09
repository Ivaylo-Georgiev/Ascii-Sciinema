<?php

function openConnection() {
  $configs = include('../php/config.php');

  $host = $configs->DB_HOST;
  $user = $configs->DB_USER;
  $password = $configs->DB_PASSWORD;
  $name = $configs->DB_NAME;

  $conn = null;
  try {
    $conn = new PDO("mysql:host=$host;dbname=$name", $user, $password);
  }
  catch(PDOException $e) {
    echo '<p class="error">An error occured during connection to the database</p>';
  }

  return $conn;
}

?>
