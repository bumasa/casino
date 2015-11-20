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
<title>Слот автомат Red Road</title>
<script language="JavaScript" type="text/javascript">
<!--
window.status="Слот автомат Red Road";
//-->
</script>
</HEAD>
<BODY bgcolor="#0B2A40" leftmargin="0" marginwidth="0" marginheight="0" topmargin="0">
<center>
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
 codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0"
 WIDTH="100%" HEIGHT="100%" id="index">
	<PARAM NAME="movie" VALUE="060506.swf">
	<PARAM NAME="quality"   VALUE="high">
	<PARAM NAME="menu"      VALUE="false">
<EMBED src="060506.swf" quality=high WIDTH="100%" HEIGHT="100%" NAME="index" TYPE="application/x-shockwave-flash" PLUGINSPAGE="https://www.macromedia.com/go/getflashplayer"></EMBED>
</OBJECT>
</center>
</BODY></HTML>
