<?php /*
Convert 1:1 png to 300% dot-style png template for template script.
by per@icode.se

Settings:  */
$width  = 2000; //output
$height = 1000;
$template = 'NordicTemplateSrc.png'; //1:1 transparent png starting at top left
$out      = 'NordicTemplate.png';
$output_to_browser = false;  //output to browser or to disk

$imSrc = imagecreatefrompng($template);
$imginfo = getimagesize($template);
$wSrc = $imginfo[0];
$hSrc = $imginfo[1];

$im = @imagecreatetruecolor($width*3, $height*3) or die('Cannot Initialize new GD image stream');

// Transparent Background
imagealphablending($im, false);
$transparency = imagecolorallocatealpha($im, 0, 0, 0, 127);
imagefill($im, 0, 0, $transparency);
imagesavealpha($im, true);

// pixels
//$wSrc=20; $hSrc = 140;
for($x = 0; $x<$wSrc; $x++) {
	for($y = 0; $y<$hSrc; $y++) {
		$c = imagecolorat($imSrc, $x, $y);
		if($c === 0x7fffffff) continue;
		imagesetpixel($im, $x*3+1, $y*3+1, $c);
	}
}

if($output_to_browser) {
	header('Content-Type: image/png');
	imagepng($im);
} else {
	echo <<< EOT
<!html><head>
<title>NordicTemplate</title>
</head><body>
EOT;
	$f = fopen($out, "w");
	imagepng($im, $f);
	echo "$out written";
}
imagedestroy($im);

