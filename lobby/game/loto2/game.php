<?
//
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

$bet=2; // на потом
if ($bet<>2){ $bet=2;}
$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);
if ($mon==0 or $mon==""){
echo "&cash_new=$row[3]";
}
if ($mon==1 && $row[3]>=2){
$win=0;

mysql_query("update users set cash=cash-'$bet' where login='$l'");
mysql_query("update game_bank set bank=bank+'$bet' where name='ttuz'");

// «апускаем генератор (временный)
srand ((double) microtime()*1000000);
$rr1=rand(0,5);
$rr2=rand(0,5);
$rr3=rand(0,5);
$rr4=rand(1,3);
$r1=array(2,10,50,100,200,1000);
$dig1=$r1[$rr1];
$dig2=$r1[$rr2];
$dig3=$r1[$rr3];
if ($rr4==2){ $rr1=0; $rr2=0; $rr3=0; $dig1=$r1[0]; $dig2=$r1[0]; $dig3=$r1[0];}
if ($rr1==0 && $rr2==0 && $rr3==0){ $win=2; }
if ($rr1==1 && $rr2==1 && $rr3==1){ $win=10; }
if ($rr1==2 && $rr2==2 && $rr3==2){ $win=50; }
if ($rr1==3 && $rr2==3 && $rr3==3){ $win=100; }
if ($rr1==4 && $rr2==4 && $rr3==4){ $win=200; }
if ($rr1==5 && $rr2==5 && $rr3==5){ $win=1000; }
$resultb=mysql_query("select * from game_bank where name='ttuz'");
$rowb=mysql_fetch_array($resultb);
$bank = $rowb[1];
$proc = $rowb[2];
$caswin = $bank/100*$proc;
if ($win>=$caswin) { 
$win=0;
$maxx=5;
$maxn=3;
$x=array();
$tmp=array();
for ($i=0; $i<$maxn; $i++) {
do {
$a=rand(0,$maxx);
} while(isset($tmp[$a]));
$tmp[$a]=1;
$x[]=$a;
}
unset($tmp);
$c1=$x[0];
$c2=$x[1];
$c3=$x[2];
$dig1=$r1[$c1];
$dig2=$r1[$c2];
$dig3=$r1[$c3];
}
////////////////

if ($win>0){
mysql_query("update users set cash=cash+'$win' where login='$l'");
mysql_query("update game_bank set bank=bank-'$win' where name='ttuz'");
}

$date=date("d.m.y"); $time=date("H:i:s");
$sqls="INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[3]','$bet','$win','Scratch')";
mysql_query($sqls);
$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);
echo "&cash_new2=$row[3]";
echo "&dig1=$dig1";
echo "&dig2=$dig2";
echo "&dig3=$dig3";
echo "&win=$win";
}
?>