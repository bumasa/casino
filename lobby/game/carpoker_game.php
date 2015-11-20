<?
error_reporting(0);
session_start();
$l=$_SESSION['l'];
if(!isset($l)){ 
header("Location: ../../login.php"); 
exit; 
}
$date=date("d.m.y");
$time=date("H:i:s");
//**************GAMEMODE*****************************************************************
if ($HTTP_SESSION_VARS['mode']=="true" or !isset($HTTP_SESSION_VARS['mode']))
{
 include ("../../setup.php");
}

if ($HTTP_SESSION_VARS['mode']=="false")
{
      include ("../../setup_virtual.php");
}
//****************************************************************************************
$action=$_POST["ACTION"];
$bet=$_POST["BET"];
if ($bet<0){$action="ENTER"; $bet=0; }
if ($action=="ENTER"){
unset($_SESSION['win_ses']);
unset($_SESSION['ante']);
unset($_SESSION['mnoj']);
unset($_SESSION['card_d']);
unset($_SESSION['card_p']);
unset($_SESSION['card_ds']);
unset($_SESSION['card_ps']);
unset($_SESSION['card_d_comb']);
unset($_SESSION['card_p_comb']);
$cash=cash($l);
echo "&RESULT=OK&BALANCE=$cash";
}
if ($action=="MAKEBET"){
unset($_SESSION['win_ses']);
unset($_SESSION['ante']);
unset($_SESSION['mnoj']);
unset($_SESSION['card_d']);
unset($_SESSION['card_p']);
unset($_SESSION['card_ds']);
unset($_SESSION['card_ps']);
unset($_SESSION['card_d_comb']);
unset($_SESSION['card_p_comb']);
$_SESSION['ante']=$bet;
$cash=cash($l);
$date=date("d.m.y");
$time=date("H:i:s");
mysql_query("INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$cash','$bet','0.00','poker1 (ANTE)')");
mysql_query("update users set cash=cash-'$bet' where login='$l'");
mysql_query("update game_bank set bank=bank+'$bet' where name='ttuz'");
while ($ams<1000000) {
$fma=karta();
$card_d=$fma[0];
$card_p=$fma[1];
$card_d_comb_tmp=init_card($card_d);
$card_p_comb_tmp=init_card($card_p);
$card_d_comb=$card_d_comb_tmp[0];
$card_p_comb=$card_p_comb_tmp[0];
$mnoj=$card_p_comb_tmp[1];
$st_game=0;
$ante5=$bet;
$bet5=$bet*2;
$uwin=0;
$win=0;
if ($card_d_comb <= 90 && $st_game==0){
$st_game=1;
$win1=$ante5*1;
$win2=0;
$uwin1=$win1+$ante5;
$uwin2=$win2+$bet5;
$win=$uwin1+$uwin2;
} 
if ($card_d_comb == $card_p_comb && $st_game==0){
$win=$bet5+$ante5;
$uwin=0;$st_game=1;
}
if ($card_d_comb > $card_p_comb && $st_game==0){
$uwin=0;$win=0;$st_game=1;
} 
if ($card_d_comb < $card_p_comb && $st_game==0){
$st_game=1;
$win1=$ante5*1;
$win2=$bet5*$mnoj;
$uwin1=$win1+$ante5;
$uwin2=$win2+$bet5;
$win=$uwin1+$uwin2;
}
$casbank=winlimit();
if($casbank<$win){$ams=1;}else{$ams=2000000; $_SESSION['win_ses']=$win; $win=0;$uwin1=0;$uwin2=0;$bet5=0;$ante5=0;}
}
$_SESSION['mnoj']=$mnoj;
$_SESSION['card_d_comb']=$card_d_comb;
$_SESSION['card_p_comb']=$card_p_comb;
$_SESSION['card_ds']=$card_d;
$_SESSION['card_ps']=$card_p;
shuffle($card_d);
shuffle($card_p);
$_SESSION['card_d']=$card_d;
$_SESSION['card_p']=$card_p;
$cardsdealer="52|52|52|52|$card_d[4]";
$cardsplayer="$card_p[0]|$card_p[1]|$card_p[2]|$card_p[3]|$card_p[4]";
$cash=cash($l);
echo"&CARDSDEALERSORTED=$cardsdealer&CARDSDEALER=$cardsdealer&CARDSPLAYERSORTED=$cardsplayer&CARDSPLAYER=$cardsplayer&PAYOUT=0.0|0.0&BET=$bet.0|$bet.0&PAYOUTTYPE=0&RESULT=OK&BALANCE=$cash&";
}
if ($action=="BET"){
$win_ses=$_SESSION['win_ses'];
$casbank=winlimit();
if($casbank<$win_ses){exit;}
$uwin=0;
$win=0;
$card_d=$_SESSION['card_d'];
$card_p=$_SESSION['card_p'];
$card_ds=$_SESSION['card_ds'];
$card_ps=$_SESSION['card_ps'];
$card_d_comb=$_SESSION['card_d_comb'];
$card_p_comb=$_SESSION['card_p_comb'];
$mnoj=$_SESSION['mnoj'];
$ante5=$_SESSION['ante'];
$bet5=$ante5*2;
$cash=cash($l);
$date=date("d.m.y");
$time=date("H:i:s");
mysql_query("INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$cash','$bet5','0.00','poker1 (BET)')");
mysql_query("update users set cash=cash-'$bet5' where login='$l'");
mysql_query("update game_bank set bank=bank+'$bet5' where name='ttuz'");
$st_game=0;
if ($card_d_comb <= 90 && $st_game==0){
$PAYOUTTYPE=2;$st_game=1;
$win1=$ante5*1;
$win2=0;
$uwin1=$win1+$ante5;
$uwin2=$win2+$bet5;
$win=$uwin1+$uwin2;
$cash=cash($l);
$date=date("d.m.y");
$time=date("H:i:s");
mysql_query("INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$cash','$bet5','$win1','poker1 (NO GAME)')");
mysql_query("update users set cash=cash+'$win' where login='$l'");
mysql_query("update game_bank set bank=bank-'$win' where name='ttuz'");
}
if ($card_d_comb == $card_p_comb && $st_game==0){
$PAYOUTTYPE=1;
$win=$bet5+$ante5;
$uwin=0;$st_game=1;
$cash=cash($l);
$date=date("d.m.y");
$time=date("H:i:s");
mysql_query("INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$cash','$bet5','0.00','poker1 (PUSH)')");
mysql_query("update users set cash=cash+'$win' where login='$l'");
mysql_query("update game_bank set bank=bank-'$win' where name='ttuz'");
}
if ($card_d_comb > $card_p_comb && $st_game==0){
$PAYOUTTYPE=0;
$uwin=0;$win=0;$st_game=1;
$cash=cash($l);
$date=date("d.m.y");
$time=date("H:i:s");
mysql_query("INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$cash','$bet5','0.00','poker1 (LOSE)')");
}
if ($card_d_comb < $card_p_comb && $st_game==0){
$PAYOUTTYPE=4;
$st_game=1;
$win1=$ante5*1;
$win2=$bet5*$mnoj;
$uwin1=$win1+$ante5;
$uwin2=$win2+$bet5;
$win=$uwin1+$uwin2;
$winst=$win1+$win2;
$cash=cash($l);
$date=date("d.m.y");
$time=date("H:i:s");
mysql_query("INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$cash','$bet5','$winst','poker1 (WIN)')");
mysql_query("update users set cash=cash+'$win' where login='$l'");
mysql_query("update game_bank set bank=bank-'$win' where name='ttuz'");
}
$cardsdealer="$card_d[0]|$card_d[1]|$card_d[2]|$card_d[3]|$card_d[4]";
$cardsplayer="$card_p[0]|$card_p[1]|$card_p[2]|$card_p[3]|$card_p[4]";
$cardsdealer_sort="$card_ds[0]|$card_ds[1]|$card_ds[2]|$card_ds[3]|$card_ds[4]";
$cardsplayer_sort="$card_ps[0]|$card_ps[1]|$card_ps[2]|$card_ps[3]|$card_ps[4]";
$cash=cash($l);
echo"&CARDSDEALERSORTED=$cardsdealer_sort&CARDSDEALER=$cardsdealer&CARDSPLAYERSORTED=$cardsplayer_sort&CARDSPLAYER=$cardsplayer&PAYOUT=$uwin1.0|$uwin2.0&BET=$ante5.0|$bet5.0&PAYOUTTYPE=$PAYOUTTYPE&&RESULT=OK&BALANCE=$cash&";
}
if ($action=="SURRENDER"){
$bet=$_SESSION['ante'];
$card_d=$_SESSION['card_d'];
$card_p=$_SESSION['card_p'];
$card_ds=$_SESSION['card_ds'];
$card_ps=$_SESSION['card_ps'];
unset($_SESSION['ante']);
unset($_SESSION['win_ses']);
unset($_SESSION['mnoj']);
unset($_SESSION['card_d']);
unset($_SESSION['card_p']);
unset($_SESSION['card_ds']);
unset($_SESSION['card_ps']);
unset($_SESSION['card_d_comb']);
unset($_SESSION['card_p_comb']);
$cash=cash($l);
$date=date("d.m.y");
$time=date("H:i:s");
mysql_query("INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$cash','$bet','0.00','poker1 (PASS)')");
$cardsdealer="$card_d[0]|$card_d[1]|$card_d[2]|$card_d[3]|$card_d[4]";
$cardsplayer="$card_p[0]|$card_p[1]|$card_p[2]|$card_p[3]|$card_p[4]";
$cardsdealer_sort="$card_ds[0]|$card_ds[1]|$card_ds[2]|$card_ds[3]|$card_ds[4]";
$cardsplayer_sort="$card_ps[0]|$card_ps[1]|$card_ps[2]|$card_ps[3]|$card_ps[4]";
$cash=cash($l);
echo"&CARDSDEALERSORTED=$cardsdealer_sort&CARDSDEALER=$cardsdealer&CARDSPLAYERSORTED=$cardsplayer_sort&CARDSPLAYER=$cardsplayer&PAYOUT=0.0|0.0&BET=0.0|0.0&PAYOUTTYPE=0&";
echo "&id=5001&JACKPOT=0.00&RESULT=OK&BALANCE=$cash&";
}
function winlimit(){
$rowb=mysql_fetch_array(mysql_query("select * from game_bank where name='ttuz'"));
$caswin = $rowb['bank']/100*$rowb['proc'];
return $caswin;
}
function cash($l)
{
$table_cash=mysql_query("select * from users where login='$l'");
$row1=mysql_fetch_array($table_cash);
$cash=$row1["cash"];
return $cash;
}
function karta()
{
$card = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51);
$card_sh=array(0,13,26,39,1,14,27,40,2,15,28,41,3,16,29,42,4,17,30,43,5,18,31,44,6,19,32,45,7,20,33,46,8,21,34,47,9,22,35,48,10,23,36,49,11,24,37,50,12,25,38,51);
shuffle($card);
for ($k = 0; $k <= 4; $k++) {
$card_out_p[$k]=$card[$k];
}
for ($k = 0; $k <= 4; $k++) {
$card_out_d[$k]=$card[$k+6];
}
$m=0;
for ($k = 0; $k <= 51; $k++) {
for ($k2 = 0; $k2 <= 4; $k2++) {
if ($card_sh[$k]==$card_out_p[$k2]){$card_out_s_p[$m]=$card_out_p[$k2]; $m++;}
}
}
$m=0;
for ($k = 0; $k <= 51; $k++) {
for ($k2 = 0; $k2 <= 4; $k2++) {
if ($card_sh[$k]==$card_out_d[$k2]){$card_out_s_d[$m]=$card_out_d[$k2]; $m++;}
}
}
return array ($card_out_s_p,$card_out_s_d);
}
function init_card($vipalo){
$comb=0;
if($comb==0){
$comb1 = array(12,11,10,9,8);
$comb2 = array(25,24,23,22,21);
$comb3 = array(38,37,36,35,34);
$comb4 = array(51,50,49,48,47);
for ($k = 1; $k <= 4; $k++) {
$result = array_intersect (${"comb".$k}, $vipalo);
$countm = count($result);
if($countm==5){$comb=900; break; }
}
}
if($comb==0){
$comb1 = array(0,1,2,3,4,5,6,7,8,9,10,11,12);
$comb2 = array(13,14,15,16,17,18,19,20,21,22,23,24,25);
$comb3 = array(26,27,28,29,30,31,32,33,34,35,36,37,38);
$comb4 = array(39,40,41,42,43,44,45,46,47,48,49,50,51);
for ($k = 1; $k <= 4; $k++) {
$result = array_intersect (${"comb".$k}, $vipalo);
$countm = count($result);
if($countm==5){break;}
}
if($vipalo[0]+1==$vipalo[1] && $vipalo[1]+1==$vipalo[2] && $vipalo[2]+1==$vipalo[3] && $vipalo[3]+1==$vipalo[4]){$comb=800;}
}
if($comb==0){
$comb1 = array(0,13,26,39);
$comb2 = array(1,14,27,40);
$comb3 = array(2,15,28,41);
$comb4 = array(3,16,29,42);
$comb5 = array(4,17,30,43);
$comb6 = array(5,18,31,44);
$comb7 = array(6,19,32,45);
$comb8 = array(7,20,33,46);
$comb9 = array(8,21,34,47);
$comb10 = array(9,22,35,48);
$comb11 = array(10,23,36,49);
$comb12 = array(11,24,37,50);
$comb13 = array(12,25,38,51);
for ($k = 1; $k <= 13; $k++) {
$result = array_intersect (${"comb".$k}, $vipalo);
$countm = count($result);
if($countm==4){break;}
}
if($countm==4){
if($result[0]==0){$comb=702;}
if($result[0]==1){$comb=703;}
if($result[0]==2){$comb=704;}
if($result[0]==3){$comb=705;}
if($result[0]==4){$comb=706;}
if($result[0]==5){$comb=707;}
if($result[0]==6){$comb=708;}
if($result[0]==7){$comb=709;}
if($result[0]==8){$comb=710;}
if($result[0]==9){$comb=711;}
if($result[0]==10){$comb=712;}
if($result[0]==11){$comb=713;}
if($result[0]==12){$comb=714;}
}
}
if($comb==0){
$comb1 = array(0,13,26,39);
$comb2 = array(1,14,27,40);
$comb3 = array(2,15,28,41);
$comb4 = array(3,16,29,42);
$comb5 = array(4,17,30,43);
$comb6 = array(5,18,31,44);
$comb7 = array(6,19,32,45);
$comb8 = array(7,20,33,46);
$comb9 = array(8,21,34,47);
$comb10 = array(9,22,35,48);
$comb11 = array(10,23,36,49);
$comb12 = array(11,24,37,50);
$comb13 = array(12,25,38,51);
for ($k = 1; $k <= 13; $k++) {
$result1 = array_intersect (${"comb".$k}, $vipalo);
$countm1 = count($result1);
if($countm1==3){break;}
}
for ($k = 0; $k <= 4; $k++) {
if (!in_array($vipalo[$k] , $result)) { $vipalo2[$k]=$vipalo[$k]; }
}
for ($k = 1; $k <= 13; $k++) {
$result2 = array_intersect (${"comb".$k}, $vipalo2);
$countm2 = count($result2);
if($countm2==2){break;}
}
$countm=$countm2+$countm1;
if($countm==5){
if($result1[2]==0){$comb=602;}
if($result1[2]==1){$comb=603;}
if($result1[2]==2){$comb=604;}
if($result1[2]==3){$comb=605;}
if($result1[2]==4){$comb=606;}
if($result1[2]==5){$comb=607;}
if($result1[2]==6){$comb=608;}
if($result1[2]==7){$comb=609;}
if($result1[2]==8){$comb=610;}
if($result1[2]==9){$comb=611;}
if($result1[2]==10){$comb=612;}
if($result1[2]==11){$comb=613;}
if($result1[2]==12){$comb=614;}
}
}
if($comb==0){
$comb1 = array(0,1,2,3,4,5,6,7,8,9,10,11,12);
$comb2 = array(13,14,15,16,17,18,19,20,21,22,23,24,25);
$comb3 = array(26,27,28,29,30,31,32,33,34,35,36,37,38);
$comb4 = array(39,40,41,42,43,44,45,46,47,48,49,50,51);
for ($k = 1; $k <= 4; $k++) {
$result = array_intersect (${"comb".$k}, $vipalo);
$countm = count($result);
if($countm==5){$comb=500; break;}
}
}
if($comb==0){
$comb1 = array(0,13,26,39);
$comb2 = array(1,14,27,40);
$comb3 = array(2,15,28,41);
$comb4 = array(3,16,29,42);
$comb5 = array(4,17,30,43);
$comb6 = array(5,18,31,44);
$comb7 = array(6,19,32,45);
$comb8 = array(7,20,33,46);
$comb9 = array(8,21,34,47);
$comb10 = array(9,22,35,48);
$comb11 = array(10,23,36,49);
$comb12 = array(11,24,37,50);
$comb13 = array(12,25,38,51);
if(in_array($vipalo[0],$comb1) && in_array($vipalo[1],$comb2) && in_array($vipalo[2],$comb3) && in_array($vipalo[3],$comb4) && in_array($vipalo[4],$comb5)) { $comb=400; }
if(in_array($vipalo[0],$comb2) && in_array($vipalo[1],$comb3) && in_array($vipalo[2],$comb4) && in_array($vipalo[3],$comb5) && in_array($vipalo[4],$comb6)) { $comb=400; }
if(in_array($vipalo[0],$comb3) && in_array($vipalo[1],$comb4) && in_array($vipalo[2],$comb5) && in_array($vipalo[3],$comb6) && in_array($vipalo[4],$comb7)) { $comb=400; }
if(in_array($vipalo[0],$comb4) && in_array($vipalo[1],$comb5) && in_array($vipalo[2],$comb6) && in_array($vipalo[3],$comb7) && in_array($vipalo[4],$comb8)) { $comb=400; }
if(in_array($vipalo[0],$comb5) && in_array($vipalo[1],$comb6) && in_array($vipalo[2],$comb7) && in_array($vipalo[3],$comb8) && in_array($vipalo[4],$comb9)) { $comb=400; }
if(in_array($vipalo[0],$comb6) && in_array($vipalo[1],$comb7) && in_array($vipalo[2],$comb8) && in_array($vipalo[3],$comb9) && in_array($vipalo[4],$comb10)) { $comb=400; }
if(in_array($vipalo[0],$comb7) && in_array($vipalo[1],$comb8) && in_array($vipalo[2],$comb9) && in_array($vipalo[3],$comb10) && in_array($vipalo[4],$comb11)) { $comb=400; }
if(in_array($vipalo[0],$comb8) && in_array($vipalo[1],$comb9) && in_array($vipalo[2],$comb10) && in_array($vipalo[3],$comb11) && in_array($vipalo[4],$comb12)) { $comb=400; }
if(in_array($vipalo[0],$comb9) && in_array($vipalo[1],$comb10) && in_array($vipalo[2],$comb11) && in_array($vipalo[3],$comb12) && in_array($vipalo[4],$comb13)) { $comb=400; }
}
if($comb==0){
$comb1 = array(0,13,26,39);
$comb2 = array(1,14,27,40);
$comb3 = array(2,15,28,41);
$comb4 = array(3,16,29,42);
$comb5 = array(4,17,30,43);
$comb6 = array(5,18,31,44);
$comb7 = array(6,19,32,45);
$comb8 = array(7,20,33,46);
$comb9 = array(8,21,34,47);
$comb10 = array(9,22,35,48);
$comb11 = array(10,23,36,49);
$comb12 = array(11,24,37,50);
$comb13 = array(12,25,38,51);
for ($k = 1; $k <= 13; $k++) {
$result = array_intersect (${"comb".$k}, $vipalo);
$countm = count($result);
if($countm==3){break;}
}
if($countm==3){
if($result[0]==0){$comb=302;}
if($result[0]==1){$comb=303;}
if($result[0]==2){$comb=304;}
if($result[0]==3){$comb=305;}
if($result[0]==4){$comb=306;}
if($result[0]==5){$comb=307;}
if($result[0]==6){$comb=308;}
if($result[0]==7){$comb=309;}
if($result[0]==8){$comb=310;}
if($result[0]==9){$comb=311;}
if($result[0]==10){$comb=312;}
if($result[0]==11){$comb=313;}
if($result[0]==12){$comb=314;}
}
}
if($comb==0){
$comb1 = array(0,13,26,39);
$comb2 = array(1,14,27,40);
$comb3 = array(2,15,28,41);
$comb4 = array(3,16,29,42);
$comb5 = array(4,17,30,43);
$comb6 = array(5,18,31,44);
$comb7 = array(6,19,32,45);
$comb8 = array(7,20,33,46);
$comb9 = array(8,21,34,47);
$comb10 = array(9,22,35,48);
$comb11 = array(10,23,36,49);
$comb12 = array(11,24,37,50);
$comb13 = array(12,25,38,51);
for ($k1 = 1; $k1 <= 13; $k1++) {
$result = array_intersect (${"comb".$k1}, $vipalo);
$countm1 = count($result);
if($countm1==2){break;}
}
$kk=0;
for ($k2 = 0; $k2 <= 4; $k2++) {
if (in_array($vipalo[$k2] , $result)) {}else{ $vipalo2[$kk]=$vipalo[$k2]; if($kk>=2){break;} $kk++;}
}
for ($k3 = 1; $k3 <= 13; $k3++) {
$result2 = array_intersect (${"comb".$k3}, $vipalo2);
$countm2 = count($result2);
if($countm2==2){break;}
}
$countm0=$countm2+$countm1;
if($k1>=$k3){$k=$k1;}else{$k=$k3;}
if($countm0==4 && $k<>14){
if($k==1){$comb=202;}
if($k==2){$comb=203;}
if($k==3){$comb=204;}
if($k==4){$comb=205;}
if($k==5){$comb=206;}
if($k==6){$comb=207;}
if($k==7){$comb=208;}
if($k==8){$comb=209;}
if($k==9){$comb=210;}
if($k==10){$comb=211;}
if($k==11){$comb=212;}
if($k==12){$comb=213;}
if($k==13){$comb=214;}
}
}
if($comb==0){
$comb1 = array(0,13,26,39);
$comb2 = array(1,14,27,40);
$comb3 = array(2,15,28,41);
$comb4 = array(3,16,29,42);
$comb5 = array(4,17,30,43);
$comb6 = array(5,18,31,44);
$comb7 = array(6,19,32,45);
$comb8 = array(7,20,33,46);
$comb9 = array(8,21,34,47);
$comb10 = array(9,22,35,48);
$comb11 = array(10,23,36,49);
$comb12 = array(11,24,37,50);
$comb13 = array(12,25,38,51);
for ($k = 1; $k <= 13; $k++) {
$result = array_intersect (${"comb".$k}, $vipalo);
$countm = count($result);
if($countm==2){
if($k==1){$comb=102;}
if($k==2){$comb=103;}
if($k==3){$comb=104;}
if($k==4){$comb=105;}
if($k==5){$comb=106;}
if($k==6){$comb=107;}
if($k==7){$comb=108;}
if($k==8){$comb=109;}
if($k==9){$comb=110;}
if($k==10){$comb=111;}
if($k==11){$comb=112;}
if($k==12){$comb=113;}
if($k==13){$comb=114;}
break;
}
}
}
if($comb==0){
$comb1 = array(11,24,37,50,12,25,38,51);
$result = array_intersect ($comb1, $vipalo);
$countm = count($result);
if($countm==2){$comb=99;}
}
if($comb==900){$mnoj=100;}
if($comb==800){$mnoj=50;}
if($comb>700 && $comb<720){$mnoj=20;}
if($comb>600 && $comb<620){$mnoj=7;}
if($comb==500){$mnoj=5;}
if($comb==400){$mnoj=4;}
if($comb>300 && $comb<320){$mnoj=3;}
if($comb>200 && $comb<220){$mnoj=2;}
if($comb>100 && $comb<120){$mnoj=1;}
if($comb==99){$mnoj=1;}
$otvet[0]=$comb;
$otvet[1]=$mnoj;
return $otvet;
}
?>