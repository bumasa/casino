<?php $num = rand('111111','999999'); 
if ($num<>"") {setcookie('reg_num', $num, time()+60*60*24*30);}
$img = imagecreate('50', '16'); 
$back = imagecolorallocate($img, 255, 0, 0); 
$black = imagecolorallocate($img, 255, 255, 255); 
imagestring($img,3,5,0,$num,$black); imagegif($img); ?>