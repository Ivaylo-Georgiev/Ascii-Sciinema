<?php

class ImageToAscii {

	// There are 16777216 RGB colors and 128 ASCII characters, most of which are special.
	// Therefore the system is designed to represent 32 color groups as ASCII characters.
	private const COLOR_GROUP_SEPARATOR = 524288; // 16777216 / 32
	private const BACKSLASH_OFFSET = 28;
	private const INITIAL_ASCII_VALUE = 64;

	private $image;
	private $height;
	private $width;

	public function __construct($options) {
		$this->image = imagecreatefromstring(file_get_contents($options['image']));
		$dimensions = getimagesize($options['image']);

		$this->width = $dimensions[0];
		$this->height = $dimensions[1];

		if (isset($options['scale'])) {
			$scaleWidth = $this->width * $options['scale'];
			$scaleHeight = $this->height * $options['scale'];

			$this->width = $scaleWidth;
			$this->height = $scaleHeight;

			$this->image = imagescale($this->image, $scaleWidth, $scaleHeight);
		}
	}

	public function convertImage() {
		$output = '<pre>';

		for ($y = 0; $y < $this->height; $y++) {
			for ($x = 0; $x <= $this->width; $x++) {
        $rgb = @imagecolorat($this->image, $x, $y);
				if ($x == $this->width) {
          $output .= '<br/>';
        } else {
          $output .= $this->getCharacter($rgb);
        }
      }
    }

		$output .= '</pre>';

		return $output;
	}

	public function getCharacter($rgb) {
		$offset = intdiv($rgb, self::COLOR_GROUP_SEPARATOR);

		// backslash is being escaped by json_encode, which causes the screen to have inconsistent size
		if($offset == self::BACKSLASH_OFFSET) {
			$offset = $offset + 1;
		}

		return chr(self::INITIAL_ASCII_VALUE + $offset);
	}
}

?>
