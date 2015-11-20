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
    ${ "bvbvbv" } = mysql_fetch_array( mysql_query( "select * from g_set_new where g_name='bigkahuna'" ) );
    ${ "hghghg" } = ${ "bvbvbv" }['g_bank'];
    return ${ "hghghg" };
}
$betallt = $bet * $lines;

$row = mysql_fetch_array( mysql_query( "select * from users where login='".$l."'" ) );
$user_balance = $row[3];


if ( $s==0 )
{
echo "&cash=$user_balance&jpot=1243.71&txt=Welcome to ONLINE-CASINO";
$freenumspin = 0;

}
$usrbl=$user_balance-$betallt;

if ( $s==1 && $bet>0 && $lines>0 && $user_balance>0 && $usrbl>=0)
{

/*
    $host = str_replace( "www.", "", getenv( "HTTP_HOST" ) );
    if ( $host != "azartsoft.co.cc" )
    {
        exit( );
    }
*/

    $stat_txt = "bigkahuna";
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
    $rowb9 = mysql_fetch_array( mysql_query( "select * from g_set_new where g_name='bigkahuna'" ) );
    $proc4 = $rowb9['g_proc'];
    $allbet23 = $allbet / 100 * $proc4;

    mysql_query( "update g_set_new set g_bank=g_bank+$allbet23 where g_name='bigkahuna'" );
    $row_bon = mysql_fetch_array( mysql_query( "select * from g_set_new where g_name='bigkahuna'" ) );
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














    $mx2 = array( 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 7, 7, 5, 7, 7, 6, 6, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 8, 8, 8, 8, 8, 8, 8, 8, 8, 9, 9, 9, 9, 9, 9, 10, 10, 10, 10, 10, 10, 11, 11, 12, 12, 12, 12, 12, 12 );

    
    $psym[2] = array( 0, 0, 0, 0, 0, 0 );  // заменяет любой символ... big kahuna
    $psym[3] = array( 0, 0, 10, 25, 150, 500 ); // индеец
    $psym[4] = array( 0, 0, 5, 25, 150, 500 ); // варан(может и не варан, ящерица кароче =))
    $psym[5] = array( 0, 0, 0, 20, 80, 250 ); // апельсин
    $psym[6] = array( 0, 0, 0, 15, 50, 200 ); // киви
    $psym[7] = array( 0, 0, 0, 15, 20, 150 ); // какой то пупырчатый фрукт
    $psym[8] = array( 0, 0, 0, 10, 20, 150 ); // арбуз
    $psym[9] = array( 0, 0, 0, 10, 20, 100 ); // ананас
    $psym[10] = array( 0, 0, 0, 10, 20, 100 ); // малина
    


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
    $row_bon = mysql_fetch_array( mysql_query( "select * from g_set_new where g_name='bigkahuna'" ) );
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
        $n = $n + 1; // если не нужно нижеследующее вместо  $n = $n + 1; исправить на  $n = 0;
}
        }


 if ( $n == 3 )    //здесь сделал всё по таблице выплат
{
$winall +=$betallt* 10;// при выпадении 3-х "обезьян" на слоте в разнаброс к общему// вигрышу прибавляется ставка //умноженная на число(по таблице выплат)
}
 if ( $n == 4 )
{
$winall +=$betallt* 25;// здесь аналогично только, только при выпадении 4-х "обезьян" //и умножение так же по таблице выплат
}

 if ( $n == 5 )
{
$winall +=$betallt* 50;// см.выше.
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
        mysql_query( "update g_set_new set g_bank=g_bank-'".$winall44."' where g_name='bigkahuna'" );
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




$usrbl=$user_balance-$_SESSION['double_win'];


if ( $s==2 && $usrbl>=0)
{
    $casbank = winlimit( );
    $double_win = $_SESSION['double_win'];
    mysql_query( "update users set cash=cash-'".$double_win."' where login='{$l}'" );
    mysql_query( "update g_set_new set g_bank=g_bank+'".$double_win."' where g_name='bigkahuna'" );





$row_bon=mysql_fetch_array(mysql_query("select * from g_set_new where g_name='bigkahuna'"));
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
        mysql_query( "update g_set_new set g_bank=g_bank-'".$double_win."' where g_name='bigkahuna'" );
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






}else{$row = mysql_fetch_array( mysql_query( "select * from users where login='".$l."'" ) );
        $user_balance = $row[3];echo "&cash=$user_balance&cash_new=$user_balance";}







?>
