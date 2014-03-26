<?php
//checkNum.php
session_id() or session_start();

function random($len)
{
	$srcstr="234XH5WRTE789AK"; //01ABCDEFGHIJKLMNOPQRSTUVWXYZ
	mt_srand();
	$strs="";
	for($i=0;$i<$len;$i++){
		$strs.=$srcstr[mt_rand(0,strlen($srcstr)-1)];
	}
	return strtoupper($strs);
}

function code()
{
	$str = random(4);	//随机生成的字符串
	$width  = 50;	//验证码图片的宽度 
	$height = 18;	//验证码图片的高度
	@header("Content-Type:image/png");
	$_SESSION["code"] = $str;
	//echo $str;
	$im=imagecreate($width,$height);
	//背景色
	$back=imagecolorallocate($im,0xFF,0xFF,0xFF);
	//模糊点颜色
	$pix=imagecolorallocate($im,187,mt_rand(215,230),mt_rand(100,247));//247);
	//字体色
	$font=imagecolorallocate($im,mt_rand(50,60),mt_rand(120,163),mt_rand(50,238));//238);
	//绘模糊作用的点
	mt_srand();
	for($i=0;$i<1000;$i++){
		imagesetpixel($im,mt_rand(0,$width),mt_rand(0,$height),$pix);
	}
	imagestring($im, 5, 7, 1,$str, $font);
	$font=imagecolorallocate($im,0xAC,0xAC,0xAC);//238);
	imagerectangle($im,0,0,$width-1,$height-1,$font);
	$font=imagecolorallocate($im,0xcf,0xcf,0xcf);//238);
	for($i=6;$i<18;$i+=6){
		imageline($im,0,$i,50,$i,$font);
	}
	imagepng($im);
	imagedestroy($im);
	$_SESSION["code"] = $str;
}

//code();

function chk_code($str)
{
	return strtoupper($str) == strtoupper($_SESSION['code']);
}

# End of file