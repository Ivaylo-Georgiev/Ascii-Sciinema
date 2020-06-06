<?php

class ImageToAscii
{

	protected $image;
	protected $height;
	protected $width;


	public function __construct($options)
	{

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

	public function convertImage()
	{
		$output = '';
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
		$offset = intdiv($rgb, 524288);
		if($offset == 28) {
			$offset = $offset + 1;
		}
		return chr(64 + $offset);
	}
}
