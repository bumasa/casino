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
 
 if ($row[3] < 0){$credit=0;}
 if ($bet<>1){ $bet=1;}
 
 if ($row[3]<$bet){
 echo "&error=Insufficient funds!";
 exit;
 }
 
 
 
 $win=0;
 
 mysql_query("update users set cash=cash-'$bet' where login='$l'");
 mysql_query("update game_bank set bank=bank+'$bet' where name='ttuz'");
 if ($l!="guestlogin"){
 	$money_to_bank = $bet/100*$bank_percent;
 	$money_to_profit = $bet/100*$profit_percent;
 	
 	mysql_query("update jsgamingcenter_bank set amount=amount+'$money_to_bank' where name='default'", $casdb);
 	mysql_query("update jsgamingcenter_profitpurse set currentprofit=currentprofit+'$money_to_profit'", $casdb);
 }
 
 srand ((double) microtime()*1000000);
 $field1=rand(1,9);
 $field2=rand(1,9);
 $field3=rand(1,9);
 $field4=rand(1,9);
 
 if ($field1==0 && $field2==0 && $field3==0 && $field4==0){ $win=2000; }
 if ($field1==0 && $field2==0 && $field3==0){ $win=2000; }
 if ($field1==0 && $field2==0 && $field4==0){ $win=2000; }
 if ($field2==0 && $field1==0 && $field3==0){ $win=2000; }
 if ($field2==0 && $field1==0 && $field4==0){ $win=2000; }
 if ($field3==0 && $field4==0 && $field2==0){ $win=2000; }
 if ($field3==0 && $field1==0 && $field4==0){ $win=2000; }
 
 if ($field1==1 && $field2==1 && $field3==1 && $field4==1){ $win=500; }
 if ($field1==1 && $field2==1 && $field3==1){ $win=500; }
 if ($field1==1 && $field2==1 && $field4==1){ $win=500; }
 if ($field2==1 && $field1==1 && $field3==1){ $win=500; }
 if ($field2==1 && $field1==1 && $field4==1){ $win=500; }
 if ($field3==1 && $field4==1 && $field2==1){ $win=500; }
 if ($field3==1 && $field1==1 && $field4==1){ $win=500; }
 
 if ($field1==2 && $field2==2 && $field3==2 && $field4==2){ $win=250; }
 if ($field1==2 && $field2==2 && $field3==2){ $win=250; }
 if ($field1==2 && $field2==2 && $field4==2){ $win=250; }
 if ($field2==2 && $field1==2 && $field3==2){ $win=250; }
 if ($field2==2 && $field1==2 && $field4==2){ $win=250; }
 if ($field3==2 && $field4==2 && $field2==2){ $win=250; }
 if ($field3==2 && $field1==2 && $field4==2){ $win=250; }
 
 if ($field1==3 && $field2==3 && $field3==3 && $field4==3){ $win=100; }
 if ($field1==3 && $field2==3 && $field3==3){ $win=100; }
 if ($field1==3 && $field2==3 && $field4==3){ $win=100; }
 if ($field2==3 && $field1==3 && $field3==3){ $win=100; }
 if ($field2==3 && $field1==3 && $field4==3){ $win=100; }
 if ($field3==3 && $field4==3 && $field2==3){ $win=100; }
 if ($field3==3 && $field1==3 && $field4==3){ $win=100; }
 
 if ($field1==4 && $field2==4 && $field3==4 && $field4==4){ $win=50; }
 if ($field1==4 && $field2==4 && $field3==4){ $win=50; }
 if ($field1==4 && $field2==4 && $field4==4){ $win=50; }
 if ($field2==4 && $field1==4 && $field3==4){ $win=50; }
 if ($field2==4 && $field1==4 && $field4==4){ $win=50; }
 if ($field3==4 && $field4==4 && $field2==4){ $win=50; }
 if ($field3==4 && $field1==4 && $field4==4){ $win=50; }
 
 if ($field1==5 && $field2==5 && $field3==5 && $field4==5){ $win=25; }
 if ($field1==5 && $field2==5 && $field3==5){ $win=25; }
 if ($field1==5 && $field2==5 && $field4==5){ $win=25; }
 if ($field2==5 && $field1==5 && $field3==5){ $win=25; }
 if ($field2==5 && $field1==5 && $field4==5){ $win=25; }
 if ($field3==5 && $field4==5 && $field2==5){ $win=25; }
 if ($field3==5 && $field1==5 && $field4==5){ $win=25; }
 
 if ($field1==6 && $field2==6 && $field3==6 && $field4==6){ $win=15; }
 if ($field1==6 && $field2==6 && $field3==6){ $win=15; }
 if ($field1==6 && $field2==6 && $field4==6){ $win=15; }
 if ($field2==6 && $field1==6 && $field3==6){ $win=15; }
 if ($field2==6 && $field1==6 && $field4==6){ $win=15; }
 if ($field3==6 && $field4==6 && $field2==6){ $win=15; }
 if ($field3==6 && $field1==6 && $field4==6){ $win=15; }
 
 if ($field1==7 && $field2==7 && $field3==7 && $field4==7){ $win=10; }
 if ($field1==7 && $field2==7 && $field3==7){ $win=10; }
 if ($field1==7 && $field2==7 && $field4==7){ $win=10; }
 if ($field2==7 && $field1==7 && $field3==7){ $win=10; }
 if ($field2==7 && $field1==7 && $field4==7){ $win=10; }
 if ($field3==7 && $field4==7 && $field2==7){ $win=10; }
 if ($field3==7 && $field1==7 && $field4==7){ $win=10; }
 
 if ($field1==8 && $field2==8 && $field3==8 && $field4==8){ $win=5; }
 if ($field1==8 && $field2==8 && $field3==8){ $win=5; }
 if ($field1==8 && $field2==8 && $field4==8){ $win=5; }
 if ($field2==8 && $field1==8 && $field3==8){ $win=5; }
 if ($field2==8 && $field1==8 && $field4==8){ $win=5; }
 if ($field3==8 && $field4==8 && $field2==8){ $win=5; }
 if ($field3==8 && $field1==8 && $field4==8){ $win=5; }
 
 if ($field1==9 && $field2==9 && $field3==9 && $field4==9){ $win=1; }
 if ($field1==9 && $field2==9 && $field3==9){ $win=1; }
 if ($field1==9 && $field2==9 && $field4==9){ $win=1; }
 if ($field2==9 && $field1==9 && $field3==9){ $win=1; }
 if ($field2==9 && $field1==9 && $field4==9){ $win=1; }
 if ($field3==9 && $field4==9 && $field2==9){ $win=1; }
 if ($field3==9 && $field1==9 && $field4==9){ $win=1; }
 
 // If Bank does not have enough money, don't make a payout //
 
 $resultb=mysql_query("select * from game_bank where name='ttuz'");
 $rowb=mysql_fetch_array($resultb);
 $bank = $rowb[1];
 $proc = $rowb[2];
 $caswin = $bank/100*$proc;
 if ($win>=$caswin) { 
 $win=0;
 srand ((double) microtime()*1000000);
 $field1=rand(1,3);
 $field2=rand(2,3);
 $field3=rand(4,5);
 $field4=rand(5,9);
 }
 
 
 $date=date("d.m.y");
 $time=date("H:i:s");
 
 if ($win>0){
 mysql_query("update users set cash=cash+'$win' where login='$l'");
mysql_query("update game_bank set bank=bank-'$win' where name='ttuz'");
 if ($l!="guestlogin"){
 mysql_query("update jsgamingcenter_bank set amount=amount-'$win' where name='default'");
 }
 $sqls="INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[3]','$bet','$win','LOVE STORE')";
 	mysql_query($sqls);
 }
 
 if ($win==0){
 	$sqls="INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[3]','$bet','$win','LOVE STORE')";
 	mysql_query($sqls);
 
 
$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);
 
 echo "&error=0";
 echo "&credit=$row[3]";
 echo "&win=$win";
 echo "&Res1=$field1";
 echo "&Res2=$field2";
 echo "&Res3=$field3";
 echo "&Res4=$field4";
 echo "&help=../../love_story.php";
 echo "&bank=../../in.php";
 echo "&casino=../../index.php";
 echo "&game_records=";
 
 
 
 }
 
 
 ?>