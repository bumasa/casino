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
$rndd=rand(1,6);



if ($karta==1){
if($rndd==5 or $rndd==6){
$win=$bet*2;
}
}

if ($karta==2){
if($rndd==3 or $rndd==4){
$win=$bet*2;
}
}

if ($karta==3){
if($rndd==1 or $rndd==2){
$win=$bet*2;
}
}



$resultb=mysql_query("select * from game_bank where name='ttuz'");
$rowb=mysql_fetch_array($resultb);


$bank = $rowb[1];
$proc = $rowb[2];
$caswin = $bank/100*$proc;

// Проверяем можем ли заплатить если нет то облом .

if ($win>=$caswin) { 
$win=0; 
if ($karta==1){ $rndd=3; }
if ($karta==2){ $rndd=1; }
if ($karta==3){ $rndd=3; }
}


if ($win>0){
mysql_query("update users set cash=cash+'$win' where login='$l'");
mysql_query("update game_bank set bank=bank-'$win' where name='ttuz'");
}

$date=date("d.m.y");
$time=date("H:i:s");
$sqls="INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[3]','$bet','$win','3 Туза')";
mysql_query($sqls);


if ($rndd==1){ $kart1=2; $kart2=3; $kart3=1; }
if ($rndd==2){ $kart1=3; $kart2=2; $kart3=1; }
if ($rndd==3){ $kart1=2; $kart2=1; $kart3=3; }
if ($rndd==4){ $kart1=3; $kart2=1; $kart3=2; }
if ($rndd==5){ $kart1=1; $kart2=2; $kart3=3; }
if ($rndd==6){ $kart1=1; $kart2=3; $kart3=2; }


$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);


echo "&login=$l";
echo "&cash=$row[3]";
echo "&kart1=$kart1";
echo "&kart2=$kart2";
echo "&kart3=$kart3";
echo "&win=$win";
}



?>