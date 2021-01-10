<?php
// 功能 生成4为随机验证码图片

// 生成4为随机数	
$code = '';
for ($i = 0; $i < 4; $i++) {
	$code .= rand(0, 9);
}
// echo "<br>";
// var_dump($code);

// 一个生成随机颜色的函数
function randColor($img, $i = 0, $j = 255)
{
	return imagecolorallocate($img, rand($i, $j), rand($i, $j), rand($i, $j));
}
// 使用GD库绘制
$img = imagecreatetruecolor(100, 30);
// 随机一个背景颜色
imagefill($img, 0, 0, randColor($img, 200, 255));
// 写入验证码
$endCode = '';
for ($i = 0; $i < 4; $i++) {
	$code = rand(0, 9);
	$endCode .= $code;
	imagettftext($img, rand(18, 22), 0, rand(10, 15) + 20 * $i, rand(15, 30), randColor($img, 0, 64), "C:\Windows\Fonts\msyh.ttc", $code);
}
// 干扰项 点
for ($i = 0; $i < 500; $i++) {
	imagesetpixel($img, rand(0, 99), rand(0, 29), randColor($img));
}
// 干扰项 线
for ($i = 0; $i < 5; $i++) {
	imageline($img, rand(0, 99), rand(0, 29), rand(0, 99), rand(0, 29), randColor($img));
}
// 把验证码写入会话
session_start();
$_SESSION['code'] = $endCode;

header('Content-type:image/jpeg');
imagejpeg($img);
imagedestroy($img);
