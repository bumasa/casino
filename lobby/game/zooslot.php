<?php

function winlimit( $bet1 )
{
  



    $temp1 = mysql_fetch_array( mysql_query( "select * from game_bank where name='ttuz'" ) );



    $temp2 = $temp1['bank'] / 100 * $temp1['proc'];
    if ( $bet1 < 1 )
    {
        $temp2 /= 16;
    }
    if ( 1 <= $bet1 && $bet1 <= 3 )
    {
        $temp2 /= 8;
    }
    if ( 5 <= $bet1 && $bet1 <= 15 )
    {
        $temp2 /= 4;
    }
    if ( 10 <= $bet1 && $bet1 <= 30 )
    {
        $temp2 /= 2;
    }
    if ( 50 <= $bet1 && $bet1 <= 150 )
    {
        $temp2 /= 1;
    }
    return $temp2;
}




function winlimit2()
{



 $resultb=mysql_query("select * from game_bank where name='ttuz'");


$rowb=mysql_fetch_array($resultb);
$bank = $rowb[1];
$proc = $rowb[2];
$caswin = $bank/100*$proc;
      return $caswin;
}



error_reporting( 0 );
unset( $l );
session_start( );
$l = $_SESSION['l'];
if ( !isset( $l ) )
{
    header( "Location: ../../../login.php" );
    exit( );
}

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
    $spin = rand( 1, 10 );
    echo "&spin=".$spin."&cash={$row['3']}&stgame=1";
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


    shuffle( &$mx2 );
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
        $win1 = $bet * 3;
    }
    if ( ( $sim5 == 2 || $sim5 == 7 ) && ( $sim6 == 2 || $sim6 == 7 ) )
    {
        $win1 = $bet * 3;
    }
    if ( ( $sim5 == 1 || $sim5 == 7 ) && ( $sim6 == 1 || $sim6 == 7 ) )
    {
        $win1 = $bet * 3;
    }
    if ( ( $sim5 == 6 || $sim5 == 7 ) && ( $sim6 == 6 || $sim6 == 7 ) && ( $sim7 == 6 || $sim7 == 7 ) )
    {
        $win1 = $bet * 5;
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
        $win1 = $bet * 20;
    }
    if ( ( $sim5 == 1 || $sim5 == 7 ) && ( $sim6 == 1 || $sim6 == 7 ) && ( $sim7 == 1 || $sim7 == 7 ) )
    {
        $win1 = $bet * 30;
    }
    if ( ( $sim5 == 6 || $sim5 == 7 ) && ( $sim6 == 6 || $sim6 == 7 ) && ( $sim7 == 6 || $sim7 == 7 ) && ( $sim8 == 6 || $sim8 == 7 ) )
    {
        $win1 = $bet * 20;
    }
    if ( ( $sim5 == 5 || $sim5 == 7 ) && ( $sim6 == 5 || $sim6 == 7 ) && ( $sim7 == 5 || $sim7 == 7 ) && ( $sim8 == 5 || $sim8 == 7 ) )
    {
        $win1 = $bet * 30;
    }
    if ( ( $sim5 == 4 || $sim5 == 7 ) && ( $sim6 == 4 || $sim6 == 7 ) && ( $sim7 == 4 || $sim7 == 7 ) && ( $sim8 == 4 || $sim8 == 7 ) )
    {
        $win1 = $bet * 40;
    }
    if ( ( $sim5 == 3 || $sim5 == 7 ) && ( $sim6 == 3 || $sim6 == 7 ) && ( $sim7 == 3 || $sim7 == 7 ) && ( $sim8 == 3 || $sim8 == 7 ) )
    {
        $win1 = $bet * 100;
    }
    if ( ( $sim5 == 2 || $sim5 == 7 ) && ( $sim6 == 2 || $sim6 == 7 ) && ( $sim7 == 2 || $sim7 == 7 ) && ( $sim8 == 2 || $sim8 == 7 ) )
    {
        $win1 = $bet * 200;
    }
    if ( ( $sim5 == 1 || $sim5 == 7 ) && ( $sim6 == 1 || $sim6 == 7 ) && ( $sim7 == 1 || $sim7 == 7 ) && ( $sim8 == 1 || $sim8 == 7 ) )
    {
        $win1 = $bet * 300;
    }
    if ( $sim5 == 7 && $sim6 == 7 && $sim7 == 7 && $sim8 == 7 )
    {
        $win1 = $bet * 300;
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
        $win2 = $bet * 3;
    }
    if ( ( $sim1 == 2 || $sim1 == 7 ) && ( $sim2 == 2 || $sim2 == 7 ) )
    {
        $win2 = $bet * 3;
    }
    if ( ( $sim1 == 1 || $sim1 == 7 ) && ( $sim2 == 1 || $sim2 == 7 ) )
    {
        $win2 = $bet * 3;
    }
    if ( ( $sim1 == 6 || $sim1 == 7 ) && ( $sim2 == 6 || $sim2 == 7 ) && ( $sim3 == 6 || $sim3 == 7 ) )
    {
        $win2 = $bet * 5;
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
        $win2 = $bet * 20;
    }
    if ( ( $sim1 == 1 || $sim1 == 7 ) && ( $sim2 == 1 || $sim2 == 7 ) && ( $sim3 == 1 || $sim3 == 7 ) )
    {
        $win2 = $bet * 30;
    }
    if ( ( $sim1 == 6 || $sim1 == 7 ) && ( $sim2 == 6 || $sim2 == 7 ) && ( $sim3 == 6 || $sim3 == 7 ) && ( $sim4 == 6 || $sim4 == 7 ) )
    {
        $win2 = $bet * 20;
    }
    if ( ( $sim1 == 5 || $sim1 == 7 ) && ( $sim2 == 5 || $sim2 == 7 ) && ( $sim3 == 5 || $sim3 == 7 ) && ( $sim4 == 5 || $sim4 == 7 ) )
    {
        $win2 = $bet * 30;
    }
    if ( ( $sim1 == 4 || $sim1 == 7 ) && ( $sim2 == 4 || $sim2 == 7 ) && ( $sim3 == 4 || $sim3 == 7 ) && ( $sim4 == 4 || $sim4 == 7 ) )



 {
        $win2 = $bet * 40;
    }
    if ( ( $sim1 == 3 || $sim1 == 7 ) && ( $sim2 == 3 || $sim2 == 7 ) && ( $sim3 == 3 || $sim3 == 7 ) && ( $sim4 == 3 || $sim4 == 7 ) )
    {
        $win2 = $bet * 100;
    }
    if ( ( $sim1 == 2 || $sim1 == 7 ) && ( $sim2 == 2 || $sim2 == 7 ) && ( $sim3 == 2 || $sim3 == 7 ) && ( $sim4 == 2 || $sim4 == 7 ) )
    {
        $win2 = $bet * 200;
    }
    if ( ( $sim1 == 1 || $sim1 == 7 ) && ( $sim2 == 1 || $sim2 == 7 ) && ( $sim3 == 1 || $sim3 == 7 ) && ( $sim4 == 1 || $sim4 == 7 ) )
    {
        $win2 = $bet * 300;
    }
    if ( $sim1 == 7 && $sim2 == 7 && $sim3 == 7 && $sim4 == 7 )
    {
        $win2 = $bet * 300;
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
        $win3 = $bet * 3;
    }
    if ( ( $sim9 == 2 || $sim9 == 7 ) && ( $sim10 == 2 || $sim10 == 7 ) )
    {
        $win3 = $bet * 3;
    }
    if ( ( $sim9 == 1 || $sim9 == 7 ) && ( $sim10 == 1 || $sim10 == 7 ) )
    {
        $win3 = $bet * 3;
    }
    if ( ( $sim9 == 6 || $sim9 == 7 ) && ( $sim10 == 6 || $sim10 == 7 ) && ( $sim11 == 6 || $sim11 == 7 ) )
    {
        $win3 = $bet * 5;
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
        $win3 = $bet * 20;
    }
    if ( ( $sim9 == 1 || $sim9 == 7 ) && ( $sim10 == 1 || $sim10 == 7 ) && ( $sim11 == 1 || $sim11 == 7 ) )
    {
        $win3 = $bet * 30;
    }
    if ( ( $sim9 == 6 || $sim9 == 7 ) && ( $sim10 == 6 || $sim10 == 7 ) && ( $sim11 == 6 || $sim11 == 7 ) && ( $sim12 == 6 || $sim12 == 7 ) )
    {
        $win3 = $bet * 20;
    }
    if ( ( $sim9 == 5 || $sim9 == 7 ) && ( $sim10 == 5 || $sim10 == 7 ) && ( $sim11 == 5 || $sim11 == 7 ) && ( $sim12 == 5 || $sim12 == 7 ) )
    {
        $win3 = $bet * 35;
    }
    if ( ( $sim9 == 4 || $sim9 == 7 ) && ( $sim10 == 4 || $sim10 == 7 ) && ( $sim11 == 4 || $sim11 == 7 ) && ( $sim12 == 4 || $sim12 == 7 ) )
    {
        $win3 = $bet * 40;
    }
    if ( ( $sim9 == 3 || $sim9 == 7 ) && ( $sim10 == 3 || $sim10 == 7 ) && ( $sim11 == 3 || $sim11 == 7 ) && ( $sim12 == 3 || $sim12 == 7 ) )
    {
        $win3 = $bet * 100;
    }
    if ( ( $sim9 == 2 || $sim9 == 7 ) && ( $sim10 == 2 || $sim10 == 7 ) && ( $sim11 == 2 || $sim11 == 7 ) && ( $sim12 == 2 || $sim12 == 7 ) )
    {
        $win3 = $bet * 200;
    }
    if ( ( $sim9 == 1 || $sim9 == 7 ) && ( $sim10 == 1 || $sim10 == 7 ) && ( $sim11 == 1 || $sim11 == 7 ) && ( $sim12 == 1 || $sim12 == 7 ) )
    {
        $win3 = $bet * 300;
    }
    if ( $sim9 == 7 && $sim10 == 7 && $sim11 == 7 && $sim12 == 7 )
    {
        $win3 = $bet * 300;
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
            shuffle( &$mx );
            $sim5 = $mx[0];
            $sim6 = $mx[1];
            $sim7 = $mx[2];
            $sim8 = $mx[3];
        }
        if ( $line == 2 )
        {
            shuffle( &$mx );
            $sim1 = $mx[0];
            $sim2 = $mx[1];
            $sim3 = $mx[2];
            $sim4 = $mx[3];
            shuffle( &$mx );
            $sim5 = $mx[0];
            $sim6 = $mx[1];
            $sim7 = $mx[2];
            $sim8 = $mx[3];
        }
        if ( $line == 3 )
        {
            shuffle( &$mx );
            $sim1 = $mx[0];
            $sim2 = $mx[1];
            $sim3 = $mx[2];
            $sim4 = $mx[3];
            shuffle( &$mx );
            $sim5 = $mx[0];
            $sim6 = $mx[1];
            $sim7 = $mx[2];
            $sim8 = $mx[3];
            shuffle( &$mx );
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
        shuffle( &$mx );
        $sim1 = $mx[0];
        $sim2 = $mx[1];
        $sim3 = $mx[2];
        $sim4 = $mx[3];
        shuffle( &$mx );
        $sim5 = $mx[0];
        $sim6 = $mx[1];
        $sim7 = $mx[2];
        $sim8 = $mx[3];
        shuffle( &$mx );
        $sim9 = $mx[0];
        $sim10 = $mx[1];
        $sim11 = $mx[2];
        $sim12 = $mx[3];
        shuffle( &$mx3 );
        ${ "sim".$mx3[1] } = 8;
        ${ "sim".$mx3[2] } = 8;
        ${ "sim".$mx3[3] } = 8;
    }
    if ( 0 < $win )
    {
        mysql_query( "update users set cash=cash+'".$win."' where login='{$l}'" );

  mysql_query( "update game_bank set bank=bank-'".$win."' where name='ttuz'" );


    }



 mysql_query( "INSERT INTO stat_game VALUES('NULL','".$date."','{$time}','{$l}','{$row['3']}','{$allbet}','{$win}','zooslot')" );
    $row = mysql_fetch_array( mysql_query( "select * from users where login='".$l."'" ) );
    $spin = rand( 11, 20 );
    echo "&win1=".$win1."&win2={$win2}&win3={$win3}";
    echo "&_1=".$sim1."&_2={$sim2}&_3={$sim3}&_4={$sim4}&_5={$sim5}&_6={$sim6}&_7={$sim7}&_8={$sim8}&_9={$sim9}&_10={$sim10}&_11={$sim11}&_12={$sim12}";
    echo "&cash_new=".$row['3']."&win_new={$win}&spin={$spin}&bon={$bon}";
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
    $countstop = rand( 2, 4 );
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
        mysql_query( "INSERT INTO stat_game VALUES('NULL','".$date."','{$time}','{$l}','{$row['3']}','{$bbet}','{$bonwin0}','zooslot_BONUS')" );
    }
    echo "&mytxt=".$mytxt;
    echo "&win_new=".$bonwin;
    echo "&cash_new=".$row['3'];
}
?>