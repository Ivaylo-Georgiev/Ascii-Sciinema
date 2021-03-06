<?php

require_once '../php/image-to-ascii.php';
require_once '../php/db-connection.php';

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

function cacheAsciiFrames($fileName, $asciiFrames) {
  if (!is_dir('../cache')) {
    mkdir('../cache', 0777, true);
  }

  file_put_contents($fileName, $asciiFrames);
}

function fetchAsciiFrames($videoName, $scale, $color) {
  $cacheFileName = '../cache/'.$videoName.'-'.$scale.'-'.$color.'.json';
  if(file_exists($cacheFileName)) {
    return file_get_contents($cacheFileName);
  }

  downloadVideo($videoName);
  extractFrames($videoName);

	$fileNames = preg_grep('~\.(png)$~', scandir('../tmp/frames'));
	$asciiFrames = array();
	foreach($fileNames as $file) {
		$filePath = '../tmp/frames/' . $file;
		$ascii = new ImageToAscii(array(
			'image' =>  $filePath,
			'scale' => $scale,
      'color' => $color
		));
		array_push($asciiFrames, $ascii->convertImage());
		unlink($filePath);
	}
  unlink('../tmp/'.$videoName.'.mp4');
  rmdir('../tmp/frames');
  rmdir('../tmp');

  $asciiFrames = json_encode($asciiFrames, JSON_UNESCAPED_SLASHES);
  cacheAsciiFrames($cacheFileName, $asciiFrames);

	return $asciiFrames;
}

print_r(fetchAsciiFrames($_GET["videoName"], $_GET["scale"], $_GET["color"]));

?>
