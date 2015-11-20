<?
error_reporting(0);
session_start();
$l=$_SESSION['l'];
if(!isset($l)){ header("Location: ../../login.php"); exit; }
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




if ($action=="ENTER"){
$cash=cash($l);
echo "&RESULT=OK&BALANCE=$cash";
}





if ($action=="MAKEBET"){
$host = str_replace("www.", "", $_SERVER['HTTP_HOST']);
/*if($host<>"azartsoft.co.cc"){exit;}*/

$data_array=explode("|", $BET);

$allbet=0;
for ($k = 0; $k <= 162; $k++) {
$mb1=$data_array[$k];
if($mb1>0 && $mb1<>" "){
$allbet=$allbet+$mb1;
}
}
mysql_query("update users set cash=cash-'$allbet' where login='$l'");
mysql_query("update game_bank set bank=bank+'$allbet' where name='ttuz'");



$ams=0;
while ($ams<10000000) {
$dig=rnd1();
$win=0;
$win2=0;

for ($k = 0; $k <= 162; $k++) {
$mb=$data_array[$k];

if($mb>0 && $mb<>" "){
$aa=rnd2($k,$dig);
if($aa == true)
{
if ($k >= 0 && $k <= 36){$win=($win+$mb*36)+$mb;  $win2=($win2+$mb*36); }
if ($k >= 37 && $k <= 93){$win=($win+$mb*18)+$mb; $win2=($win2+$mb*18); }
if ($k >= 94 && $k <= 105){$win=($win+$mb*12)+$mb; $win2=($win2+$mb*12); }
if ($k >= 106 && $k <= 128){$win=($win+$mb*9)+$mb; $win2=($win2+$mb*9); }
if ($k >= 130 && $k <= 140){$win=($win+$mb*6)+$mb; $win2=($win2+$mb*6); }
if ($k >= 146 && $k <= 151){$win=($win+$mb*3)+$mb; $win2=($win2+$mb*3); }
if ($k >= 157 && $k <= 162){$win=($win+$mb*2)+$mb; $win2=($win2+$mb*2); }
}
}

}

$casbank=winlimit();

$ams++;
if ($win2 >= $casbank){$ams=12;}else{$ams=12000000;}

}



if ($win2 > 0){
mysql_query("update users set cash=cash+'$win2' where login='$l'");
mysql_query("update game_bank set bank=bank-'$win2' where name='ttuz'");
}

$cash=cash($l);
mysql_query("INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$cash','$allbet','$win2','Рулетка 2')");


echo "&id=5001&JACKPOT=0.00&PAYOUT=$win&NUMBER=$dig&RESULT=OK&BALANCE=$cash&";

} // END MAKEBET



//// FUNCTION

function winlimit(){
$rowb=mysql_fetch_array(mysql_query("select * from game_bank where name='ttuz'"));
//$caswin = $rowb['bank']/100*$rowb['proc'];
$caswin = $rowb['bank'];
return $caswin;
}



function cash($l)
{
$table_cash=mysql_query("select * from users where login='$l'");
$row1=mysql_fetch_array($table_cash);
$cash=$row1["cash"];
return $cash;
}



function rnd1()
{
srand ((double) microtime()*time());
$dig=rand(0,36);
return $dig;
}



function rnd2($cell,$dig)
{
$masvet0=array(0,106);
$masvet1=array(1,37,61,94,106,107,130,146,149,157,160,161);
$masvet2=array(2,37,38,62,94,106,107,108,130,147,149,158,159,161);
$masvet3=array(3,38,63,94,106,108,130,148,149,157,160,161);
$masvet4=array(4,39,61,64,95,107,109,130,131,146,149,158,159,161);
$masvet5=array(5,39,40,62,65,95,107,108,109,110,130,131,147,149,157,160,161);
$masvet6=array(6,40,63,95,108,110,130,131,135,148,149,158,159,161);
$masvet7=array(7,41,64,67,96,109,111,131,132,146,149,157,160,161);
$masvet8=array(8,41,42,65,68,96,109,110,111,112,131,132,147,149,158,159,161);
$masvet9=array(9,42,66,69,96,110,112,131,132,148,149,157,160,161);
$masvet10=array(10,43,67,70,97,111,113,132,133,146,149,158,159,161);
$masvet11=array(11,43,44,68,71,97,111,112,113,114,132,133,147,149,158,160,161);
$masvet12=array(12,44,69,72,97,112,114,132,133,148,149,157,159,161);
$masvet13=array(13,45,70,73,98,113,115,133,134,146,150,158,160,161);
$masvet14=array(14,45,46,71,74,98,113,114,115,116,133,134,147,150,157,159,161);
$masvet15=array(15,46,72,75,98,114,116,133,134,148,150,158,160,161);
$masvet16=array(16,47,73,76,99,115,117,134,146,150,157,159,161);
$masvet17=array(17,47,48,74,77,99,115,116,117,118,134,135,147,150,158,160,161);
$masvet18=array(18,48,75,78,99,116,118,134,135,148,150,157,159,161);
$masvet19=array(19,49,76,79,100,117,119,135,136,146,150,157,160,162);
$masvet20=array(20,49,50,77,80,100,117,118,119,120,135,136,147,150,158,159,162);
$masvet21=array(21,50,78,81,100,118,120,135,136,148,150,157,160,162);
$masvet22=array(22,51,79,82,119,121,136,137,146,150,158,159,162);
$masvet23=array(23,51,52,80,83,101,119,120,121,122,136,137,147,150,157,160,162);
$masvet24=array(24,52,81,84,101,120,122,136,137,148,150,158,159,162);
$masvet25=array(25,53,82,85,102,121,123,137,138,146,151,157,160,162);
$masvet26=array(26,53,54,83,86,102,121,122,123,124,137,138,147,151,158,159,162);
$masvet27=array(27,54,84,87,102,122,124,137,138,148,151,157,160,162);
$masvet28=array(28,55,85,88,103,123,125,138,139,146,151,158,159,162);
$masvet29=array(29,55,56,86,89,103,123,124,125,126,138,139,147,151,158,160,162);
$masvet30=array(30,56,87,90,103,124,126,138,148,151,157,159,162);
$masvet31=array(31,57,88,91,104,125,127,139,140,146,151,158,160,162);
$masvet32=array(32,57,58,89,92,104,125,126,127,128,139,140,147,151,157,159,162);
$masvet33=array(33,58,90,93,104,126,128,139,140,148,151,158,160,162);
$masvet34=array(34,59,91,105,127,140,146,151,157,159,162);
$masvet35=array(35,59,60,92,105,127,128,140,147,151,158,160,162);
$masvet36=array(36,60,93,105,128,140,148,151,157,159,162);
$mas=${"masvet".$dig};
$aa=in_array($cell, $mas);
return $aa;
}


?>