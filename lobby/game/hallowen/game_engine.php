<?
error_reporting(0);
unset($l); 
session_start();
session_register($l);
if(!isset($l)){ 
header("Location: ../../login.php"); 
echo "&error=1";
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

$coin_value=1; // COIN VALUE SELECT
 
 if ($row[3] < 0){$credit=0;}
 if ($coins<>1 && $coins<>2 && $coins<>3){ $coins=1;}
 $bet=$coin_value*$coins;
 
 if ($row[3]<$bet){
 echo "&error=Insufficient funds!";
 exit;
 }
 
 
 
$win=0;

mysql_query("update users set cash=cash-'$bet' where login='$l'");
if ($l!="guestlogin"){
	$money_to_bank = $bet/100*$bank_percent;
	$money_to_profit = $bet/100*$profit_percent;
	
	mysql_query("update game_bank set bank=bank+'$money_to_bank' where name='ttuz'");
	mysql_query("update whitelabelcas_profitpurse set currentprofit=currentprofit+'$money_to_profit'", $casdb);
}
 
 srand((float) microtime() * 10000000);
 $input_1 = array(0,3,4,5,2,7,17,8,9,10,11,13,14,5,15,4,4,4,17,18,19,21,22,13,23);
 $rand_keys_1 = array_rand($input_1);
 $wheel1Pos=$input_1[$rand_keys_1];
 
 srand((float) microtime() * 10000000);
 $input_2 = array(0,3,4,2,1,7,5,8,5,10,11,9,14,1,3,5,4,4,4,18,3,1,22,9,19);
 $rand_keys_2 = array_rand($input_2);
 $wheel2Pos=$input_2[$rand_keys_2];
 
 srand((float) microtime() * 10000000);
 $input_3 = array(0,1,4,2,15,9,11,8,3,10,1,3,14,21,13,4,4,4,11,18,13,21,22,7,17);
 $rand_keys_3 = array_rand($input_3);
 $wheel3Pos=$input_3[$rand_keys_3];
 
 if ($coins==1)
 {
 if (($wheel1Pos==3 or $wheel1Pos==7 or $wheel1Pos==11 or $wheel1Pos==15 or $wheel1Pos==19 or $wheel1Pos==9 or $wheel1Pos==17 or $wheel1Pos==5 or $wheel1Pos==21) && ($wheel2Pos==5 or $wheel2Pos==13 or $wheel2Pos==3 or $wheel2Pos==7 or $wheel2Pos==11 or $wheel2Pos==15 or $wheel2Pos==21 or $wheel2Pos==23 or $wheel2Pos==24 or $wheel2Pos==1) && ($wheel3Pos==1 or $wheel3Pos==5 or $wheel3Pos==9 or $wheel3Pos==13 or $wheel3Pos==19 or $wheel3Pos==9 or $wheel3Pos==15 or $wheel3Pos==21 or $wheel3Pos==11 or $wheel3Pos==3)){ $coin_win=10; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three times any Teddy, Eisenbahn or Trommel
 
 if (($wheel1Pos==3 or $wheel1Pos==7 or $wheel1Pos==11 or $wheel1Pos==15 or $wheel1Pos==19) && ($wheel2Pos==3 or $wheel2Pos==7 or $wheel2Pos==11 or $wheel2Pos==15 or $wheel2Pos==21) && ($wheel3Pos==1 or $wheel3Pos==5 or $wheel3Pos==9 or $wheel3Pos==13 or $wheel3Pos==19)){ $coin_win=20; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three times Trommel
 
 if (($wheel1Pos==9 or $wheel1Pos==17) && ($wheel2Pos==5 or $wheel2Pos==13) && ($wheel3Pos==3 or $wheel3Pos==11)){ $coin_win=80; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three times Teddy
 
 if (($wheel1Pos==5 or $wheel1Pos==21) && ($wheel2Pos==23 or $wheel2Pos==24) && ($wheel3Pos==15 or $wheel3Pos==21)){ $coin_win=50; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three times Eisenbahn
 
 if (($wheel1Pos==13) && ($wheel2Pos==9) && ($wheel3Pos==7)){ $coin_win=150; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three times Teddy Girl
 
 if (($wheel1Pos==1 or $wheel1Pos==23 or $wheel1Pos==24) or ($wheel2Pos==19) or ($wheel3Pos==17)){ $coin_win=2; $ligne1=1; $ligne2=1; $ligne3=1; }  // If one TF Logo in any row
 
 if (($wheel1Pos==1 or $wheel1Pos==23 or $wheel1Pos==24) && ($wheel2Pos==19)){ $coin_win=5; $ligne1=1; $ligne2=1; $ligne3=0; }  // If two TF Logos in first two rows
 
 if (($wheel3Pos==17) && ($wheel2Pos==19)){ $coin_win=5; $ligne1=0; $ligne2=1; $ligne3=1; }  // If two TF Logos in last two rows
 
 if (($wheel3Pos==17) && ($wheel1Pos==1 or $wheel1Pos==23 or $wheel1Pos==24)){ $coin_win=5; $ligne1=1; $ligne2=0; $ligne3=1; }  // If two TF Logos in side rows
 
 if (($wheel3Pos==17) && ($wheel1Pos==1 or $wheel1Pos==23 or $wheel1Pos==24) && ($wheel2Pos==19)){ $coin_win=250; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three TF logos in one row
 }
 
 if ($coins==2)
 {
 if (($wheel1Pos==3 or $wheel1Pos==7 or $wheel1Pos==11 or $wheel1Pos==15 or $wheel1Pos==19 or $wheel1Pos==9 or $wheel1Pos==17 or $wheel1Pos==5 or $wheel1Pos==21) && ($wheel2Pos==5 or $wheel2Pos==13 or $wheel2Pos==3 or $wheel2Pos==7 or $wheel2Pos==11 or $wheel2Pos==15 or $wheel2Pos==21 or $wheel2Pos==23 or $wheel2Pos==24 or $wheel2Pos==1) && ($wheel3Pos==1 or $wheel3Pos==5 or $wheel3Pos==9 or $wheel3Pos==13 or $wheel3Pos==19 or $wheel3Pos==9 or $wheel3Pos==15 or $wheel3Pos==21 or $wheel3Pos==11 or $wheel3Pos==3)){ $coin_win=20; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three times any Teddy, Eisenbahn or Trommel
 
 if (($wheel1Pos==3 or $wheel1Pos==7 or $wheel1Pos==11 or $wheel1Pos==15 or $wheel1Pos==19) && ($wheel2Pos==3 or $wheel2Pos==7 or $wheel2Pos==11 or $wheel2Pos==15 or $wheel2Pos==21) && ($wheel3Pos==1 or $wheel3Pos==5 or $wheel3Pos==9 or $wheel3Pos==13 or $wheel3Pos==19)){ $coin_win=40; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three times Trommel
 
 if (($wheel1Pos==9 or $wheel1Pos==17) && ($wheel2Pos==5 or $wheel2Pos==13) && ($wheel3Pos==3 or $wheel3Pos==11)){ $coin_win=160; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three times Teddy
 
 if (($wheel1Pos==5 or $wheel1Pos==21) && ($wheel2Pos==23 or $wheel2Pos==24) && ($wheel3Pos==15 or $wheel3Pos==21)){ $coin_win=100; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three times Eisenbahn
 
 if (($wheel1Pos==13) && ($wheel2Pos==9) && ($wheel3Pos==7)){ $coin_win=300; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three times Teddy Girl
 
 if (($wheel1Pos==1 or $wheel1Pos==23 or $wheel1Pos==24) or ($wheel2Pos==19) or ($wheel3Pos==17)){ $coin_win=4; $ligne1=1; $ligne2=1; $ligne3=1; }  // If one TF Logo in any row
 
 if (($wheel1Pos==1 or $wheel1Pos==23 or $wheel1Pos==24) && ($wheel2Pos==19)){ $coin_win=10; $ligne1=1; $ligne2=1; $ligne3=0; }  // If two TF Logos in first two rows
 
 if (($wheel3Pos==17) && ($wheel2Pos==19)){ $coin_win=10; $ligne1=0; $ligne2=1; $ligne3=1; }  // If two TF Logos in last two rows
 
 if (($wheel3Pos==17) && ($wheel1Pos==1 or $wheel1Pos==23 or $wheel1Pos==24)){ $coin_win=10; $ligne1=1; $ligne2=0; $ligne3=1; }  // If two TF Logos in side rows
 
 if (($wheel3Pos==17) && ($wheel1Pos==1 or $wheel1Pos==23 or $wheel1Pos==24) && ($wheel2Pos==19)){ $coin_win=500; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three TF logos in one row
 }
 
 if ($coins==3)
 {
 if (($wheel1Pos==3 or $wheel1Pos==7 or $wheel1Pos==11 or $wheel1Pos==15 or $wheel1Pos==19 or $wheel1Pos==9 or $wheel1Pos==17 or $wheel1Pos==5 or $wheel1Pos==21) && ($wheel2Pos==5 or $wheel2Pos==13 or $wheel2Pos==3 or $wheel2Pos==7 or $wheel2Pos==11 or $wheel2Pos==15 or $wheel2Pos==21 or $wheel2Pos==23 or $wheel2Pos==24 or $wheel2Pos==1) && ($wheel3Pos==1 or $wheel3Pos==5 or $wheel3Pos==9 or $wheel3Pos==13 or $wheel3Pos==19 or $wheel3Pos==9 or $wheel3Pos==15 or $wheel3Pos==21 or $wheel3Pos==11 or $wheel3Pos==3)){ $coin_win=30; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three times any Teddy, Eisenbahn or Trommel
 
 if (($wheel1Pos==3 or $wheel1Pos==7 or $wheel1Pos==11 or $wheel1Pos==15 or $wheel1Pos==19) && ($wheel2Pos==3 or $wheel2Pos==7 or $wheel2Pos==11 or $wheel2Pos==15 or $wheel2Pos==21) && ($wheel3Pos==1 or $wheel3Pos==5 or $wheel3Pos==9 or $wheel3Pos==13 or $wheel3Pos==19)){ $coin_win=60; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three times Trommel
 
 if (($wheel1Pos==9 or $wheel1Pos==17) && ($wheel2Pos==5 or $wheel2Pos==13) && ($wheel3Pos==3 or $wheel3Pos==11)){ $coin_win=240; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three times Teddy
 
 if (($wheel1Pos==5 or $wheel1Pos==21) && ($wheel2Pos==23 or $wheel2Pos==24) && ($wheel3Pos==15 or $wheel3Pos==21)){ $coin_win=150; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three times Eisenbahn
 
 if (($wheel1Pos==13) && ($wheel2Pos==9) && ($wheel3Pos==7)){ $coin_win=450; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three times Teddy Girl
 
 if (($wheel1Pos==1 or $wheel1Pos==23 or $wheel1Pos==24) or ($wheel2Pos==19) or ($wheel3Pos==17)){ $coin_win=6; $ligne1=1; $ligne2=1; $ligne3=1; }  // If one TF Logo in any row
 
 if (($wheel1Pos==1 or $wheel1Pos==23 or $wheel1Pos==24) && ($wheel2Pos==19)){ $coin_win=15; $ligne1=1; $ligne2=1; $ligne3=0; }  // If two TF Logos in first two rows
 
 if (($wheel3Pos==17) && ($wheel2Pos==19)){ $coin_win=15; $ligne1=0; $ligne2=1; $ligne3=1; }  // If two TF Logos in last two rows
 
 if (($wheel3Pos==17) && ($wheel1Pos==1 or $wheel1Pos==23 or $wheel1Pos==24)){ $coin_win=15; $ligne1=1; $ligne2=0; $ligne3=1; }  // If two TF Logos in side rows
 
 if (($wheel3Pos==17) && ($wheel1Pos==1 or $wheel1Pos==23 or $wheel1Pos==24) && ($wheel2Pos==19)){ $coin_win=1000; $ligne1=1; $ligne2=1; $ligne3=1; }  // If three TF logos in one row
 }
 
 
 
 $win=$coin_value*$coin_win; // Define Win in real money
 
 
 // If Bank does not have enough money, don't make a payout //
 
$resultb=mysql_query("select * from game_bank where name='ttuz'");
$rowb=mysql_fetch_array($resultb);
 $bank = $rowb[1];
 $proc = $rowb[2];
 $caswin = $bank/100*$proc;
 if ($win>=$caswin) { 
 $win=0;
 $coin_win=0;
 $ligne1=0; $ligne2=0; $ligne3=0;
 
 srand((float) microtime() * 10000000);
 $input_1 = array(13,0,2,4,8,9,17);
 $rand_keys_1 = array_rand($input_1);
 $wheel1Pos=$input_1[$rand_keys_1];
 
 srand((float) microtime() * 10000000);
 $input_2 = array(9,0,2,4,8);
 $rand_keys_2 = array_rand($input_2);
 $wheel2Pos=$input_2[$rand_keys_2];
 
 srand((float) microtime() * 10000000);
 $input_3 = array(0,2,4,15,15,9,9,3,11);
 $rand_keys_3 = array_rand($input_3);
 $wheel3Pos=$input_3[$rand_keys_3];
 
 }
 
 
 $date=date("d.m.y");
 $time=date("H:i:s");
 
 if ($win>0){
 mysql_query("update users set cash=cash+'$win' where login='$l'");
 if ($l!="guestlogin"){
 mysql_query("update game_bank set bank=bank-'$win' where name='ttuz'");
 }
$sqls="INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[3]','$bet','$win','HALLOWEN')";
	mysql_query($sqls);
 }
 
 if ($win==0){
$sqls="INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[3]','$bet','$win','HALLOWEN')";
	mysql_query($sqls);
 }
 
$result=mysql_query("select * from users where login='$l'");
$row=mysql_fetch_array($result);
 
 echo "&win=$win";
 echo "&winCoins=$coin_win";
 echo "&wheel1Pos=$wheel1Pos";
 echo "&ligne1=$ligne1";
 echo "&wheel2Pos=$wheel2Pos";
 echo "&ligne2=$ligne2";
 echo "&wheel3Pos=$wheel3Pos";
 echo "&ligne3=$ligne3";
 echo "&credit=$row[3]";
 echo "&jackpot1=1000.00";
 echo "&jackpot2=2000.00";
 echo "&jackpot3=3000.00";
 echo "&jackpot=1000.00";
 echo "&Transfert_OK=1";
 
 
 
 
 
 
 ?>