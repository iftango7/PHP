<?php
	session_start();

	$image = imagecreatetruecolor(100, 40);
	$bgcolor = imagecolorallocate($image, 255, 255, 255);

	imagefill($image, 0, 0, $bgcolor);

	$verificationCode = '';

	for($i = 0; $i < 4; $i++)
	{
		$fontsize = 18;
		$fontcolor = imagecolorallocate($image, rand(2, 10), rand(2, 10), rand(3, 10));

		$data = '1234567890';
		$fontcontent = substr($data, rand(0, strlen($data)-1), 1);
		$verificationCode .= $fontcontent;

		$x = ($i*100/4 + rand(5, 10));
		$y = rand(5, 10);

		imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
	}

	$_SESSION['authcode'] = $verificationCode;

	for($i = 0; $i < rand(100, 200); $i++)
	{
		$pointcolor = imagecolorallocate($image, rand(100, 200), rand(100, 200), rand(100, 200));
		imagesetpixel($image, rand(1, 99), rand(1, 29), $pointcolor);
	}

	for($i = 0; $i < rand(10, 15); $i++)
	{
		$linecolor = imagecolorallocate($image, rand(120, 250), rand(120, 250), rand(120, 250));
		imageline($image, rand(1, 99), rand(1, 29), rand(1, 99), rand(1, 29), $linecolor);
	}

	header('content-type: image/png');
	imagepng($image);

	imagedestroy($image);
?>