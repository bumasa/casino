<?
error_reporting(0);
unset($l); 
session_start();
session_register($l);
if(!isset($l)){ 
header("Location: ../../login.php"); 
exit; 
}

//**************GAMEMODE*****************************************************************
if ($HTTP_SESSION_VARS['mode']=="true" or !isset($HTTP_SESSION_VARS['mode']))
{
 include ("../../../setup.php");
}

if ($HTTP_SESSION_VARS['mode']=="false")
{
      include ("../../../setup_virtual.php");
}
//****************************************************************************************
 
$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);
 
 
 echo "&currency=";
 echo "&lng=RU";
 echo "&pop_use=0";
 echo "&pop_1disp=1";
 echo "&pop_nextdisp=60000";
 echo "&pop_url=notused";
 echo "&pop_var1=Do you want to play in real mode ?";
 echo "&pop_var2=Yes";
 echo "&pop_var3=No";
 echo "&pop_var4=loginpage";
 echo "&pop_var=";
 echo "&help=../../love_story.php";
 echo "&bank=../../in.php";
 echo "&casino=../../index.php";
 echo "&currency=";
 echo "&t_ticket=TICKET";
 echo "&t_scratch=SCRATCH";
 echo "&t_help=HELP";
 echo "&t_exit=EXIT";
 echo "&t_info=INFO";
 echo "&t_bank=BANK";
 echo "&t_winpaid=WINNINGS";
 echo "&t_credit=CREDIT";
 echo "&t_bet=BET";
 echo "&t_total=TOTAL";
 echo "&t_youwin=YOU WIN";
 echo "&t_mouse=USE YOUR MOUSE TO SCRATCH";
 echo "&t_please=PLEASE BUY A TICKET";
 echo "&t_gameover1=GAME";
 echo "&t_gameover2=OVER";
 echo "&t_gameover3=INSERT";
 echo "&t_gameover4=COINS";
 echo "&t_alert1=POPOLNITE SVOY BALANS";
 echo "&t_alert2=Your session has expired, please log-in";
 echo "&t_alert3=Only play in one window";
 echo "&t_close=CLOSE";
 echo "&error=0";
 echo "&credit=$row[3]";
 echo "&P_0=2000";
 echo "&P_1=500";
 echo "&P_2=250";
 echo "&P_3=100";
 echo "&P_4=50";
 echo "&P_5=25";
 echo "&P_6=15";
 echo "&P_7=10";
 echo "&P_8=5";
 echo "&P_9=1";
 echo "&coinvalue=10";
 echo "&help=../../love_story.php";
 echo "&bank=../../in.php";
 echo "&casino=../../index.php";
 echo "&game_records=";
 
 
 
 
 
 
 ?>