<?
// www.casinosoft.biz
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
if ($bet<>0.2 && $bet<>1 && $bet<>5 && $bet<>10 && $bet<>50){ $bet=0.2;}
$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);
if ($row[3] < 0.2){ $mon=0;}
if ($mon==0 or $mon==""){
echo "&cash=$row[3]";
echo "&win=0";
}
if ($mon==1){
$win=0;
mysql_query("update users set cash=cash-'$bet' where login='$l'");
mysql_query("update game_bank set bank=bank+'$bet' where name='ttuz'");
list($chh1,$chh2,$chh3,$chh4,$chh5,$chh6)=explode(",", $masvet);
$maxx=36;
$maxn=5;
$x=array();
$tmp=array();
for ($i=0; $i<$maxn; $i++) {
do {
$a=rand(1,$maxx);
} while(isset($tmp[$a]));
$tmp[$a]=1;
$x[]=$a;
}
unset($tmp);
$new_ch1=$x[0];
$new_ch2=$x[1];
$new_ch3=$x[2];
$new_ch4=$x[3];
$new_ch5=$x[4];
$pn = array (
	"0" => "$chh1",
	"1" => "$chh2",
	"2" => "$chh3",
	"3" => "$chh4",
	"4" => "$chh5");

$kn = array (
	"0" => "$new_ch1",
	"1" => "$new_ch2",
	"2" => "$new_ch3",
	"3" => "$new_ch4",
	"4" => "$new_ch5");
$tpn0=0;$tpn1=0;$tpn2=0;$tpn3=0;$tpn4=0;
$i = 0;
$points = 0;
while ($i < 5) {
if (in_array($kn[$i],$pn))
{
$points++;
${"tpn".$i}=1;
}
$i++;
}
if ($points==1) {$win=$bet*1;}
if ($points==2) {$win=$bet*2;}
if ($points==3) {$win=$bet*10;}
if ($points==4) {$win=$bet*100;}
if ($points==5) {$win=$bet*500;}
$ch1=$new_ch1;
$ch2=$new_ch2;
$ch3=$new_ch3;
$ch4=$new_ch4;
$ch5=$new_ch5;
$resultb=mysql_query("select * from game_bank where name='ttuz'");
$rowb=mysql_fetch_array($resultb);
$bank = $rowb[1];
$proc = $rowb[2];
$caswin = $bank/100*$proc;
if ($win>=$caswin) { 
$win=0;
$mx=array();
for ($mi=1; $mi<35; $mi++) {
if ($mi<>$chh1 && $mi<>$chh2 && $mi<>$chh3 && $mi<>$chh4 && $mi<>$chh5){
$mx[]=$mi;
}
}
shuffle($mx);
$ch1=$mx[0];
$ch2=$mx[1];
$ch3=$mx[2];
$ch4=$mx[3];
$ch5=$mx[4];
}
if ($win>0){
mysql_query("update users set cash=cash+'$win' where login='$l'");
mysql_query("update game_bank set bank=bank-'$win' where name='ttuz'");
}
$date=date("d.m.y"); $time=date("H:i:s");
$sqls="INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[3]','$bet','$win','5 из 36')";
mysql_query($sqls);
$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);
echo "&cash_new=$row[3]";
echo "&ch1=$ch1";
echo "&ch2=$ch2";
echo "&ch3=$ch3";
echo "&ch4=$ch4";
echo "&ch5=$ch5";
echo "&vch1=$tpn0";
echo "&vch2=$tpn1";
echo "&vch3=$tpn2";
echo "&vch4=$tpn3";
echo "&vch5=$tpn4";
echo "&win_new=$win";
echo "&spin=1";
}
?>