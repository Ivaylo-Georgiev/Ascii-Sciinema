<?php

require_once 'image-to-ascii.php';
include './db-connection.php';

function downloadVideo($videoName) {
  $conn = openConnection();
  $videoFile = $conn->query("SELECT CONTENT FROM VIDEOS WHERE NAME='".str_replace('_', ' ', $videoName)."'")->fetch();
  if (!is_dir('../tmp')) {
    mkdir('../tmp', 0777, true);
  }
	file_put_contents("../tmp/".$videoName.".mp4", $videoFile['CONTENT']);
}

function extractFrames($videoName) {
  if (!is_dir('../tmp/frames')) {
    mkdir('../tmp/frames', 0777, true);
  }

  shell_exec('ffmpeg -i ../tmp/' . $videoName . '.mp4 ../tmp/frames/thumb%04d.png');
}

function fetchAsciiFrames($videoName, $scale) {#
  downloadVideo($videoName);
  extractFrames($videoName);

	$fileNames = preg_grep('~\.(png)$~', scandir('../tmp/frames'));
	$asciiFrames = array();
	foreach($fileNames as $file) {
		$filePath = '../tmp/frames/' . $file;
		$ascii = new ImageToAscii(array(
			'image' =>  $filePath,
			'scale' => $scale
		));
		array_push($asciiFrames, $ascii->convertImage());
		unlink($filePath);
	}
  unlink('../tmp/'.$videoName.'.mp4');

	return json_encode($asciiFrames, JSON_UNESCAPED_SLASHES );
}

print_r(fetchAsciiFrames($_GET["videoName"], $_GET["scale"]));

?>
