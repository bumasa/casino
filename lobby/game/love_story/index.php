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
<title>����-������� "���� ������� LOVE STORY"</title>

<script language="JavaScript" type="text/javascript">
<!--
window.status="����-������� 'LOVE STORY'";
//-->
</script>
</HEAD>
<BODY bgcolor="#000000" leftmargin="0" marginwidth="0" marginheight="0" topmargin="0">
<center>
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
 codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0"
 WIDTH="100%" HEIGHT="100%" id="index">
	<PARAM NAME="movie" VALUE="love_store.swf">
	<PARAM NAME="FlashVars" VALUE="l=<? echo $l; ?>">
	<PARAM NAME="quality"   VALUE="high">
	<PARAM NAME="bgcolor"   VALUE="#000000">
	<PARAM NAME="menu"      VALUE="true">
	<EMBED src="love_store.swf" quality=high bgcolor="#000000" FlashVars="l=<? echo $l; ?>" WIDTH="800" HEIGHT="600" NAME="index"
 TYPE="application/x-shockwave-flash" PLUGINSPAGE="https://www.macromedia.com/go/getflashplayer"></EMBED>
</OBJECT>
</center>



</BODY></HTML>

