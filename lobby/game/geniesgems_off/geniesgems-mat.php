<?php
session_start( );
$l = $_SESSION['l'];
if(!isset($_SESSION['l'])){ 
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
function winlimit( )
{
    ${ "bvbvbv" } = mysql_fetch_array( mysql_query( "select * from g_set_new where g_name='geniesgems'" ) );
    ${ "hghghg" } = ${ "bvbvbv" }['g_bank'];
    return ${ "hghghg" };
}
$betallt = $bet * $lines;

$row = mysql_fetch_array( mysql_query( "select * from users where login='".$l."'" ) );
$user_balance = $row[3];


if ( $s==0 )
{
echo "&cash=$user_balance&jpot=1243.71&txt=Welcome to casino";
$freenumspin = 0;

}
if($bet=="" or $bet<0){$bet=0.2;}
if($lines=="" or $lines<0 or $lines>9){$lines=1;}

if ( $s==1 && $user_balance>=$betallt)
{

/*
    $host = str_replace( "www.", "", getenv( "HTTP_HOST" ) );
    if ( $host != "azartsoft.co.cc" )
    {
        exit( );
    }
*/

    $stat_txt = "geniesgems";
    $date = date( "d.m.y" );
    $time = date( "H:i:s" );
    $allbet = $bet * $lines;
    $win1 = 0;
    $win2 = 0;
    $win3 = 0;
    $win4 = 0;
    $win5 = 0;
    $win6 = 0;
    $win7 = 0;
    $win8 = 0;
    $win9 = 0;
    $winall = 0;
if ( $freenumspin == 0 )
{
    mysql_query( "update users set cash=cash-'".$allbet."' where login='{$l}'" );
    $rowb9 = mysql_fetch_array( mysql_query( "select * from g_set_new where g_name='geniesgems'" ) );
    $proc4 = $rowb9['g_proc'];
    $allbet23 = $allbet / 100 * $proc4;

    mysql_query( "update g_set_new set g_bank=g_bank+$allbet23 where g_name='geniesgems'" );
    $row_bon = mysql_fetch_array( mysql_query( "select * from g_set_new where g_name='geniesgems'" ) );
    $g_shansbon = $row_bon['g_shansbon'];
    $shs2 = explode( "|", $g_shansbon );
    $g_shansbon1 = $shs2[0];
    $g_shansbon2 = $shs2[1];
    $casbank = winlimit( );
    if ( $casbank < $allbet )
    {
        $g_shansbon1 = $g_shansbon1 + 10;
    }
    $tttfree = rand( 1, $g_shansbon1 );

    if ( $tttfree == 1 )
    {
    $freenumspin = rand( 1, $g_shansbon2 );
    }

}














     $mx2 = array( 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 7, 7, 5, 7, 7, 6, 6, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 8, 8, 8, 8, 8, 8, 8, 8, 8, 9, 9, 9, 9, 9, 9, 10, 10, 10, 10, 10,10,10, 10, 11, 11,11,11,11,11,11,11,11,11,11,11 );


    $psym[3] = array( 0, 0, 0, 100, 1000, 10000 ); //джин
    $psym[4] = array( 0, 0, 0, 50, 500, 5000 );  // кристалл
    $psym[5] = array( 0, 0, 0, 25, 250, 2500 ); // лампа
    $psym[6] = array( 0, 0, 0, 15, 150, 1500 ); // ковёр
    $psym[7] = array( 0, 0, 0, 10, 100,1000 ); // башни
    $psym[8] = array( 0, 0, 0, 5, 50, 500 ); // k
    $psym[9] = array( 0, 0, 0, 4, 40, 400 ); // q
    $psym[10] = array( 0, 0, 2, 4, 20, 200); // j
    $psym[11] = array( 0, 0, 1, 2, 10, 100 ); // 10


    $m_line = array( 5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 10, 11, 12, 13, 14, 0, 6, 12, 8, 4, 10, 6, 2, 8, 14, 5, 1, 2, 3, 9, 5, 11, 12, 13, 9, 0, 1, 7, 13, 14, 10, 11, 7, 3, 4 );
    $km2 = 0;
    $m_ln = 0;
    for ( ; $m_ln <= 8; ++$m_ln )
    {
        $km = 0;
        for ( ; $km <= 4; ++$km )
        {
            $lin[$m_ln][$km] = $m_line[$km2];
            ++$km2;
        }
    }
    $row_bon = mysql_fetch_array( mysql_query( "select * from g_set_new where g_name='geniesgems'" ) );
    $g_shansbon = $row_bon['g_shansbon'];
    $shs2 = explode( "|", $g_shansbon );
    $g_shansbon1 = $shs2[0];

    $ooo2 = $row_bon['g_shanswin'];
    $shs = explode( "|", $ooo2 );
    if ( $lines == 1 )
    {
        $ooo2 = $shs[0];
    }
    if ( $lines == 3 )
    {
        $ooo2 = $shs[1];
    }
    if ( $lines == 5 )
    {
        $ooo2 = $shs[2];
    }
    if ( $lines == 7 )
    {
        $ooo2 = $shs[3];
    }
    if ( $lines == 9 )
    {
        $ooo2 = $shs[4];
    }
    $casbank = winlimit( );
    if ( $casbank < $allbet )
    {
        $ooo2 = 2000;
    }

    $rnd_result = rand( 1, $ooo2 );

    if ( $rnd_result == 1 )
    {
        $mas_win = 1;
    }
    else
    {
        $mas_win = 0;
    }
   $casbank = winlimit( );
    $am = 0;
    while ( $am < 100000 )
    {
        $map_win1 = array( 0, 0, 0, 0, 0, 0, 0, 0, 0 );
        $map_win2 = array( 0, 0, 0, 0, 0, 0, 0, 0, 0 );
        $no = 0;
        srand( ( double )microtime( ) * 1000000 );
        shuffle( &$mx2 );
        $k = 0;
        for ( ; $k <= 14; ++$k )
        {
            $map[$k] = $mx2[$k];
        }
        $ln = 0;
        for ( ; $ln <= 8; ++$ln )
        {
            $s1 = $map[$lin[$ln][0]];
            $s2 = $map[$lin[$ln][1]];
            $s3 = $map[$lin[$ln][2]];
            $s4 = $map[$lin[$ln][3]];
            $s5 = $map[$lin[$ln][4]];


            if ( $s1 == 2 && $s2 <> 1 )
            {
                $s1 = $s2;
                $gg = $s2;
            }
            if ( $s2 == 2 && $s1 <> 1 )
            {
                $s2 = $s1;
                $gg = $s2;
            }






            if ( $s1 == 2 && $s2 == $s3 && $s2 <> 1 )
            {
                $s1 = $s2;
                $gg = $s2;
            }
            if ( $s2 == 2 && $s1 == $s3 && $s3 <> 1 )
            {
                $s2 = $s3;
                $gg = $s3;
            }
            if ( $s3 == 2 && $s1 == $s2 && $s2 <> 1 )
            {
                $s3 = $s2;
                $gg = $s2;
            }
            if ( $s1 == 2 && $s2 == 2 && $s3 <> 1 )
            {
                $s1 = $s3;
                $s2 = $s3;
                $gg = $s3;
            }
            if ( $s2 == 2 && $s3 == 2 && $s1 <> 1 )
            {
                $s2 = $s1;
                $s3 = $s1;
                $gg = $s1;
            }
            if ( $s1 == 2 && $s3 == 2 && $s2 <> 1 )
            {
                $s1 = $s2;
                $s3 = $s2;
                $gg = $s2;
            }
            if ( $s1 == 2 && $s2 == $s3 && $s3 == $s4 && $s2 <> 1 )
            {
                $s1 = $s2;
                $gg = $s2;
            }
            if ( $s2 == 2 && $s1 == $s3 && $s3 == $s4 && $s3 <> 1 )
            {
                $s2 = $s3;
                $gg = $s3;
            }
            if ( $s3 == 2 && $s1 == $s2 && $s2 == $s3 && $s2 <> 1 )
            {
                $s3 = $s2;
                $gg = $s2;
            }
            if ( $s4 == 2 && $s1 == $s2 && $s2 == $s3 && $s2 <> 1 )
            {
                $s4 = $s2;
                $gg = $s2;
            }
            if ( $s1 == 2 && $s2 == 2 && $s3 == $s4 && $s3 <> 1 )
            {
                $s1 = $s3;
                $s2 = $s3;
                $gg = $s3;
            }
            if ( $s1 == 2 && $s3 == 2 && $s2 == $s4 && $s2 <> 1 )
            {
                $s1 = $s2;
                $s3 = $s2;
                $gg = $s2;
            }
            if ( $s1 == 2 && $s4 == 2 && $s2 == $s3 && $s2 <> 1 )
            {
                $s1 = $s2;
                $s4 = $s2;
                $gg = $s2;
            }
            if ( $s2 == 2 && $s3 == 2 && $s1 == $s4 && $s1 <> 1 )
            {
                $s2 = $s1;
                $s3 = $s1;
                $gg = $s1;
            }
            if ( $s2 == 2 && $s4 == 2 && $s1 == $s3 && $s1 <> 1 )
            {
                $s2 = $s1;
                $s4 = $s1;
                $gg = $s1;
            }
            if ( $s3 == 2 && $s4 == 2 && $s1 == $s2 && $s1 <> 1 )
            {
                $s3 = $s1;
                $s4 = $s1;
                $gg = $s1;
            }




















            if ( $s1 == $s2 )
            {
                $map_win1[$ln] = $psym[$s2][2];
            }







            if ( $s1 == $s2 && $s2 == $s3 )
            {
                $map_win1[$ln] = $psym[$s2][3];
            }
            if ( !( $s1 == $s2 ) || !( $s2 == $s3 ) || !( $s3 == $s4 ) )
            {
                    continue;
            }
            else
            {
                $map_win1[$ln] = $psym[$s3][4];
            }
        }

        $k = 1;
        for ( ; $k <= 15; ++$k )
        {
            ${ "sym".$k } = $map[$k - 1];
        }
        $k = 1;
        for ( ; $k <= 9; ++$k )
        {
            ${ "win_1".$k } = $bet * $map_win1[$k - 1];
        }
        $k = 1;
        for ( ; $k <= 9; ++$k )
        {
            ${ "win_2".$k } = $bet * $map_win2[$k - 1];
        }
        $k = 1;
        for ( ; $k <= 9; ++$k )
        {
            ${ "win".$k } = ${ "win_1".$k } + ${ "win_2".$k };
        }
















        if ( $lines == 1 )
        {
            $win2 = 0;
            $win3 = 0;
            $win4 = 0;
            $win5 = 0;
            $win6 = 0;
            $win7 = 0;
            $win8 = 0;
            $win9 = 0;
        }
        if ( $lines == 2 )
        {
            $win3 = 0;
            $win4 = 0;
            $win5 = 0;
            $win6 = 0;
            $win7 = 0;
            $win8 = 0;
            $win9 = 0;
        }
        if ( $lines == 3 )
        {
            $win4 = 0;
            $win5 = 0;
            $win6 = 0;
            $win7 = 0;
            $win8 = 0;
            $win9 = 0;
        }
        if ( $lines == 4 )
        {
            $win5 = 0;
            $win6 = 0;
            $win7 = 0;
            $win8 = 0;
            $win9 = 0;
        }
        if ( $lines == 5 )
        {
            $win6 = 0;
            $win7 = 0;
            $win8 = 0;
            $win9 = 0;
        }
        if ( $lines == 6 )
        {
            $win7 = 0;
            $win8 = 0;
            $win9 = 0;
        }
        if ( $lines == 7 )
        {
            $win8 = 0;
            $win9 = 0;
        }
        if ( $lines == 8 )
        {
            $win9 = 0;
        }
        $winall = $win1 + $win2 + $win3 + $win4 + $win5 + $win6 + $win7 + $win8 + $win9;
        ++$am;
        $n = 0;
        $k = 1;
        for ( ; $k <= 15; ++$k )
        {
           if ( ${ "sym".$k } == 1 )
{
        $n = 0;
}
        }


 if ( $n == 3 )
{
$winall *= 2;
}
 if ( $n == 4 )
{
$winall *= 10;
}




        if ( $mas_win == 1 && $winall == 0 )
        {
            $am = 10;
        }
        if ( $mas_win == 0 && $winall == 0 )
        {
            $am = 120000;
        }


        if ( $mas_win == 1 && 0 < $winall )
        {
            $am = 120000;
        }

        if ( $casbank <= $winall )
        {
 
$am = 10;

$mas_win = 0;

        }


    }






    if ( 0 < $winall )
    {
        $winall44 = sprintf( "%01.2f", $winall );
        mysql_query( "update users set cash=cash+'".$winall44."' where login='{$l}'" );
        mysql_query( "update g_set_new set g_bank=g_bank-'".$winall44."' where g_name='geniesgems'" );
        $_SESSION['double_win'] = $winall;

    }
$row = mysql_fetch_array( mysql_query( "select * from users where login='".$l."'" ) );
$user_balance = $row[3];
    $winall44 = sprintf( "%01.2f", $winall );
    mysql_query( "INSERT INTO stat_game VALUES('NULL','".$date."','{$time}','{$l}','{$user_balance}','{$allbet}','{$winall44}','{$stat_txt}')" );
    if ( 0 < $winall )
    {
        $user_balance -= $winall;
    }



$row = mysql_fetch_array( mysql_query( "select * from users where login='".$l."'" ) );
$user_balance = $row[3];





















echo "&rnd_game=542173589";
echo "&freegame=10";
echo "&freenumspin=$freenumspin&dig1=$sym1&dig2=$sym2&dig3=$sym3&dig4=$sym4&dig5=$sym5&dig6=$sym6&dig7=$sym7&dig8=$sym8&dig9=$sym9&dig10=$sym10
&dig11=$sym11&dig12=$sym12&dig13=$sym13&dig14=$sym14&dig15=$sym15";
echo "&win1=$win1&win2=$win2&win3=$win3&win4=$win4&win5=$win5&win6=$win6&win7=$win7&win8=$win8&win9=$win9&win_new=$winall";
echo "&cash_new=$user_balance";
echo "&jpot=1243.71";
echo "&jpots=0";
echo "&spin=1";
$freenumspin = $freenumspin - 1;

}






if ( $s==2 && $user_balance>=$betallt)
{
    $casbank = winlimit( );
    $double_win = $_SESSION['double_win'];
    mysql_query( "update users set cash=cash-'".$double_win."' where login='{$l}'" );
    mysql_query( "update g_set_new set g_bank=g_bank+'".$double_win."' where g_name='geniesgems'" );





$row_bon=mysql_fetch_array(mysql_query("select * from g_set_new where g_name='geniesgems'"));
$g_shansdouble=$row_bon['g_rezerv'];


            $tttr = rand( 1, $g_shansdouble );



            if ( $riskn == 1 )
            {
        $double_win *= 2;
             } 
            if ( $riskn == 2 )
            {
        $double_win *= 4;
             }




        if ( $casbank <= $double_win )
        {
 
$tttr = 2;
        }

            if ( $tttr == 1 )
            {

        mysql_query( "update users set cash=cash+'".$double_win."' where login='{$l}'" );
        mysql_query( "update g_set_new set g_bank=g_bank-'".$double_win."' where g_name='geniesgems'" );
        $row = mysql_fetch_array( mysql_query( "select * from users where login='".$l."'" ) );
        $user_balance = $row[3];
        $_SESSION['double_win'] = $double_win;
        $riskwin = 1;
            }

            if ( $tttr == 2 )
            {
            $win = 0;
$row = mysql_fetch_array( mysql_query( "select * from users where login='".$l."'" ) );
$user_balance = $row[3];
         $riskwin = 0;
            }






echo "&riskwin=$riskwin&winall=$double_win&cash_new=$user_balance";






}







?>
