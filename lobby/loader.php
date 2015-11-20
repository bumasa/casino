<?
error_reporting(0);
session_start();
$l=$_SESSION['l'];
if(!isset($l)){ 
header("Location: ../lobby/login.php"); 
exit; 
}
$gm=$_GET["gm"];
if(!preg_match("/^[a-z_0-9]+$/", $gm)) {
echo "Ошибка !!!<script language=\"JavaScript\">location.href=\"../index.php\";</script>";exit;
}
?>
<HTML>
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1251">
<title>Online Casino</title>
</HEAD>
<BODY bgcolor="#000000" leftmargin="0" marginwidth="0" marginheight="0" topmargin="0">
<center>
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" WIDTH="100%" HEIGHT="100%" id="index">
<PARAM NAME="movie" VALUE="game/<? echo $gm;?>.swf">
<PARAM NAME="quality" VALUE="high">
<PARAM NAME="bgcolor" VALUE="#000000">
<PARAM NAME="menu" VALUE="false">
<EMBED src="game/<? echo $gm;?>.swf" quality=high bgcolor="#000000" WIDTH="100%" HEIGHT="100%" NAME="index" TYPE="application/x-shockwave-flash" PLUGINSPAGE="https://www.macromedia.com/go/getflashplayer"></EMBED>
</OBJECT>
</center>
</BODY></HTML>
