<?php

require_once '../php/db-connection.php';

function fillDatabase() {
  $configs = include('../php/config.php');#
  $db_resources_folder = $configs->DB_RESOURCES;
  $conn = openConnection();

  insertJohnnyBravoVideo($conn, $db_resources_folder);
  insertMrBeanVideo($conn, $db_resources_folder);
  insertStickmanFightVideo($conn, $db_resources_folder);
  insertGrowVideo($conn, $db_resources_folder);
  insertFrozenVideo($conn, $db_resources_folder);
  insertGoodShotVideo($conn, $db_resources_folder);
  insertCountdownVideo($conn, $db_resources_folder);
  insertNatureVideo($conn, $db_resources_folder);
}

function insertJohnnyBravoVideo($conn, $db_resources_folder) {
  $sql = "INSERT INTO VIDEOS(NAME, DURATION, CONTENT, THUMBNAIL) VALUES('Johnny Bravo', 'LONG', :content, :thumbnail);";
  $stmt = $conn->prepare($sql);
  $content = fopen($db_resources_folder . '\\bravo.mp4', 'rb');
  $stmt->bindParam(':content', $content, PDO::PARAM_LOB);
  $thumbnail = fopen($db_resources_folder . '\\bravo.png', 'rb');
  $stmt->bindParam(':thumbnail', $thumbnail, PDO::PARAM_LOB);
  if($stmt->execute() == 1){
    echo '<p>Successfully inserted a video in the database: Johnny Bravo</p>';
  } else {
    echo '<p>Ann error occured during the insertion of a video in the database: Johnny Bravo. Perhaps it has already been inserted?</p>';
  };
}

function insertMrBeanVideo($conn, $db_resources_folder) {
  $sql = "INSERT INTO VIDEOS(NAME, DURATION, CONTENT, THUMBNAIL) VALUES('Mr. Bean', 'LONG', :content, :thumbnail);";
  $stmt = $conn->prepare($sql);
  $content = fopen($db_resources_folder . '\\mrbean.mp4', 'rb');
  $stmt->bindParam(':content', $content, PDO::PARAM_LOB);
  $thumbnail = fopen($db_resources_folder . '\\mrbean.png', 'rb');
  $stmt->bindParam(':thumbnail', $thumbnail, PDO::PARAM_LOB);
  if($stmt->execute() == 1){
    echo '<p>Successfully inserted a video in the database: Mr. Bean</p>';
  } else {
    echo '<p>Ann error occured during the insertion of a video in the database: Mr. Bean. Perhaps it has already been inserted?</p>';
  };
}

function insertStickmanFightVideo($conn, $db_resources_folder) {
  $sql = "INSERT INTO VIDEOS(NAME, DURATION, CONTENT, THUMBNAIL) VALUES('Stickman Fight', 'LONG', :content, :thumbnail);";
  $stmt = $conn->prepare($sql);
  $content = fopen($db_resources_folder . '\\stickmanfight.mp4', 'rb');
  $stmt->bindParam(':content', $content, PDO::PARAM_LOB);
  $thumbnail = fopen($db_resources_folder . '\\stickmanfight.png', 'rb');
  $stmt->bindParam(':thumbnail', $thumbnail, PDO::PARAM_LOB);
  if($stmt->execute() == 1){
    echo '<p>Successfully inserted a video in the database: Stickman Fight</p>';
  } else {
    echo '<p>Ann error occured during the insertion of a video in the database: Stickman Fight. Perhaps it has already been inserted?</p>';
  };
}

function insertGrowVideo($conn, $db_resources_folder) {
  $sql = "INSERT INTO VIDEOS(NAME, DURATION, CONTENT, THUMBNAIL) VALUES('Grow', 'SHORT', :content, :thumbnail);";
  $stmt = $conn->prepare($sql);
  $content = fopen($db_resources_folder . '\\grow.mp4', 'rb');
  $stmt->bindParam(':content', $content, PDO::PARAM_LOB);
  $thumbnail = fopen($db_resources_folder . '\\grow.png', 'rb');
  $stmt->bindParam(':thumbnail', $thumbnail, PDO::PARAM_LOB);
  if($stmt->execute() == 1){
    echo '<p>Successfully inserted a video in the database: Grow</p>';
  } else {
    echo '<p>Ann error occured during the insertion of a video in the database: Grow. Perhaps it has already been inserted?</p>';
  };
}

function insertFrozenVideo($conn, $db_resources_folder) {
  $sql = "INSERT INTO VIDEOS(NAME, DURATION, CONTENT, THUMBNAIL) VALUES('Frozen', 'LONG', :content, :thumbnail);";
  $stmt = $conn->prepare($sql);
  $content = fopen($db_resources_folder . '\\frozen.mp4', 'rb');
  $stmt->bindParam(':content', $content, PDO::PARAM_LOB);
  $thumbnail = fopen($db_resources_folder . '\\frozen.png', 'rb');
  $stmt->bindParam(':thumbnail', $thumbnail, PDO::PARAM_LOB);
  if($stmt->execute() == 1){
    echo '<p>Successfully inserted a video in the database: Frozen</p>';
  } else {
    echo '<p>Ann error occured during the insertion of a video in the database: Frozen. Perhaps it has already been inserted?</p>';
  };
}

function insertGoodShotVideo($conn, $db_resources_folder) {
  $sql = "INSERT INTO VIDEOS(NAME, DURATION, CONTENT, THUMBNAIL) VALUES('Good Shot', 'SHORT', :content, :thumbnail);";
  $stmt = $conn->prepare($sql);
  $content = fopen($db_resources_folder . '\\goodshot.mp4', 'rb');
  $stmt->bindParam(':content', $content, PDO::PARAM_LOB);
  $thumbnail = fopen($db_resources_folder . '\\goodshot.png', 'rb');
  $stmt->bindParam(':thumbnail', $thumbnail, PDO::PARAM_LOB);
  if($stmt->execute() == 1){
    echo '<p>Successfully inserted a video in the database: Good Shot</p>';
  } else {
    echo '<p>Ann error occured during the insertion of a video in the database: Good Shot. Perhaps it has already been inserted?</p>';
  };
}


function insertCountdownVideo($conn, $db_resources_folder) {
  $sql = "INSERT INTO VIDEOS(NAME, DURATION, CONTENT, THUMBNAIL) VALUES('Countdown', 'SHORT', :content, :thumbnail);";
  $stmt = $conn->prepare($sql);
  $content = fopen($db_resources_folder . '\\countdown.mp4', 'rb');
  $stmt->bindParam(':content', $content, PDO::PARAM_LOB);
  $thumbnail = fopen($db_resources_folder . '\\countdown.png', 'rb');
  $stmt->bindParam(':thumbnail', $thumbnail, PDO::PARAM_LOB);
  if($stmt->execute() == 1){
    echo '<p>Successfully inserted a video in the database: Countdown</p>';
  } else {
    echo '<p>Ann error occured during the insertion of a video in the database: Countdown. Perhaps it has already been inserted?</p>';
  };
}

function insertNatureVideo($conn, $db_resources_folder) {
  $sql = "INSERT INTO VIDEOS(NAME, DURATION, CONTENT, THUMBNAIL) VALUES('Nature', 'SHORT', :content, :thumbnail);";
  $stmt = $conn->prepare($sql);
  $content = fopen($db_resources_folder . '\\nature.mp4', 'rb');
  $stmt->bindParam(':content', $content, PDO::PARAM_LOB);
  $thumbnail = fopen($db_resources_folder . '\\nature.png', 'rb');
  $stmt->bindParam(':thumbnail', $thumbnail, PDO::PARAM_LOB);
  if($stmt->execute() == 1){
    echo '<p>Successfully inserted a video in the database: Nature</p>';
  } else {
    echo '<p>Ann error occured during the insertion of a video in the database: Nature. Perhaps it has already been inserted?</p>';
  };
}

fillDatabase();

?>
