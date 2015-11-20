<?
error_reporting(0);
unset($l); 
session_start();
session_register($l);
if(!isset($l)){ 
header("Location: ../../login.php"); 
exit; 
}
foreach ($_POST as $var => $value) 
{
if ($var=="amp;bet"){$bet=$value;}
if ($var=="amp;s"){$s=$value;}
}
if ($bet<>1 && $bet<>2 && $bet<>3){ $bet=1;}
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
if ($s==0){
$cash=$row[3];
$cash = $cash/100*100;
$max_bet=3;
if ($cash < 1){$max_bet=0;}
echo"
<root>
<status>ok</status>
<md5_random_key></md5_random_key>
<credits>$cash</credits>
<max_bet>$max_bet</max_bet>
<jackpot></jackpot>
<credits_real></credits_real>
<credits_demo></credits_demo>
</root>
";
}
if ($s==1 && $row[3]>=1 ){
mysql_query("update users set cash=cash-'$bet' where login='$l'");
mysql_query("update game_bank set bank=bank+'$bet' where name='ttuz'");
$r4=rand(1,2);
$r1=rand($r4,5); 
$r2=rand($r4,5);
$r3=rand($r4,5);
$wc=0;
$win=0;
if ($r1==1 || $r3==1 ){ $win=$bet*2; $wc=1;}
if ($r1==1 && $r2==1 || $r2==1 && $r3==1 || $r1==1 && $r3==1){ $win=$bet*5; $wc=2;}
if ($r1==1 && $r2==1 && $r3==1){ $win=$bet*160; $wc=7;}
if ($r1==5 && $r2==1 && $r3==2){ $win=$bet*10; $wc=3;}
if ($r1==2 && $r2==2 && $r3==2){ $win=$bet*20; $wc=4;}
if ($r1==3 && $r2==3 && $r3==3){ $win=$bet*40; $wc=5;}
if ($r1==4 && $r2==4 && $r3==4){ $win=$bet*80; $wc=6;}
if ($r1==5 && $r2==5 && $r3==5){ $win=$bet*1000; $wc=8;}
if ($r1==5 && $r2==5 && $r3==5 && $bet==3){ $win=5000; $wc=8;}
$resultb=mysql_query("select * from game_bank where name='ttuz'");
$rowb=mysql_fetch_array($resultb);
$bank = $rowb[1];
$proc = $rowb[2];
$caswin = $bank/100*$proc;
if ($win>=$caswin) { 
$win=0;
$wc=0;
$lor=rand(1,12);
if ($lor==1){ $r1=2; $r2=3; $r3=5;}
if ($lor==2){ $r1=2; $r2=1; $r3=5;}
if ($lor==3){ $r1=3; $r2=5; $r3=2;}
if ($lor==4){ $r1=5; $r2=5; $r3=2;}
if ($lor==5){ $r1=5; $r2=1; $r3=2;}
if ($lor==6){ $r1=4; $r2=5; $r3=5;}
if ($lor==7){ $r1=5; $r2=4; $r3=4;}
if ($lor==8){ $r1=5; $r2=1; $r3=4;}
if ($lor==9){ $r1=4; $r2=5; $r3=3;}
if ($lor==10){ $r1=3; $r2=5; $r3=5;}
if ($lor==11){ $r1=3; $r2=1; $r3=5;}
if ($lor==12){ $r1=5; $r2=2; $r3=2;}
}
if ($win>0){
mysql_query("update users set cash=cash+'$win' where login='$l'");
mysql_query("update game_bank set bank=bank-'$win' where name='ttuz'");
}
$date=date("d.m.y"); $time=date("H:i:s");
$sqls="INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[3]','$bet','$win','Fruit Fiesta')";
mysql_query($sqls);
$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);
$cash= $row[3]*100/100;
$max_bet=3;
if ($cash < 3){$max_bet=2;}
if ($cash < 2){$max_bet=1;}
if ($cash < 1){$max_bet=0;}
echo"
<root>
<status>ok</status>
<md5_random_key></md5_random_key>
<item1>$r1</item1>
<item2>$r2</item2>
<item3>$r3</item3>
<win>$win</win>
<credits>$cash</credits>
<max_bet>$max_bet</max_bet>
<wc>$wc</wc>
<credits_real></credits_real>
<credits_demo></credits_demo>
</root>
";
}
?>