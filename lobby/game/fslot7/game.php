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
if( isset($_POST["allbet"]) ){ $allbet=$_POST["allbet"]; }else{ $allbet=""; $mon=0;}
if( isset($_POST["bet"]) ){ $bet=$_POST["bet"]; }else{ $bet=""; $mon=0;}
if( isset($_POST["line"]) ){ $line=$_POST["line"]; }else{ $line=""; $mon=0;}
$date=date("d.m.y");
$time=date("H:i:s");
$mx=array(2,3,4,5,6,7,8,9);
$row=mysql_fetch_array(mysql_query("select * from users where login='$l'"));
if ($bet<>0.2 && $bet<>1 && $bet<>5 && $bet<>10 && $bet<>50){ $mon=0;}
if ($row[3] < $bet){$mon=0;}
if ($line > 3){$mon=0;}
if ($mon==0 or $mon==""){
echo "&spin=0&cash=$row[3]";
}
if ($mon==1){
$win=0;
mysql_query("update users set cash=cash-'$allbet' where login='$l'");
mysql_query("update game_bank set bank=bank+'$allbet' where name='ttuz'");
shuffle($mx);
$sim1=$mx[0]; $sim2=$mx[1]; $sim3=$mx[2]; $sim4=$mx[3];
shuffle($mx);
$sim5=$mx[0]; $sim6=$mx[1]; $sim7=$mx[2]; $sim8=$mx[3];
shuffle($mx); 
$sim9=$mx[0]; $sim10=$mx[1]; $sim11=$mx[2]; $sim12=$mx[3];
srand ((double) microtime()*1000000);
$rnd_predel=rand(1,3);
if ($rnd_predel==2){ $predel_min=1; $predel_max=400; }else{ $predel_min=400; $predel_max=500;}
$rnd_sim1=rand($predel_min,$predel_max);
$rnd_sim2=rand($predel_min,$predel_max);
$rnd_sim3=rand($predel_min,$predel_max);
if ($rnd_sim1==110){ $sim5=9; $sim6=9; $sim7=9; $sim8=9; $win1=$bet*250;}
if ($rnd_sim1==120){ $sim5=8; $sim6=8; $sim7=8; $sim8=8; $win1=$bet*150;}
if ($rnd_sim1==130){ $sim5=7; $sim6=7; $sim7=7; $sim8=7; $win1=$bet*100;}
if ($rnd_sim1==140){ $sim5=6; $sim6=6; $sim7=6; $sim8=6; $win1=$bet*200;}
if ($rnd_sim1==150){ $sim5=5; $sim6=5; $sim7=5; $sim8=3; $win1=$bet*35; }
if ($rnd_sim1==160){ $sim5=4; $sim6=4; $sim7=4; $sim8=5; $win1=$bet*25; }
if ($rnd_sim1==170){ $sim5=3; $sim6=3; $sim7=3; $sim8=4; $win1=$bet*10; }
if ($rnd_sim1==180){ $sim5=2; $sim6=2; $sim7=2; $sim8=3; $win1=$bet*15; }
if ($rnd_sim1==190){ $sim5=5; $sim6=5; $sim7=7; $sim8=8; $win1=$bet*4; }
if ($rnd_sim1==192){ $sim5=4; $sim6=4; $sim7=6; $sim8=9; $win1=$bet*2; }
if ($rnd_sim1==195){ $sim5=2; $sim6=2; $sim7=6; $sim8=7; $win1=$bet*2; }
if ($rnd_sim1==197){ $sim5=1; $sim6=1; $sim7=8; $sim8=9; $win1=$bet*2; }
if ($rnd_sim2==210){ $sim1=9; $sim2=9; $sim3=9; $sim4=9; $win2=$bet*250;}
if ($rnd_sim2==220){ $sim1=8; $sim2=8; $sim3=8; $sim4=8; $win2=$bet*150;}
if ($rnd_sim2==230){ $sim1=7; $sim2=7; $sim3=7; $sim4=7; $win2=$bet*100;}
if ($rnd_sim2==240){ $sim1=6; $sim2=6; $sim3=6; $sim4=6; $win2=$bet*200;}
if ($rnd_sim2==250){ $sim1=5; $sim2=5; $sim3=5; $sim4=3; $win2=$bet*35; }
if ($rnd_sim2==260){ $sim1=4; $sim2=4; $sim3=4; $sim4=5; $win2=$bet*25; }
if ($rnd_sim2==270){ $sim1=3; $sim2=3; $sim3=3; $sim4=4; $win2=$bet*10; }
if ($rnd_sim2==280){ $sim1=2; $sim2=2; $sim3=2; $sim4=3; $win2=$bet*15; }
if ($rnd_sim1==290){ $sim1=5; $sim2=5; $sim3=6; $sim4=7; $win2=$bet*4; }
if ($rnd_sim1==292){ $sim1=4; $sim2=4; $sim3=9; $sim4=8; $win2=$bet*2; }
if ($rnd_sim1==295){ $sim1=2; $sim2=2; $sim3=7; $sim4=8; $win2=$bet*2; }
if ($rnd_sim1==297){ $sim1=1; $sim2=1; $sim3=7; $sim4=9; $win2=$bet*2; }
if ($rnd_sim3==310){ $sim9=9; $sim10=9; $sim11=9; $sim12=9; $win3=$bet*250;}
if ($rnd_sim3==320){ $sim9=8; $sim10=8; $sim11=8; $sim12=8; $win3=$bet*150;}
if ($rnd_sim3==330){ $sim9=7; $sim10=7; $sim11=7; $sim12=7; $win3=$bet*100;}
if ($rnd_sim3==340){ $sim9=6; $sim10=6; $sim11=6; $sim12=6; $win3=$bet*200;}
if ($rnd_sim3==350){ $sim9=5; $sim10=5; $sim11=5; $sim12=3; $win3=$bet*35; }
if ($rnd_sim3==360){ $sim9=4; $sim10=4; $sim11=4; $sim12=5; $win3=$bet*25; }
if ($rnd_sim3==370){ $sim9=3; $sim10=3; $sim11=3; $sim12=4; $win3=$bet*10; }
if ($rnd_sim3==380){ $sim9=2; $sim10=2; $sim11=2; $sim12=3; $win3=$bet*15; }
if ($rnd_sim1==390){ $sim9=5; $sim10=5; $sim11=9; $sim12=4; $win3=$bet*4; }
if ($rnd_sim1==392){ $sim9=4; $sim10=4; $sim11=3; $sim12=7; $win3=$bet*2; }
if ($rnd_sim1==395){ $sim9=2; $sim10=2; $sim11=5; $sim12=6; $win3=$bet*2; }
if ($rnd_sim1==397){ $sim9=1; $sim10=1; $sim11=6; $sim12=3; $win3=$bet*2; }
if ($line==1){$win2=0; $win3=0;}
if ($line==2){$win3=0;}
$win=$win1+$win2+$win3;
$rowb=mysql_fetch_array(mysql_query("select * from game_bank where name='ttuz'"));
$caswin = $rowb['bank']/100*$rowb['proc'];
if ($win>=$caswin) { 
$win=0;
if ($line==1) {
shuffle($mx);
$sim5=$mx[0]; $sim6=$mx[1]; $sim7=$mx[2]; $sim8=$mx[3];
}
if ($line==2) {
shuffle($mx);
$sim1=$mx[0]; $sim2=$mx[1]; $sim3=$mx[2]; $sim4=$mx[3];
shuffle($mx);
$sim5=$mx[0]; $sim6=$mx[1]; $sim7=$mx[2]; $sim8=$mx[3];
}
if ($line==3) { 
shuffle($mx);
$sim1=$mx[0]; $sim2=$mx[1]; $sim3=$mx[2]; $sim4=$mx[3];
shuffle($mx);
$sim5=$mx[0]; $sim6=$mx[1]; $sim7=$mx[2]; $sim8=$mx[3];
shuffle($mx); 
$sim9=$mx[0]; $sim10=$mx[1]; $sim11=$mx[2]; $sim12=$mx[3];
}
}
if ($win>0){
mysql_query("update users set cash=cash+'$win' where login='$l'");
mysql_query("update game_bank set bank=bank-'$win' where name='ttuz'");
}
mysql_query("INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[3]','$allbet','$win','Red Road')");
$row=mysql_fetch_array(mysql_query("select * from users where login='$l'"));
echo "&pp1=$sim1&pp2=$sim2&pp3=$sim3&pp4=$sim4&pp5=$sim5&pp6=$sim6&pp7=$sim7&pp8=$sim8&pp9=$sim9&pp10=$sim10&pp11=$sim11&pp12=$sim12";
echo "&cash_new=$row[3]";
echo "&win_new=$win";
echo "&spin=1";
}
?>