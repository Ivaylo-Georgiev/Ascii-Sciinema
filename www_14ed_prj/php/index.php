<?php
include "./db-connection.php";

$conn = openConnection();
$shortVideos = $conn->query("SELECT NAME, DURATION, THUMBNAIL FROM VIDEOS WHERE DURATION='SHORT'")->fetchAll();
$longVideos = $conn->query("SELECT NAME, DURATION, THUMBNAIL FROM VIDEOS WHERE DURATION='LONG'")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ascii Sciinema</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="icon" type="image/png" href="../resources/fav.png"/>
</head>
<body>
  <header>
    <h1 id="home" class="glitch" title="Home">Ascii Sciinema</h1>
  </header>

  <main class="video-list">
    <section class="short-videos">
      <div class="section-title">
        <h2>Short Videos</h2>
        <div class="info tooltip">&#9432;
          <span class="tooltip-text">Videos, shorter than 10 seconds. They take less time to load.</span>
        </div>
      </div>

      <section class="video-container">
        <?php
        foreach ($shortVideos as $shortVideo) {
          $name = $shortVideo['NAME'];
          $thumbnail = $shortVideo['THUMBNAIL'];

          echo '<div class="video '.str_replace(' ', '_', $name).'">';
          echo '<img class="video-thumbnail" src="data:image/png;base64,'.base64_encode($thumbnail).'" title="Play video" alt="'.$name.'"/>';
          echo '<h3 class="video-name">'.$name.'</h3>';
          echo '</div>';
        }
         ?>
      </section>
    </section>

    <section class="long-videos">
      <div class="section-title">
        <h2>Long Videos</h2>
        <div class="info tooltip">&#9432;
          <span class="tooltip-text">Videos, longer than 10 seconds. They take more time to load.</span>
        </div>
      </div>
      <section class="video-container">
        <?php
        foreach ($longVideos as $longVideo) {
          $name = $longVideo['NAME'];
          $thumbnail = $longVideo['THUMBNAIL'];

          echo '<div class="video '.str_replace(' ', '_', $name).'">';
          echo '<img class="video-thumbnail" src="data:image/png;base64,'.base64_encode($thumbnail).'" title="Play video" alt="'.$name.'"/>';
          echo '<h3 class="video-name">'.$name.'</h3>';
          echo '</div>';
        }
         ?>
      </section>
    </section>
  </main>

  <script src="../js/play.js"></script>
  <script src="../js/redirect.js"></script>
</body>
</html>
