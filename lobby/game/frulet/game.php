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

if ($mon==0){
$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);

$resultg=mysql_query("select * from game_bank where name='ttuz'");
$rog=mysql_fetch_array($resultg);


echo "&login=$l";
echo "&cash=$row[3]";
echo "&wmz=$rog[bank]";
}


if ($mon==1){
$resultb=mysql_query("select * from game_bank where name='ttuz'");
$rowb=mysql_fetch_array($resultb);
$proc = $rowb[2];
$vbank = $bet/100*$proc;
$mne = $bet/100*(100-$proc);

mysql_query("update users set cash=cash-'$bet' where login='$l'");
mysql_query("update game_bank set bank=bank+'$vbank' where name='ttuz'");
mysql_query("update game_bank set wmrmin=wmrmin+'$mne' where name='ttuz'");
}

if ($mon==2){
mysql_query("update users set cash=cash+'$win' where login='$l'");
mysql_query("update game_bank set bank=bank-'$win' where name='ttuz'");
}

if ($mon==2){
mysql_query("update users set cash=cash+'$bet' where login='$l'");
mysql_query("update game_bank set bank=bank-'$bet' where name='ttuz'");
}


$date=date("d.m.y");
$time=date("H:i:s");
$sqls="INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[11]','$bet','$win','Rulette')";
mysql_query($sqls);

for ($i = 1; $i<=500000; $i++)
{
$marat=$marat+10;
}


?>