<?
Error_Reporting(E_ALL & ~E_NOTICE);
unset($l); 
session_start();
session_register($l);
if(!isset($l)){ 
header("Location: ../../login.php"); 
exit; 
}
?>
<HTML>
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1251">
<title>���� ������� WHAT A HOOT</title>

</HEAD>
<p align="center">
<body bgcolor="#000000" leftMargin=0 rightMargin=0 bottomMargin=0 topMargin=0 marginheight="0" marginwidth="0" background="lucky_drink.jpg"> 
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,18,0" width="100%" height="100%" id="test" align="middle">
<param name="allowFullScreen" value="true" />
<param name="movie" value="whathoot.swf" />
<param name="bgcolor" value="#000000" />
<embed src="whathoot.swf" allowFullScreen="true" bgcolor="#000000" width="100%" height="100%"name="game" align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
</p>
</BODY></HTML>
