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
<html>
<head>
<title>Black Jack VIP </title>
</head>
<style>
BODY {overflow: hidden}
</style>
<SCRIPT type=text/javascript>
function helpwnd(url) {
    name = name || 'BLACKJACK'
    var hwin = window.open("help.php?name=" + url,"helpwnd","width=550,height=350,scrollbars=yes,toolbar=no");
    hwin.focus();
}

function closeGame() {
	CloseGame()
}
function CloseGame() {
//Old Casino	
//if (parent != null){
//if (!parent.opener) parent.opener=window
//parent.close()
//} else {
//if (!window.opener) window.opener=window
//window.close()
//}

// For Masvet Casino
location.href="../../index.php";
}

</SCRIPT>


<body marginheight="0" marginwidth="0" leftmargin="0" topmargin="0" bgcolor="#FFFFFF" >
<table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%">
<tr>
<td width="100%">


<OBJECT HEIGHT="100%" WIDTH="100%" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" id="Flash" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
<PARAM VALUE="bjv.swf?ROUNDSTOSHOWBANNER=1&amp;TIMELIMIT=10000000000&GAMESESSION=bj_9542&amp;REAL=1&amp;HelpURL=javascript:helpwnd('BLACKJACK')&URL_SERVLET=/lobby/game/bjv/game.php&amp;URL_REDIRECTOR=/lobby/game/bjv/index.php" NAME="movie">
<PARAM VALUE="false" NAME="menu">
<PARAM VALUE="best" NAME="quality">
<PARAM VALUE="#000000" NAME="bgcolor">
<EMBED PLUGINSPAGE="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" TYPE="application/x-shockwave-flash" HEIGHT=100% WIDTH=100% bgcolor="#000000" devicefont="true" quality="best" menu="false" name="Flash" src="bjv.swf?ROUNDSTOSHOWBANNER=1&amp;GAMESESSION=ROULETTE_9542&amp;REAL=1&amp;HelpURL=javascript:helpwnd('SILVERBLACKJACK')&amp;URL_SERVLET=/lobby/game/bjv/game.php&amp;URL_REDIRECTOR=/lobby/game/bjv/index.php"></EMBED>
</OBJECT>



</td>
</tr>
</table>
</body>
</html>
