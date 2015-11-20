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
$mx=array(1,2,3,4,5,6,7);
$mx2=array(1,1,1,1,2,2,2,2,3,3,3,3,4,4,4,4,5,5,5,5,6,6,6,6,7,6,7,7,6,7,6,7,6,7,7,7);
$row=mysql_fetch_array(mysql_query("select * from users where login='$l'"));
if ($bet<>0.2 && $bet<>1 && $bet<>5 && $bet<>10 && $bet<>50){ $mon=0;}
if ($row[3] < $bet){$mon=0;}
if ($row[3] < $allbet){$mon=0;}
if ($line > 3){$mon=0;}
if ($mon==0 or $mon==""){
echo "&spin=0&cash=$row[3]";
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
if ( $sim5==2 && $sim6==2){ $win1=$bet*2;}
if ( $sim5==3 && $sim6==3){ $win1=$bet*2;}
if ( $sim5==4 && $sim6==4){ $win1=$bet*2;}
if ( $sim5==5 && $sim6==5){ $win1=$bet*1;}
if ( $sim5==6 && $sim6==6){ $win1=$bet*1;}
if ( $sim5==7 && $sim6==7){ $win1=$bet*1;}
if ( $sim5==2 && $sim6==2 && $sim7==2){ $win1=$bet*20;}
if ( $sim5==3 && $sim6==3 && $sim7==3){ $win1=$bet*15;}
if ( $sim5==4 && $sim6==4 && $sim7==4){ $win1=$bet*10;}
if ( $sim5==5 && $sim6==5 && $sim7==5){ $win1=$bet*5;}
if ( $sim5==6 && $sim6==6 && $sim7==6){ $win1=$bet*5;}
if ( $sim5==7 && $sim6==7 && $sim7==7){ $win1=$bet*3;}
if ( $sim5==1 && $sim6==1 && $sim7==1 && $sim8==1){ $win1=$bet*250;}
if ( $sim5==2 && $sim6==2 && $sim7==2 && $sim8==2){ $win1=$bet*200;}
if ( $sim5==3 && $sim6==3 && $sim7==3 && $sim8==3){ $win1=$bet*150;}
if ( $sim5==4 && $sim6==4 && $sim7==4 && $sim8==4){ $win1=$bet*100;}
if ( $sim5==5 && $sim6==5 && $sim7==5 && $sim8==5){ $win1=$bet*50;}
if ( $sim5==6 && $sim6==6 && $sim7==6 && $sim8==6){ $win1=$bet*25;}
if ( $sim5==7 && $sim6==7 && $sim7==7 && $sim8==7){ $win1=$bet*10;}
if ( $sim1==2 && $sim2==2){ $win2=$bet*2;}
if ( $sim1==3 && $sim2==3){ $win2=$bet*2;}
if ( $sim1==4 && $sim2==4){ $win2=$bet*2;}
if ( $sim1==5 && $sim2==5){ $win2=$bet*1;}
if ( $sim1==6 && $sim2==6){ $win2=$bet*1;}
if ( $sim1==7 && $sim2==7){ $win2=$bet*1;}
if ( $sim1==2 && $sim2==2 && $sim3==2){ $win2=$bet*20;}
if ( $sim1==3 && $sim2==3 && $sim3==3){ $win2=$bet*15;}
if ( $sim1==4 && $sim2==4 && $sim3==4){ $win2=$bet*10;}
if ( $sim1==5 && $sim2==5 && $sim3==5){ $win2=$bet*5;}
if ( $sim1==6 && $sim2==6 && $sim3==6){ $win2=$bet*5;}
if ( $sim1==7 && $sim2==7 && $sim3==7){ $win2=$bet*3;}
if ( $sim1==1 && $sim2==1 && $sim3==1 && $sim4==1){ $win2=$bet*250;}
if ( $sim1==2 && $sim2==2 && $sim3==2 && $sim4==2){ $win2=$bet*200;}
if ( $sim1==3 && $sim2==3 && $sim3==3 && $sim4==3){ $win2=$bet*150;}
if ( $sim1==4 && $sim2==4 && $sim3==4 && $sim4==4){ $win2=$bet*100;}
if ( $sim1==5 && $sim2==5 && $sim3==5 && $sim4==5){ $win2=$bet*50;}
if ( $sim1==6 && $sim2==6 && $sim3==6 && $sim4==6){ $win2=$bet*25;}
if ( $sim1==7 && $sim2==7 && $sim3==7 && $sim4==7){ $win2=$bet*10;}
if ($sim9==2 && $sim10==2){ $win3=$bet*2;}
if ($sim9==3 && $sim10==3){ $win3=$bet*2;}
if ($sim9==4 && $sim10==4){ $win3=$bet*2;}
if ($sim9==5 && $sim10==5){ $win3=$bet*1;}
if ($sim9==6 && $sim10==6){ $win3=$bet*1;}
if ($sim9==7 && $sim10==7){ $win3=$bet*1;}
if ($sim9==2 && $sim10==2 && $sim11==2){ $win3=$bet*20;}
if ($sim9==3 && $sim10==3 && $sim11==3){ $win3=$bet*15;}
if ($sim9==4 && $sim10==4 && $sim11==4){ $win3=$bet*10;}
if ($sim9==5 && $sim10==5 && $sim11==5){ $win3=$bet*5;}
if ($sim9==6 && $sim10==6 && $sim11==6){ $win3=$bet*5;}
if ($sim9==7 && $sim10==7 && $sim11==7){ $win3=$bet*3;}
if ($sim9==1 && $sim10==1 && $sim11==1 && $sim12==1){ $win3=$bet*250;}
if ($sim9==2 && $sim10==2 && $sim11==2 && $sim12==2){ $win3=$bet*200;}
if ($sim9==3 && $sim10==3 && $sim11==3 && $sim12==3){ $win3=$bet*150;}
if ($sim9==4 && $sim10==4 && $sim11==4 && $sim12==4){ $win3=$bet*100;}
if ($sim9==5 && $sim10==5 && $sim11==5 && $sim12==5){ $win3=$bet*50;}
if ($sim9==6 && $sim10==6 && $sim11==6 && $sim12==6){ $win3=$bet*25;}
if ($sim9==7 && $sim10==7 && $sim11==7 && $sim12==7){ $win3=$bet*10;}
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
mysql_query("INSERT INTO stat_game VALUES('NULL','$date','$time','$l','$row[3]','$allbet','$win','BELKA')");
$row=mysql_fetch_array(mysql_query("select * from users where login='$l'"));
echo "&ppx1=$sim1&ppx2=$sim2&ppx3=$sim3&ppx4=$sim4&ppx5=$sim5&ppx6=$sim6&ppx7=$sim7&ppx8=$sim8&ppx9=$sim9&ppx10=$sim10&ppx11=$sim11&ppx12=$sim12";
echo "&cash_new=$row[3]";
echo "&win_new=$win";
echo "&spin=1";
}
?>