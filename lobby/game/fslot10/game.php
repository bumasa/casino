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
if( isset($_POST["mon"]) ){ $mon=$_POST["mon"]; }else{ $mon=0;}
$date=date("d.m.y");
$time=date("H:i:s");
$mx=array(1,2,3,4,5,6);
$mx2=array(1,1,1,1,2,2,2,2,3,3,3,3,4,4,4,4,5,5,5,5,6,6,6,6,6,7);
$row=mysql_fetch_array(mysql_query("select * from users where login='$l'"));
if ($bet<>0.2 && $bet<>1 && $bet<>5 && $bet<>10 && $bet<>50){ $mon=0;}
if ($row[3] < $bet){$mon=0;}
if ($row[3] < $allbet){$mon=0;}
if ($line > 3){$mon=0;}
$m_si=MD5(12);
if ($mon==0 or $mon==""){
echo "&spin=0&m_si=$m_si&cash=$row[3]";
}
if ($mon==1){
$win=0;
mysql_query("update users set cash=cash-'$allbet' where login='$l'");
mysql_query("update game_bank set bank=bank+'$allbet' where name='ttuz'");
shuffle($mx2);
$sim1=$mx2[0]; $sim2=$mx2[1]; $sim3=$mx2[2]; $sim4=$mx2[3];
shuffle($mx2);
$sim5=$mx2[0]; $sim6=$mx2[1]; $sim7=$mx2[2]; $sim8=$mx2[3];
shuffle($mx2); 
$sim9=$mx2[0]; $sim10=$mx2[1]; $sim11=$mx2[2]; $sim12=$mx2[3];
if ( ($sim5==1 or $sim5==7 ) && ($sim6==1 or $sim6==7) ){ $win1=$bet*3;}
if ( ($sim5==2 or $sim5==7 ) && ($sim6==2 or $sim6==7) ){ $win1=$bet*3;}
if ( ($sim5==3 or $sim5==7 ) && ($sim6==3 or $sim6==7) ){ $win1=$bet*3;}
if ( ($sim5==4 or $sim5==7 ) && ($sim6==4 or $sim6==7) ){ $win1=$bet*2;}
if ( ($sim5==5 or $sim5==7 ) && ($sim6==5 or $sim6==7) ){ $win1=$bet*2;}
if ( ($sim5==6 or $sim5==7 ) && ($sim6==6 or $sim6==7) ){ $win1=$bet*1;}
if ( ($sim5==1 or $sim5==7) && ($sim6==1 or $sim6==7) && ($sim7==1 or $sim7==7) ){ $win1=$bet*30;}
if ( ($sim5==2 or $sim5==7) && ($sim6==2 or $sim6==7) && ($sim7==2 or $sim7==7) ){ $win1=$bet*25;}
if ( ($sim5==3 or $sim5==7) && ($sim6==3 or $sim6==7) && ($sim7==3 or $sim7==7) ){ $win1=$bet*15;}
if ( ($sim5==4 or $sim5==7) && ($sim6==4 or $sim6==7) && ($sim7==4 or $sim7==7) ){ $win1=$bet*5;}
if ( ($sim5==5 or $sim5==7) && ($sim6==5 or $sim6==7) && ($sim7==5 or $sim7==7) ){ $win1=$bet*3;}
if ( ($sim5==6 or $sim5==7) && ($sim6==6 or $sim6==7) && ($sim7==6 or $sim7==7) ){ $win1=$bet*2;}
if ( ($sim5==1 or $sim5==7) && ($sim6==1 or $sim6==7) && ($sim7==1 or $sim7==7) && ($sim8==1 or $sim8==7) ){ $win1=$bet*300;}
if ( ($sim5==2 or $sim5==7) && ($sim6==2 or $sim6==7) && ($sim7==2 or $sim7==7) && ($sim8==2 or $sim8==7) ){ $win1=$bet*250;}
if ( ($sim5==3 or $sim5==7) && ($sim6==3 or $sim6==7) && ($sim7==3 or $sim7==7) && ($sim8==3 or $sim8==7) ){ $win1=$bet*150;}
if ( ($sim5==4 or $sim5==7) && ($sim6==4 or $sim6==7) && ($sim7==4 or $sim7==7) && ($sim8==4 or $sim8==7) ){ $win1=$bet*50;}
if ( ($sim5==5 or $sim5==7) && ($sim6==5 or $sim6==7) && ($sim7==5 or $sim7==7) && ($sim8==5 or $sim8==7) ){ $win1=$bet*25;}
if ( ($sim5==6 or $sim5==7) && ($sim6==6 or $sim6==7) && ($sim7==6 or $sim7==7) && ($sim8==6 or $sim8==7) ){ $win1=$bet*10;}
if ( $sim5==7 && $sim6==7 && $sim7==7 && $sim8==7 ){ $win1=$bet*300;}
if ( ($sim1==1 or $sim1==7 ) && ($sim2==1 or $sim2==7) ){ $win2=$bet*3;}
if ( ($sim1==2 or $sim1==7 ) && ($sim2==2 or $sim2==7) ){ $win2=$bet*3;}
if ( ($sim1==3 or $sim1==7 ) && ($sim2==3 or $sim2==7) ){ $win2=$bet*3;}
if ( ($sim1==4 or $sim1==7 ) && ($sim2==4 or $sim2==7) ){ $win2=$bet*2;}
if ( ($sim1==5 or $sim1==7 ) && ($sim2==5 or $sim2==7) ){ $win2=$bet*2;}
if ( ($sim1==6 or $sim1==7 ) && ($sim2==6 or $sim2==7) ){ $win2=$bet*1;}
if ( ($sim1==1 or $sim1==7) && ($sim2==1 or $sim2==7) && ($sim3==1 or $sim3==7) ){ $win2=$bet*30;}
if ( ($sim1==2 or $sim1==7) && ($sim2==2 or $sim2==7) && ($sim3==2 or $sim3==7) ){ $win2=$bet*25;}
if ( ($sim1==3 or $sim1==7) && ($sim2==3 or $sim2==7) && ($sim3==3 or $sim3==7) ){ $win2=$bet*15;}
if ( ($sim1==4 or $sim1==7) && ($sim2==4 or $sim2==7) && ($sim3==4 or $sim3==7) ){ $win2=$bet*5;}
if ( ($sim1==5 or $sim1==7) && ($sim2==5 or $sim2==7) && ($sim3==5 or $sim3==7) ){ $win2=$bet*3;}
if ( ($sim1==6 or $sim1==7) && ($sim2==6 or $sim2==7) && ($sim3==6 or $sim3==7) ){ $win2=$bet*2;}
if ( ($sim1==1 or $sim1==7) && ($sim2==1 or $sim2==7) && ($sim3==1 or $sim3==7) && ($sim4==1 or $sim4==7) ){ $win2=$bet*300;}
if ( ($sim1==2 or $sim1==7) && ($sim2==2 or $sim2==7) && ($sim3==2 or $sim3==7) && ($sim4==2 or $sim4==7) ){ $win2=$bet*250;}
if ( ($sim1==3 or $sim1==7) && ($sim2==3 or $sim2==7) && ($sim3==3 or $sim3==7) && ($sim4==3 or $sim4==7) ){ $win2=$bet*150;}
if ( ($sim1==4 or $sim1==7) && ($sim2==4 or $sim2==7) && ($sim3==4 or $sim3==7) && ($sim4==4 or $sim4==7) ){ $win2=$bet*50;}
if ( ($sim1==5 or $sim1==7) && ($sim2==5 or $sim2==7) && ($sim3==5 or $sim3==7) && ($sim4==5 or $sim4==7) ){ $win2=$bet*25;}
if ( ($sim1==6 or $sim1==7) && ($sim2==6 or $sim2==7) && ($sim3==6 or $sim3==7) && ($sim4==6 or $sim4==7) ){ $win2=$bet*10;}
if ( $sim1==7 && $sim2==7 && $sim3==7 && $sim4==7 ){ $win2=$bet*300;}
if ( ($sim9==1 or $sim9==7 ) && ($sim10==1 or $sim10==7) ){ $win3=$bet*3;}
if ( ($sim9==2 or $sim9==7 ) && ($sim10==2 or $sim10==7) ){ $win3=$bet*3;}
if ( ($sim9==3 or $sim9==7 ) && ($sim10==3 or $sim10==7) ){ $win3=$bet*3;}
if ( ($sim9==4 or $sim9==7 ) && ($sim10==4 or $sim10==7) ){ $win3=$bet*2;}
if ( ($sim9==5 or $sim9==7 ) && ($sim10==5 or $sim10==7) ){ $win3=$bet*2;}
if ( ($sim9==6 or $sim9==7 ) && ($sim10==6 or $sim10==7) ){ $win3=$bet*1;}
if ( ($sim9==1 or $sim9==7) && ($sim10==1 or $sim10==7) && ($sim11==1 or $sim11==7) ){ $win3=$bet*30;}
if ( ($sim9==2 or $sim9==7) && ($sim10==2 or $sim10==7) && ($sim11==2 or $sim11==7) ){ $win3=$bet*25;}
if ( ($sim9==3 or $sim9==7) && ($sim10==3 or $sim10==7) && ($sim11==3 or $sim11==7) ){ $win3=$bet*15;}
if ( ($sim9==4 or $sim9==7) && ($sim10==4 or $sim10==7) && ($sim11==4 or $sim11==7) ){ $win3=$bet*5;}
if ( ($sim9==5 or $sim9==7) && ($sim10==5 or $sim10==7) && ($sim11==5 or $sim11==7) ){ $win3=$bet*3;}
if ( ($sim9==6 or $sim9==7) && ($sim10==6 or $sim10==7) && ($sim11==6 or $sim11==7) ){ $win3=$bet*2;}
if ( ($sim9==1 or $sim9==7) && ($sim10==1 or $sim10==7) && ($sim11==1 or $sim11==7) && ($sim12==1 or $sim12==7) ){ $win3=$bet*300;}
if ( ($sim9==2 or $sim9==7) && ($sim10==2 or $sim10==7) && ($sim11==2 or $sim11==7) && ($sim12==2 or $sim12==7) ){ $win3=$bet*250;}
if ( ($sim9==3 or $sim9==7) && ($sim10==3 or $sim10==7) && ($sim11==3 or $sim11==7) && ($sim12==3 or $sim12==7) ){ $win3=$bet*150;}
if ( ($sim9==4 or $sim9==7) && ($sim10==4 or $sim10==7) && ($sim11==4 or $sim11==7) && ($sim12==4 or $sim12==7) ){ $win3=$bet*50;}
if ( ($sim9==5 or $sim9==7) && ($sim10==5 or $sim10==7) && ($sim11==5 or $sim11==7) && ($sim12==5 or $sim12==7) ){ $win3=$bet*25;}
if ( ($sim9==6 or $sim9==7) && ($sim10==6 or $sim10==7) && ($sim11==6 or $sim11==7) && ($sim12==6 or $sim12==7) ){ $win3=$bet*10;}
if ( $sim9==7 && $sim10==7 && $sim11==7 && $sim12==7 ){ $win3=$bet*300;}
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
mysql_query("INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[3]','$allbet','$win','Mega Ant')");
$row=mysql_fetch_array(mysql_query("select * from users where login='$l'"));
echo"&win1=$win1&win2=$win2&win3=$win3";
echo "&mps1=$sim1&mps2=$sim2&mps3=$sim3&mps4=$sim4&mps5=$sim5&mps6=$sim6&mps7=$sim7&mps8=$sim8&mps9=$sim9&mps10=$sim10&mps11=$sim11&mps12=$sim12";
echo "&cash_new=$row[3]";
echo "&win_new=$win";
echo "&spin=1&m_si=$m_si";
}
?>