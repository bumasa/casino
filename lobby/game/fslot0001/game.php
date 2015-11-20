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

if ($bet<>0.2 && $bet<>1 && $bet<>5 && $bet<>10 && $bet<>50){ $bet=0;}

$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);

if ($mon==0 or $mon==""){
echo "&sp=1";
echo "&login=$l";
echo "&cash=$row[3]";
}

if ($mon==1 && $row[3]>=$bet){
$win=0;

$mx=array(1,2,3,6,7,8);

// 7 - lucky
// 3 - стату€
// 2 - семерки
// 6 - колокол
// 8 - 2 бар
// 1 - 1 бар
// 9 - вишн€
// ниже в массииве задаетс€ количесвто символов дл€ выборки
// проще говор€ на каждый символ может выпасть по 3 раза подр€д
// если не хотите чтоб комбинаци€ выпадала сделайте по 2 цифры 
// обозначени€ см. выше
// если хотите чтоб кака€-то комбинаци€ выпадала чаще,
// добавьте число соотвсествующее символу.
// сейчас стоит обычный режим, комбинации выпадают честно
// если убрать по одной цифре то не будет выпадать ничего независимо от банка

$mx2=array(1,1,1,2,2,2,3,3,3,6,6,6,7,7,7,8,8,8,9,9,9);



mysql_query("update users set cash=cash-'$bet' where login='$l'");
mysql_query("update game_bank set bank=bank+'$bet' where name='ttuz'");


shuffle($mx2);$sim1=$mx2[0];$sim2=$mx2[1];$sim3=$mx2[2];

if ($sim1==7 && $sim2==7 && $sim3==7){ $win=$bet*200;}
if ($sim1==3 && $sim2==3 && $sim3==3){ $win=$bet*150;}
if ($sim1==2 && $sim2==2 && $sim3==2){ $win=$bet*100;}
if ($sim1==6 && $sim2==6 && $sim3==6){ $win=$bet*50;}
if ($sim1==8 && $sim2==8 && $sim3==8){ $win=$bet*25;}
if ($sim1==1 && $sim2==1 && $sim3==1){ $win=$bet*5;}
if ($sim1==9 or $sim2==9 or $sim3==9){ $win=$bet*2;}

$resultb=mysql_query("select * from game_bank where name='ttuz'");
$rowb=mysql_fetch_array($resultb);
$bank = $rowb[1];
$proc = $rowb[2];
$caswin = $bank/100*$proc;
if ($win>=$caswin) {
$win=0;
shuffle($mx);$sim1=$mx[0];$sim2=$mx[1];$sim3=$mx[2];
}

////////////////
if ($win>0){
mysql_query("update users set cash=cash+'$win' where login='$l'");
mysql_query("update game_bank set bank=bank-'$win' where name='ttuz'");
}
$date=date("d.m.y");
$time=date("H:i:s");
$sqls="INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[3]','$bet','$win','Lucky Star')";
mysql_query($sqls);

$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);

echo "&cash=$row[3]&sim1=$sim1&sim2=$sim2&sim3=$sim3&win=$win&bet=$bet&spins=1&sp=1";
}
?>