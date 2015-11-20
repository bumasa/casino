<?
// Double Magic Version 2 for masvet v3
// www.casinosoft.biz
// 
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
if ($bet<>1 && $bet<>2){ $bet=1;}
if ($row[3] < 1 ){$cas=0;}
if ($cas<>1){
echo "&cash=$row[3]";
}
if ($cas==1){
$win=0;
mysql_query("update users set cash=cash-'$bet' where login='$l'");
mysql_query("update game_bank set bank=bank+'$bet' where name='ttuz'");
srand ((double) microtime()*1000);
$rnd_win=rand(1,6);
if ($rnd_win == 3){$pdl=rand(1,21); $rnd_win="";}else{ $pdl=22; $rnd_win="";}
$rnd_sim=rand($pdl,29);
$rnd_win2=rand(1,10);
if ($rnd_win2 == 5){$rnd_sim=rand(18,21); $rnd_win="";}
if ($rnd_sim==1){ $r1=11; $r2=11; $r3=11; $win=$bet*800; }
if ($rnd_sim==2){ $r1=1; $r2=1; $r3=1; $win=$bet*100; }
if ($rnd_sim==3){ $r1=3; $r2=3; $r3=3; $win=$bet*50; }
if ($rnd_sim==4){ $r1=5; $r2=5; $r3=5; $win=$bet*25; }
if ($rnd_sim==5){ $r1=9; $r2=9; $r3=9; $win=$bet*20; }
if ($rnd_sim==6){ $r1=7; $r2=7; $r3=7; $win=$bet*10; }
if ($rnd_sim==7){ $r1=9; $r2=9; $r3=1; $win=$bet*5; }
if ($rnd_sim==8){ $r1=9; $r2=9; $r3=3; $win=$bet*5; }
if ($rnd_sim==9){ $r1=9; $r2=9; $r3=5; $win=$bet*5; }
if ($rnd_sim==10){ $r1=9; $r2=9; $r3=7; $win=$bet*5; }
if ($rnd_sim==11){ $r1=7; $r2=9; $r3=9; $win=$bet*5; }
if ($rnd_sim==12){ $r1=11; $r2=9; $r3=9; $win=$bet*5; }
if ($rnd_sim==13){ $r1=3; $r2=9; $r3=9; $win=$bet*5; }
if ($rnd_sim==14){ $r1=1; $r2=9; $r3=9; $win=$bet*5; }
if ($rnd_sim==15){ $r1=3; $r2=5; $r3=7; $win=$bet*3; }
if ($rnd_sim==16){ $r1=5; $r2=7; $r3=3; $win=$bet*3; }
if ($rnd_sim==17){ $r1=7; $r2=3; $r3=5; $win=$bet*3; }
if ($rnd_sim==18){ $r1=9; $r2=1; $r3=3; $win=$bet*2; }
if ($rnd_sim==19){ $r1=7; $r2=3; $r3=9; $win=$bet*2; }
if ($rnd_sim==20){ $r1=1; $r2=5; $r3=9; $win=$bet*2; }
if ($rnd_sim==21){ $r1=9; $r2=7; $r3=1; $win=$bet*2; }
if ($rnd_sim==22){ $r1=1; $r2=3; $r3=11; $win=0; }
if ($rnd_sim==23){ $r1=11; $r2=7; $r3=5; $win=0; }
if ($rnd_sim==24){ $r1=1; $r2=5; $r3=7; $win=0; }
if ($rnd_sim==25){ $r1=5; $r2=1; $r3=11; $win=0; }
if ($rnd_sim==26){ $r1=5; $r2=3; $r3=11; $win=0; }
if ($rnd_sim==27){ $r1=5; $r2=1; $r3=5; $win=0; }
if ($rnd_sim==28){ $r1=11; $r2=3; $r3=5; $win=0; }
if ($rnd_sim==29){ $r1=5; $r2=3; $r3=1; $win=0; }
$resultb=mysql_query("select * from game_bank where name='ttuz'");
$rowb=mysql_fetch_array($resultb);
$bank = $rowb[1];
$proc = $rowb[2];
$caswin = $bank/100*$proc;
if ($win>=$caswin) { 
$rnd_sim=rand(22,29);
if ($rnd_sim==22){ $r1=1; $r2=3; $r3=11; $win=0; }
if ($rnd_sim==23){ $r1=11; $r2=7; $r3=5; $win=0; }
if ($rnd_sim==24){ $r1=1; $r2=5; $r3=7; $win=0; }
if ($rnd_sim==25){ $r1=5; $r2=1; $r3=11; $win=0; }
if ($rnd_sim==26){ $r1=5; $r2=5; $r3=11; $win=0; }
if ($rnd_sim==27){ $r1=5; $r2=1; $r3=5; $win=0; }
if ($rnd_sim==28){ $r1=11; $r2=3; $r3=5; $win=0; }
if ($rnd_sim==29){ $r1=5; $r2=3; $r3=1; $win=0; }
}
if ($win>0){
mysql_query("update users set cash=cash+'$win' where login='$l'");
mysql_query("update game_bank set bank=bank-'$win' where name='ttuz'");
}
$date=date("d.m.y");
$time=date("H:i:s");
$sqls="INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[3]','$bet','$win','Double Magic')";
mysql_query($sqls);
$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);
echo "&cash_new=$row[3]&r1=$r1&r2=$r2&r3=$r3&win_new=$win&bet=$bet&spin=1";
}
?>