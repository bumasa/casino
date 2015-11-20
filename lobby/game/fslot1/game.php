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


if ($cash < 0){$cash=0;}
if ($bet<>0.2 && $bet<>1 && $bet<>5 && $bet<>10 && $bet<>50){ $bet="0.20"; $mon=0;}



$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);


// Первый запуск
if ($mon==0 or $mon==""){
echo "&login=$l";
echo "&cash=$row[3]";
}
// выдали основные данные




if ($mon==1 && $row[3]>=$bet){
$win=0;

mysql_query("update users set cash=cash-'$bet' where login='$l'");
mysql_query("update game_bank set bank=bank+'$bet' where name='ttuz'");

// Запускаем генератор (временный)
srand ((double) microtime()*1000000);
$bar1=rand(1,13);
$bar2=rand(1,13);
$bar3=rand(1,13);
//$bar1=7;
//$bar2=7;
//$bar3=7;



if ($bar1==1 or $bar2==1 or $bar3==1){ $win=$bet*2; }
if ($bar1==7 && $bar2==7 or $bar2==7 && $bar3==7 or $bar1==7 && $bar3==7){ $win=$bet*3; }
if ($bar1==1 && $bar2==1 or $bar2==1 && $bar3==1 or $bar1==1 && $bar3==1){ $win=$bet*3; }
if ($bar1==1 && $bar2==1 && $bar3==1){ $win=$bet*5; }
if ($bar1>=8 && $bar1<=10 && $bar2>=8 && $bar2<=10 && $bar3>=8 && $bar3<=10){ $win=$bet*10; }
if ($bar1==13 && $bar2==13 && $bar3==13){ $win=$bet*15; }
if ($bar1==12 && $bar2==12 && $bar3==12){ $win=$bet*15; }
if ($bar1==11 && $bar2==11 && $bar3==11){ $win=$bet*15; }
if ($bar1==6 && $bar2==6 && $bar3==6){ $win=$bet*20; }
if ($bar1==8 && $bar2==8 && $bar3==8){ $win=$bet*25; }
if ($bar1==9 && $bar2==9 && $bar3==9){ $win=$bet*30; }
if ($bar1==10 && $bar2==10 && $bar3==10){ $win=$bet*35; }
if ($bar1==3 && $bar2==3 && $bar3==3){ $win=$bet*40; }
if ($bar1==5 && $bar2==5 && $bar3==5){ $win=$bet*50; }
if ($bar1==4 && $bar2==4 && $bar3==4){ $win=$bet*55; }
if ($bar1==2 && $bar2==2 && $bar3==2){ $win=$bet*100; }
if ($bar1==7 && $bar2==7 && $bar3==7){ $win=$bet*150; }
if ($bar1==11 && $bar2==12 && $bar3==13){ $win=$bet*200; }


// Проверяем можем ли заплатить если нет то облом

$resultb=mysql_query("select * from game_bank where name='ttuz'");
$rowb=mysql_fetch_array($resultb);
$bank = $rowb[1];
$proc = $rowb[2];
$caswin = $bank/100*$proc;
if ($win>=$caswin) { 
$win=0; 
$bar1=2;
$bar2=3;
$bar3=4;
}
////////////////

if ($win>0){
mysql_query("update users set cash=cash+'$win' where login='$l'");
mysql_query("update game_bank set bank=bank-'$win' where name='ttuz'");
}

$date=date("d.m.y");
$time=date("H:i:s");
$sqls="INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[3]','$bet','$win','Ice Age')";
mysql_query($sqls);

for ($i = 1; $i<=600000; $i++)
{
$marat=$marat+10;
}



$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);


echo "&login=$l";
echo "&cash=$row[3]";
echo "&bar1=$bar1";
echo "&bar2=$bar2";
echo "&bar3=$bar3";
echo "&win=$win";
echo "&bet=$bet";
echo "&spins=1";
}



?>