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

if ($cash < 0){$cash=0;}
if ($bet<>0.2 && $bet<>1 && $bet<>5 && $bet<>10 && $bet<>50){ $bet="0.20"; $mon=0;}





// Первый запуск
if ($mon==0 or $mon==""){
echo "&sp=1";
echo "&login=$l";
echo "&cash=$row[3]";
}

// 1- rusalka
// 2- zvezda
// 3- krab
// 4= chaika
// 5- jakor
// 6- rakushka
// 7- delfin



if ($mon==1 && $row[3]>=$bet){
$win=0;

mysql_query("update users set cash=cash-'$bet' where login='$l'");
mysql_query("update game_bank set bank=bank+'$bet' where name='ttuz'");

// Запускаем генератор (временный)
srand ((double) microtime()*1000000);
$sim1=rand(1,7);
$sim2=rand(1,7);
$sim3=rand(1,7);


if ($sim1==1 && $sim2==1 && $sim3==1){ $win=$bet*200; }
if ($sim1==7 && $sim2==7 && $sim3==7){ $win=$bet*150; }
if ($sim1==4 && $sim2==4 && $sim3==4){ $win=$bet*100; }
if ($sim1==5 && $sim2==5 && $sim3==5){ $win=$bet*50; }
if ($sim1==3 && $sim2==2 && $sim3==3){ $win=$bet*25; }
if ($sim1==6 or $sim3==6){ $win=$bet*2;}
if ($sim1==6 && $sim2==6 || $sim2==6 && $sim3==6){ $win=$bet*5;}

// Проверяем можем ли заплатить если нет то облом

$resultb=mysql_query("select * from game_bank where name='ttuz'");
$rowb=mysql_fetch_array($resultb);
$bank = $rowb[1];
$proc = $rowb[2];
$caswin = $bank/100*$proc;
if ($win>=$caswin) { 
$win=0;
srand ((double) microtime()*1000000);
$sim1=rand(1,5);
$sim2=rand(1,5);
$sim3=rand(2,4);
}
////////////////

if ($win>0){
mysql_query("update users set cash=cash+'$win' where login='$l'");
mysql_query("update game_bank set bank=bank-'$win' where name='ttuz'");
}

$date=date("d.m.y");
$time=date("H:i:s");
$sqls="INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[3]','$bet','$win','Fruit Fiesta')";
mysql_query($sqls);

for ($i = 1; $i<=300000; $i++)
{
$marat=$marat+10;
}



$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);


echo "&login=$l";
echo "&cash=$row[3]";
echo "&sim1=$sim1";
echo "&sim2=$sim2";
echo "&sim3=$sim3";
echo "&win=$win";
echo "&bet=$bet";
echo "&spins=1";
echo "&sp=1";
}



?>