<?


error_reporting( E_ALL & ~E_NOTICE );
unset( $l );
session_start( );
session_register( $l );


switch ($_GET['ACTION']) {
  default:
if (!isset($l)) {  //Проверка на авторизацию...
  header( "Location: ../../login.php" );
  die();
}

echo "<html>"
    ."<head>"
    ."<META http-equiv=Content-Type content=\"text/html; charset=windows-1251\">"
    ."<title>Игровой автомат</title>"
    ."</head>"
    ."<body bgcolor=\"#0B2A40\" leftmargin=\"0\" marginwidth=\"0\" marginheight=\"0\" topmargin=\"0\">";

echo "<script type=\"text/javascript\">\r\n"
    ."function CloseGame() {\r\n"
    ."window.location.href='../../index.php';\r\n"
    ."}\r\n"
    ."function helpwnd(url) {
var hwin = window.open(\"help.php?name=\" + url,\"helpwnd\",\"width=550,height=350,scrollbars=yes,toolbar=no\");
hwin.focus();
}"
    ."</script>";

echo "<center>";

  //Сам вывод флеша игры
  echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" height=\"100%\" width=\"100%\">"
      ."<tr>"
      ."<td width=\"100%\">"
      //."<center><font color=\"white\"><b>Игра идёт на ".strtoupper($val)."</b></font></center>"
      ."<OBJECT WIDTH=98% HEIGHT=98% codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0\" id=\"Flash\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\">"
      ."<PARAM VALUE=\"StarsKeno.swf?URL_SERVLET=/lobby/game/StarsKeno/game.php&URL_REDIRECTOR=/lobby/game/StarsKeno/index.php&REAL=1&HelpURL=javascript:helpwnd('StarsKeno')\" NAME=\"movie\">"
      ."<PARAM VALUE=\"false\" NAME=\"menu\">"
      ."<PARAM VALUE=\"best\" NAME=\"quality\">"
      ."<PARAM VALUE=\"#0B2A40\" NAME=\"bgcolor\">"
      ."<EMBED PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\" TYPE=\"application/x-shockwave-flash\" WIDTH=98% HEIGHT=98% bgcolor=\"#0B2A40\" devicefont=\"true\" quality=\"best\" menu=\"false\" name=\"Flash\" src=\"StarsKeno.swf?URL_SERVLET=/lobby/game/StarsKeno/game.php&URL_REDIRECTOR=/lobby/game/StarsKeno/index.php&REAL=1&HelpURL=javascript:helpwnd('StarsKeno')\"></EMBED>"
      ."</OBJECT>"
      ."</td>"
      ."</tr>"
      ."</table>";

echo "</center>"
    ."</body>"
    ."<html>";
  break;

  case "SIGNUP":
  header("Location: /index.php?pg=login");
  break;

  case "ERROR":
  header("Location: /lobby/game/StarsKeno/index.php");
  break;

  case "CAHSIER":
  header("Location: /index.php?pg=in");
  break;
}

?>