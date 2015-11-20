<?php

error_reporting(0);
session_start();
$l=$_SESSION['l'];
if(!isset($l)){ header("Location: ../index.php"); exit; }
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

function winlimit( $bet )
{
    $rowb = mysql_fetch_array( mysql_query( "select * from game_bank where name='ttuz'" ) );
    $caswin = $rowb['bank'] / 100 * $rowb['proc'];
    if ( $bet < 1 )
    {
        $caswin /= 16;
    }
    if ( 1 <= $bet && $bet <= 3 )
    {
        $caswin /= 8;
    }
    if ( 5 <= $bet && $bet <= 15 )
    {
        $caswin /= 4;
    }
    if ( 10 <= $bet && $bet <= 30 )
    {
        $caswin /= 2;
    }
    if ( 50 <= $bet && $bet <= 150 )
    {
        $caswin /= 1;
    }
    return $caswin;
}

function winlimit2( )
{
    $rowb = mysql_fetch_array( mysql_query( "select * from game_bank where name='ttuz'" ) );
    $caswin = $rowb['bank'] / 100 * $rowb['proc'];
    return $caswin;
}



error_reporting( 0 );
unset( $l );
session_start( );
$l = $_SESSION['l'];
if ( !isset( $l ) )
{
    header( "Location: ../../login.php" );
    exit( );
}
include( "../../../setup.php" );
if ( isset( $_POST['mon'] ) )
{
    $mon = $_POST['mon'];
}
else
{
    $mon = 0;
}
if ( $mon != 2 )
{
    if ( isset( $_POST['bet'] ) )
    {
        $bet = $_POST['bet'];
    }
    else
    {
        $bet = "1";
        $mon = 0;
    }
    if ( isset( $_POST['line'] ) )
    {
        $line = $_POST['line'];
    }
    else
    {
        $line = "1";
        $mon = 0;
    }
}
$bon = 0;
$date = date( "d.m.y" );
$time = date( "H:i:s" );
$mx = array( 1, 2, 3, 4, 5, 6 );
$mx3 = array( 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12 );
$row_bon = mysql_fetch_array( mysql_query( "select * from g_set where g_name='aquaslot'" ) );
$g_rezim = $row_bon['g_rezim'];
if ( $g_rezim == 1 )
{
    $mx2 = array( 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 8, 8 );
}
if ( $g_rezim == 2 )
{
    $mx2 = array( 1, 1, 1, 1, 2, 2, 2, 2, 3, 3, 3, 3, 4, 4, 4, 4, 5, 5, 5, 5, 6, 6, 6, 6, 7, 7, 7, 7, 8, 8 );
}
if ( $g_rezim == 3 )
{
    $mx2 = array( 1, 1, 1, 2, 2, 2, 3, 3, 3, 4, 4, 4, 5, 5, 5, 6, 6, 6, 8 );
}
$row = mysql_fetch_array( mysql_query( "select * from users where login='".$l."'" ) );
if ( $mon != 2 )
{
    if ( $bet < 0 )
    {
        $bet = 1;
        $mon = 0;
    }
    if ( $bet != 0.2 && $bet != 1 && $bet != 5 && $bet != 10 && $bet != 50 )
    {
        $mon = 0;
    }
    if ( $row[3] < $bet )
    {
        $mon = 0;
    }
    if ( 3 < $line || $line < 1 )
    {
        $mon = 0;
    }
}
if ( $mon == 0 || $mon == "" )
{
    unset( $_SESSION['count'] );
    unset( $_SESSION['bbet'] );
    unset( $_SESSION['bonwin'] );
    echo "&spin=0&cash=".$row['3'];
}
if ( $mon == 1 )
{
    $win1 = 0;
    $win2 = 0;
    $win3 = 0;
    $win = $win1 + $win2 + $win3;
    $allbet = $line * $bet;
    mysql_query( "update users set cash=cash-'".$allbet."' where login='{$l}'" );
    mysql_query( "update game_bank set bank=bank+'".$allbet."' where name='ttuz'" );
    shuffle( $mx2 );
    $sim1 = $mx2[1];
    $sim2 = $mx2[2];
    $sim3 = $mx2[3];
    $sim4 = $mx2[4];
    $sim5 = $mx2[5];
    $sim6 = $mx2[6];
    $sim7 = $mx2[7];
    $sim8 = $mx2[8];
    $sim9 = $mx2[9];
    $sim10 = $mx2[10];
    $sim11 = $mx2[11];
    $sim12 = $mx2[12];
    if ( ( $sim5 == 6 || $sim5 == 7 ) && ( $sim6 == 6 || $sim6 == 7 ) )
    {
        $win1 = $bet * 1;
    }
    if ( ( $sim5 == 5 || $sim5 == 7 ) && ( $sim6 == 5 || $sim6 == 7 ) )
    {
        $win1 = $bet * 1;
    }
    if ( ( $sim5 == 4 || $sim5 == 7 ) && ( $sim6 == 4 || $sim6 == 7 ) )
    {
        $win1 = $bet * 1;
    }
    if ( ( $sim5 == 3 || $sim5 == 7 ) && ( $sim6 == 3 || $sim6 == 7 ) )
    {
        $win1 = $bet * 2;
    }
    if ( ( $sim5 == 2 || $sim5 == 7 ) && ( $sim6 == 2 || $sim6 == 7 ) )
    {
        $win1 = $bet * 2;
    }
    if ( ( $sim5 == 1 || $sim5 == 7 ) && ( $sim6 == 1 || $sim6 == 7 ) )
    {
        $win1 = $bet * 2;
    }
    if ( ( $sim5 == 6 || $sim5 == 7 ) && ( $sim6 == 6 || $sim6 == 7 ) && ( $sim7 == 6 || $sim7 == 7 ) )
    {
        $win1 = $bet * 3;
    }
    if ( ( $sim5 == 5 || $sim5 == 7 ) && ( $sim6 == 5 || $sim6 == 7 ) && ( $sim7 == 5 || $sim7 == 7 ) )
    {
        $win1 = $bet * 5;
    }
    if ( ( $sim5 == 4 || $sim5 == 7 ) && ( $sim6 == 4 || $sim6 == 7 ) && ( $sim7 == 4 || $sim7 == 7 ) )
    {
        $win1 = $bet * 5;
    }
    if ( ( $sim5 == 3 || $sim5 == 7 ) && ( $sim6 == 3 || $sim6 == 7 ) && ( $sim7 == 3 || $sim7 == 7 ) )
    {
        $win1 = $bet * 10;
    }
    if ( ( $sim5 == 2 || $sim5 == 7 ) && ( $sim6 == 2 || $sim6 == 7 ) && ( $sim7 == 2 || $sim7 == 7 ) )
    {
        $win1 = $bet * 15;
    }
    if ( ( $sim5 == 1 || $sim5 == 7 ) && ( $sim6 == 1 || $sim6 == 7 ) && ( $sim7 == 1 || $sim7 == 7 ) )
    {
        $win1 = $bet * 20;
    }
    if ( ( $sim5 == 6 || $sim5 == 7 ) && ( $sim6 == 6 || $sim6 == 7 ) && ( $sim7 == 6 || $sim7 == 7 ) && ( $sim8 == 6 || $sim8 == 7 ) )
    {
        $win1 = $bet * 10;
    }
    if ( ( $sim5 == 5 || $sim5 == 7 ) && ( $sim6 == 5 || $sim6 == 7 ) && ( $sim7 == 5 || $sim7 == 7 ) && ( $sim8 == 5 || $sim8 == 7 ) )
    {
        $win1 = $bet * 25;
    }
    if ( ( $sim5 == 4 || $sim5 == 7 ) && ( $sim6 == 4 || $sim6 == 7 ) && ( $sim7 == 4 || $sim7 == 7 ) && ( $sim8 == 4 || $sim8 == 7 ) )
    {
        $win1 = $bet * 50;
    }
    if ( ( $sim5 == 3 || $sim5 == 7 ) && ( $sim6 == 3 || $sim6 == 7 ) && ( $sim7 == 3 || $sim7 == 7 ) && ( $sim8 == 3 || $sim8 == 7 ) )
    {
        $win1 = $bet * 100;
    }
    if ( ( $sim5 == 2 || $sim5 == 7 ) && ( $sim6 == 2 || $sim6 == 7 ) && ( $sim7 == 2 || $sim7 == 7 ) && ( $sim8 == 2 || $sim8 == 7 ) )
    {
        $win1 = $bet * 150;
    }
    if ( ( $sim5 == 1 || $sim5 == 7 ) && ( $sim6 == 1 || $sim6 == 7 ) && ( $sim7 == 1 || $sim7 == 7 ) && ( $sim8 == 1 || $sim8 == 7 ) )
    {
        $win1 = $bet * 200;
    }
    if ( $sim5 == 7 && $sim6 == 7 && $sim7 == 7 && $sim8 == 7 )
    {
        $win1 = $bet * 200;
    }
    if ( ( $sim1 == 6 || $sim1 == 7 ) && ( $sim2 == 6 || $sim2 == 7 ) )
    {
        $win2 = $bet * 1;
    }
    if ( ( $sim1 == 5 || $sim1 == 7 ) && ( $sim2 == 5 || $sim2 == 7 ) )
    {
        $win2 = $bet * 1;
    }
    if ( ( $sim1 == 4 || $sim1 == 7 ) && ( $sim2 == 4 || $sim2 == 7 ) )
    {
        $win2 = $bet * 1;
    }
    if ( ( $sim1 == 3 || $sim1 == 7 ) && ( $sim2 == 3 || $sim2 == 7 ) )
    {
        $win2 = $bet * 2;
    }
    if ( ( $sim1 == 2 || $sim1 == 7 ) && ( $sim2 == 2 || $sim2 == 7 ) )
    {
        $win2 = $bet * 2;
    }
    if ( ( $sim1 == 1 || $sim1 == 7 ) && ( $sim2 == 1 || $sim2 == 7 ) )
    {
        $win2 = $bet * 2;
    }
    if ( ( $sim1 == 6 || $sim1 == 7 ) && ( $sim2 == 6 || $sim2 == 7 ) && ( $sim3 == 6 || $sim3 == 7 ) )
    {
        $win2 = $bet * 3;
    }
    if ( ( $sim1 == 5 || $sim1 == 7 ) && ( $sim2 == 5 || $sim2 == 7 ) && ( $sim3 == 5 || $sim3 == 7 ) )
    {
        $win2 = $bet * 5;
    }
    if ( ( $sim1 == 4 || $sim1 == 7 ) && ( $sim2 == 4 || $sim2 == 7 ) && ( $sim3 == 4 || $sim3 == 7 ) )
    {
        $win2 = $bet * 5;
    }
    if ( ( $sim1 == 3 || $sim1 == 7 ) && ( $sim2 == 3 || $sim2 == 7 ) && ( $sim3 == 3 || $sim3 == 7 ) )
    {
        $win2 = $bet * 10;
    }
    if ( ( $sim1 == 2 || $sim1 == 7 ) && ( $sim2 == 2 || $sim2 == 7 ) && ( $sim3 == 2 || $sim3 == 7 ) )
    {
        $win2 = $bet * 15;
    }
    if ( ( $sim1 == 1 || $sim1 == 7 ) && ( $sim2 == 1 || $sim2 == 7 ) && ( $sim3 == 1 || $sim3 == 7 ) )
    {
        $win2 = $bet * 20;
    }
    if ( ( $sim1 == 6 || $sim1 == 7 ) && ( $sim2 == 6 || $sim2 == 7 ) && ( $sim3 == 6 || $sim3 == 7 ) && ( $sim4 == 6 || $sim4 == 7 ) )
    {
        $win2 = $bet * 10;
    }
    if ( ( $sim1 == 5 || $sim1 == 7 ) && ( $sim2 == 5 || $sim2 == 7 ) && ( $sim3 == 5 || $sim3 == 7 ) && ( $sim4 == 5 || $sim4 == 7 ) )
    {
        $win2 = $bet * 25;
    }
    if ( ( $sim1 == 4 || $sim1 == 7 ) && ( $sim2 == 4 || $sim2 == 7 ) && ( $sim3 == 4 || $sim3 == 7 ) && ( $sim4 == 4 || $sim4 == 7 ) )
    {
        $win2 = $bet * 50;
    }
    if ( ( $sim1 == 3 || $sim1 == 7 ) && ( $sim2 == 3 || $sim2 == 7 ) && ( $sim3 == 3 || $sim3 == 7 ) && ( $sim4 == 3 || $sim4 == 7 ) )
    {
        $win2 = $bet * 100;
    }
    if ( ( $sim1 == 2 || $sim1 == 7 ) && ( $sim2 == 2 || $sim2 == 7 ) && ( $sim3 == 2 || $sim3 == 7 ) && ( $sim4 == 2 || $sim4 == 7 ) )
    {
        $win2 = $bet * 150;
    }
    if ( ( $sim1 == 1 || $sim1 == 7 ) && ( $sim2 == 1 || $sim2 == 7 ) && ( $sim3 == 1 || $sim3 == 7 ) && ( $sim4 == 1 || $sim4 == 7 ) )
    {
        $win2 = $bet * 200;
    }
    if ( $sim1 == 7 && $sim2 == 7 && $sim3 == 7 && $sim4 == 7 )
    {
        $win2 = $bet * 200;
    }
    if ( ( $sim9 == 6 || $sim9 == 7 ) && ( $sim10 == 6 || $sim10 == 7 ) )
    {
        $win3 = $bet * 1;
    }
    if ( ( $sim9 == 5 || $sim9 == 7 ) && ( $sim10 == 5 || $sim10 == 7 ) )
    {
        $win3 = $bet * 1;
    }
    if ( ( $sim9 == 4 || $sim9 == 7 ) && ( $sim10 == 4 || $sim10 == 7 ) )
    {
        $win3 = $bet * 1;
    }
    if ( ( $sim9 == 3 || $sim9 == 7 ) && ( $sim10 == 3 || $sim10 == 7 ) )
    {
        $win3 = $bet * 2;
    }
    if ( ( $sim9 == 2 || $sim9 == 7 ) && ( $sim10 == 2 || $sim10 == 7 ) )
    {
        $win3 = $bet * 2;
    }
    if ( ( $sim9 == 1 || $sim9 == 7 ) && ( $sim10 == 1 || $sim10 == 7 ) )
    {
        $win3 = $bet * 2;
    }
    if ( ( $sim9 == 6 || $sim9 == 7 ) && ( $sim10 == 6 || $sim10 == 7 ) && ( $sim11 == 6 || $sim11 == 7 ) )
    {
        $win3 = $bet * 3;
    }
    if ( ( $sim9 == 5 || $sim9 == 7 ) && ( $sim10 == 5 || $sim10 == 7 ) && ( $sim11 == 5 || $sim11 == 7 ) )
    {
        $win3 = $bet * 5;
    }
    if ( ( $sim9 == 4 || $sim9 == 7 ) && ( $sim10 == 4 || $sim10 == 7 ) && ( $sim11 == 4 || $sim11 == 7 ) )
    {
        $win3 = $bet * 5;
    }
    if ( ( $sim9 == 3 || $sim9 == 7 ) && ( $sim10 == 3 || $sim10 == 7 ) && ( $sim11 == 3 || $sim11 == 7 ) )
    {
        $win3 = $bet * 10;
    }
    if ( ( $sim9 == 2 || $sim9 == 7 ) && ( $sim10 == 2 || $sim10 == 7 ) && ( $sim11 == 2 || $sim11 == 7 ) )
    {
        $win3 = $bet * 15;
    }
    if ( ( $sim9 == 1 || $sim9 == 7 ) && ( $sim10 == 1 || $sim10 == 7 ) && ( $sim11 == 1 || $sim11 == 7 ) )
    {
        $win3 = $bet * 20;
    }
    if ( ( $sim9 == 6 || $sim9 == 7 ) && ( $sim10 == 6 || $sim10 == 7 ) && ( $sim11 == 6 || $sim11 == 7 ) && ( $sim12 == 6 || $sim12 == 7 ) )
    {
        $win3 = $bet * 10;
    }
    if ( ( $sim9 == 5 || $sim9 == 7 ) && ( $sim10 == 5 || $sim10 == 7 ) && ( $sim11 == 5 || $sim11 == 7 ) && ( $sim12 == 5 || $sim12 == 7 ) )
    {
        $win3 = $bet * 25;
    }
    if ( ( $sim9 == 4 || $sim9 == 7 ) && ( $sim10 == 4 || $sim10 == 7 ) && ( $sim11 == 4 || $sim11 == 7 ) && ( $sim12 == 4 || $sim12 == 7 ) )
    {
        $win3 = $bet * 50;
    }
    if ( ( $sim9 == 3 || $sim9 == 7 ) && ( $sim10 == 3 || $sim10 == 7 ) && ( $sim11 == 3 || $sim11 == 7 ) && ( $sim12 == 3 || $sim12 == 7 ) )
    {
        $win3 = $bet * 100;
    }
    if ( ( $sim9 == 2 || $sim9 == 7 ) && ( $sim10 == 2 || $sim10 == 7 ) && ( $sim11 == 2 || $sim11 == 7 ) && ( $sim12 == 2 || $sim12 == 7 ) )
    {
        $win3 = $bet * 150;
    }
    if ( ( $sim9 == 1 || $sim9 == 7 ) && ( $sim10 == 1 || $sim10 == 7 ) && ( $sim11 == 1 || $sim11 == 7 ) && ( $sim12 == 1 || $sim12 == 7 ) )
    {
        $win3 = $bet * 200;
    }
    if ( $sim9 == 7 && $sim10 == 7 && $sim11 == 7 && $sim12 == 7 )
    {
        $win3 = $bet * 200;
    }
    if ( $line == 1 )
    {
        $win2 = 0;
        $win3 = 0;
    }
    if ( $line == 2 )
    {
        $win3 = 0;
    }
    $win = $win1 + $win2 + $win3;
    $caswin = winlimit( $bet );
    if ( $caswin <= $win )
    {
        $win1 = 0;
        $win2 = 0;
        $win3 = 0;
        $win = $win1 + $win2 + $win3;
        $nobonus = 1;
        if ( $line == 1 )
        {
            shuffle( $mx );
            $sim5 = $mx[0];
            $sim6 = $mx[1];
            $sim7 = $mx[2];
            $sim8 = $mx[3];
        }
        if ( $line == 2 )
        {
            shuffle( $mx );
            $sim1 = $mx[0];
            $sim2 = $mx[1];
            $sim3 = $mx[2];
            $sim4 = $mx[3];
            shuffle( $mx );
            $sim5 = $mx[0];
            $sim6 = $mx[1];
            $sim7 = $mx[2];
            $sim8 = $mx[3];
        }
        if ( $line == 3 )
        {
            shuffle( $mx );
            $sim1 = $mx[0];
            $sim2 = $mx[1];
            $sim3 = $mx[2];
            $sim4 = $mx[3];
            shuffle( $mx );
            $sim5 = $mx[0];
            $sim6 = $mx[1];
            $sim7 = $mx[2];
            $sim8 = $mx[3];
            shuffle( $mx );
            $sim9 = $mx[0];
            $sim10 = $mx[1];
            $sim11 = $mx[2];
            $sim12 = $mx[3];
        }
    }
    $row_bon = mysql_fetch_array( mysql_query( "select * from g_set where g_name='aquaslot'" ) );
    $testbon2 = $row_bon['g_shansbon'];
    $testbon = rand( 1, $testbon2 );
    if ( $nobonus != 1 && $testbon == 1 )
    {
        unset( $_SESSION['count'] );
        $_SESSION['bbet'] = $allbet;
        $win1 = 0;
        $win2 = 0;
        $win3 = 0;
        $win = $win1 + $win2 + $win3;
        $bon = 1;
        shuffle( $mx );
        $sim1 = $mx[0];
        $sim2 = $mx[1];
        $sim3 = $mx[2];
        $sim4 = $mx[3];
        shuffle( $mx );
        $sim5 = $mx[0];
        $sim6 = $mx[1];
        $sim7 = $mx[2];
        $sim8 = $mx[3];
        shuffle( $mx );
        $sim9 = $mx[0];
        $sim10 = $mx[1];
        $sim11 = $mx[2];
        $sim12 = $mx[3];
        shuffle( $mx3 );
        ${ "sim".$mx3[1] } = 8;
        ${ "sim".$mx3[2] } = 8;
        ${ "sim".$mx3[3] } = 8;
    }
    if ( 0 < $win )
    {
        mysql_query( "update users set cash=cash+'".$win."' where login='{$l}'" );
        mysql_query( "update game_bank set bank=bank-'".$win."' where name='ttuz'" );
    }
    mysql_query( "INSERT INTO stat_game VALUES('NULL','".$date."','{$time}','{$l}','{$row['3']}','{$allbet}','{$win}','AquaSlot')" );
    $row = mysql_fetch_array( mysql_query( "select * from users where login='".$l."'" ) );
    echo "&win1=".$win1."&win2={$win2}&win3={$win3}";
    echo "&mp1=".$sim1."&mp2={$sim2}&mp3={$sim3}&mp4={$sim4}&mp5={$sim5}&mp6={$sim6}&mp7={$sim7}&mp8={$sim8}&mp9={$sim9}&mp10={$sim10}&mp11={$sim11}&mp12={$sim12}";
    echo "&cash_new=".$row['3']."&win_new={$win}&spin=1&bon={$bon}";
}
if ( $mon == 2 )
{
    $count = $_SESSION['count'];
    $count += 1;
    $_SESSION['count'] = $count;
    $row_bon = mysql_fetch_array( mysql_query( "select * from g_set where g_name='aquaslot'" ) );
    $g_bon_min = $row_bon['g_bon_min'];
    $g_bon_max = $row_bon['g_bon_max'];
    $bbet = $_SESSION['bbet'];
    $mytxt1 = rand( $g_bon_min, $g_bon_max ) * $bbet;
    $mytxt = sprintf( "%01.2f", $mytxt1 );
    $caswin = winlimit2( );
    if ( $caswin <= $mytxt1 )
    {
        $count = 6;
        $bonwin0 = 0;
        $mytxt = 0;
    }
    $countstop = rand( 2, 5 );
    if ( $countstop <= $count )
    {
        $mytxt = 0;
        unset( $_SESSION['count'] );
        unset( $_SESSION['bbet'] );
        unset( $_SESSION['bonwin'] );
    }
    $bonwin0 = $mytxt;
    if ( 0 < $bonwin0 )
    {
        $bonwin = $_SESSION['bonwin'];
        $bonwin += $bonwin0;
        $_SESSION['bonwin'] = $bonwin;
        mysql_query( "update users set cash=cash+'".$bonwin0."' where login='{$l}'" );
        mysql_query( "update game_bank set bank=bank-'".$bonwin0."' where name='ttuz'" );
    }
    $row = mysql_fetch_array( mysql_query( "select * from users where login='".$l."'" ) );
    if ( 0 < $bonwin0 )
    {
        mysql_query( "INSERT INTO stat_game VALUES('NULL','".$date."','{$time}','{$l}','{$row['3']}','{$bbet}','{$bonwin0}','AquaSlot_BONUS')" );
    }
    echo "&mytxt=".$mytxt;
    echo "&win_new=".$bonwin;
    echo "&cash_new=".$row['3'];
}
?>
