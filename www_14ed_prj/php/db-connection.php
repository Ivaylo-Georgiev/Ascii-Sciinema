<?php
function openConnection()
{
  $dbhost = "localhost";
  $dbuser = "ivayloWEB";
  $dbpass = "********";
  $dbname = "ascii_sciinema";
  $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
  return $conn;
}
?>
