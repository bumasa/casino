<?
Error_Reporting(E_ALL & ~E_NOTICE);
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


echo "error=0&coinSize=1&credit=$row[3]&wheelSize=21&wheel1_1=1&wheel2_1=3&wheel3_1=4&wheel1_2=0&wheel2_2=0&wheel3_2=0&wheel1_3=4&wheel2_3=4&wheel3_3=2&wheel1_4=0&wheel2_4=0&wheel3_4=0&wheel1_5=3&wheel2_5=2&wheel3_5=4&wheel1_6=0&wheel2_6=0&wheel3_6=0&wheel1_7=4&wheel2_7=4&wheel3_7=5&wheel1_8=0&wheel2_8=0&wheel3_8=0&wheel1_9=2&wheel2_9=5&wheel3_9=4&wheel1_10=0&wheel2_10=0&wheel3_10=0&wheel1_11=4&wheel2_11=4&wheel3_11=2&wheel1_12=0&wheel2_12=0&wheel3_12=0&wheel1_13=5&wheel2_13=2&wheel3_13=4&wheel1_14=0&wheel2_14=0&wheel3_14=0&wheel1_15=4&wheel2_15=4&wheel3_15=3&wheel1_16=0&wheel2_16=0&wheel3_16=0&wheel1_17=2&wheel2_17=3&wheel3_17=1&wheel1_18=0&wheel2_18=0&wheel3_18=0&wheel1_19=4&wheel2_19=1&wheel3_19=4&wheel1_20=0&wheel2_20=0&wheel3_20=0&wheel1_21=3&wheel2_21=4&wheel3_21=3&wheel1_22=0&wheel2_22=0&wheel3_22=0&maxCoins=3&wheel1Pos=18&wheel2Pos=16&wheel3Pos=14&gameOver=1&rules=#&help=#&bank=../../in.php&casino=../../index.php&p1_1=2&p1_2=5&p1_3=10&p1_4=20&p1_5=50&p1_6=80&p1_7=150&p1_8=250&p2_1=4&p2_2=10&p2_3=20&p2_4=40&p2_5=100&p2_6=160&p2_7=300&p2_8=500&p3_1=6&p3_2=15&p3_3=30&p3_4=60&p3_5=150&p3_6=240&p3_7=450&p3_8=3000&coinsize1=0.5&coinsize2=1.00&coinsize3=2.00&default_coinsize=2&jackpot1=1000&jackpot2=2000&jackpot3=3000&jackpot=1000&Transfert_OK=1&currency=&lng=EN&cas_log=YC&pop_use=1&pop_1disp=30&pop_nextdisp=60&pop_url=&pop_var1=Do you want to play in real mode ?&pop_var2=Yes&pop_var3=No&pop_var4=&pop_var=&rules=#&help=#&bank=../../in.php&casino=../../index.php&t_betone=BET 1&t_bettwo=BET 2&t_betthree=BET 3&t_bet=BET&t_one=1&t_max=MAX&t_betone=BET 1&t_spin=SPIN&t_betmax=BET MAX&t_autoplay=AUTO PLAY&t_stop=STOP&t_payouts=PAYOUTS&t_help=HELP&t_exit=EXIT&t_rules=RULES&t_info=INFO&t_bank=BANK&t_credit=CREDIT&t_coin=COIN&t_coins=COINS&t_coinvalue=COIN VALUE&t_bet=BET&t_3xany=3x ANY&t_gameover1=GAME&t_gameover2=OVER&t_gameover3=INSERT&t_gameover4=COINS&t_progjack=PROGRESSIVE JACKPOT&t_winpaid=WINPAID&t_backtogame=Click anywhere to go back to the game&t_message1=PLACE YOUR BET&t_message2=GOOD LUCK&t_message3=TRY AGAIN&t_message4=NOT ENOUGH CREDIT&t_youwin=YOU WIN&t_jackpotwon=You win the jackpot !&t_alert1=No enough credit, please check your account&t_alert2=Your session has expired, please log-in&t_alert3=Only play in one window&t_close=CLOSE";                


?>