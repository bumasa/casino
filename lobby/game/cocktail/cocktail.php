<?php
function vercard( $dig )
{
    $c1 = array( 0, 13, 26, 39 );
    $c2 = array( 1, 14, 27, 40 );
    $c3 = array( 2, 15, 28, 41 );
    $c4 = array( 3, 16, 29, 42 );
    $c5 = array( 4, 17, 30, 43 );
    $c6 = array( 5, 18, 31, 44 );
    $c7 = array( 6, 19, 32, 45 );
    $c8 = array( 7, 20, 33, 46 );
    $c9 = array( 8, 21, 34, 47 );
    $c10 = array( 9, 22, 35, 48 );
    $c11 = array( 10, 23, 36, 49 );
    $c12 = array( 11, 24, 37, 50 );
    $c13 = array( 12, 25, 38, 51 );
    $mas = ${ "c".$dig };
    shuffle( &$mas );
    return $mas[0];
}

function winlimit( )
{
    ${ "bvbvbv" } = mysql_fetch_array( mysql_query( "select * from g_set_new where g_name='cocktail'" ) );
    ${ "hghghg" } = ${ "bvbvbv" }['g_bank'];
    return ${ "hghghg" };
}

error_reporting( 0 );
session_start( );


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
if ( isset( $_POST['action'] ) )
{
    $action = $_POST['action'];
}
else
{
    $action = "error";
}
$asc = explode( "|", $action );
$action = str_replace( "action=", "", $asc[0] );
$bet = str_replace( "bet=", "", $asc[1] );
$lines = str_replace( "lines=", "", $asc[2] );
$nado_card = $asc[1];
$betallt = $bet * $lines;
$row = mysql_fetch_array( mysql_query( "select * from users where login='".$l."'" ) );
$user_balance = floor( $row[3] );
if ( $bet < 0 || 25 < $bet )
{
    $action = "error";
}
if ( $line < 0 || 9 < $line )
{
    $action = "error";
}
if ( $user_balance < $betallt )
{
    $action = "error";
}
if ( $action == "error" )
{
    echo "error|error";
}
if ( $action == "initfc" )
{
    echo "OK|".$user_balance."|&extralife=10";
}
if ( $action == "playfc" )
{

    $stat_txt = "cocktail";
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
    mysql_query( "update users set cash=cash-'".$allbet."' where login='$l'" );
    $rowb9 = mysql_fetch_array( mysql_query( "select * from g_set_new where g_name='cocktail'" ) );
    $proc4 = $rowb9['g_proc'];
    $allbet23 = $allbet / 100 * $proc4;
    mysql_query( "update g_set_new set g_bank=g_bank+'".$allbet23."' where g_name='cocktail'" );
    $row_bon = mysql_fetch_array( mysql_query( "select * from g_set_new where g_name='cocktail'" ) );
    $g_rezim = $row_bon['g_rezim'];
    if ( $g_rezim == 1 )
    {
        $mx2 = array( 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6, 6, 7, 7 );
    }
    if ( $g_rezim == 2 )
    {
        $mx2 = array( 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7 );
    }
    if ( $g_rezim == 3 )
    {
        $mx2 = array( 0, 0, 0, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 7, 7, 7 );
    }
    if ( $g_rezim == 4 )
    {
        $mx2 = array( 0, 0, 0, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7 );
    }
    if ( $g_rezim == 5 )
    {
        $mx2 = array( 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7 );
    }
    $psym[0] = array( 0, 0, 0, 100, 500, 2000 );
    $psym[1] = array( 0, 0, 0, 2, 3, 10 );
    $psym[2] = array( 0, 0, 0, 3, 5, 20 );
    $psym[3] = array( 0, 0, 0, 5, 10, 50 );
    $psym[4] = array( 0, 0, 0, 10, 30, 100 );
    $psym[5] = array( 0, 0, 0, 20, 50, 200 );
    $psym[6] = array( 0, 0, 0, 30, 100, 500 );
    $psym[7] = array( 0, 0, 0, 200, 1000, 5000 );
    $psym[8] = array( 0, 0, 0, 0, 0, 0 );
    $m_line = array( 5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 10, 11, 12, 13, 14, 0, 6, 12, 8, 4, 10, 6, 2, 8, 14, 0, 1, 7, 3, 4, 10, 11, 7, 13, 14, 5, 11, 12, 13, 9, 5, 1, 2, 3, 9 );
    $km2 = 0;
    $m_ln = 0;
    for ( ; $m_ln <= 8; ++$m_ln )
    {
        $km = 0;
        for ( ; $km <= 4; ++$km )
        {
            $lin[$m_ln][$km] = $m_line[$km2];
            ++$km2;
            continue;
        }
    }
    $row_bon = mysql_fetch_array( mysql_query( "select * from g_set_new where g_name='cocktail'" ) );
    $ooo1 = $row_bon['g_shansbon'];
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
    if ( $casbank < 5 )
    {
        $ooo2 = 2000;
    }
    $rnd_bonus = rand( 1, $ooo1 );
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
            if ( $s1 == 0 && $s2 == $s3 )
            {
                $s1 = $s2;
                $gg = $s2;
            }
            if ( $s2 == 0 && $s1 == $s3 )
            {
                $s2 = $s3;
                $gg = $s3;
            }
            if ( $s3 == 0 && $s1 == $s2 )
            {
                $s3 = $s2;
                $gg = $s2;
            }
            if ( $s1 == 0 && $s2 == 0 )
            {
                $s1 = $s3;
                $s2 = $s3;
                $gg = $s3;
            }
            if ( $s2 == 0 && $s3 == 0 )
            {
                $s2 = $s1;
                $s3 = $s1;
                $gg = $s1;
            }
            if ( $s1 == 0 && $s3 == 0 )
            {
                $s1 = $s2;
                $s3 = $s2;
                $gg = $s2;
            }
            if ( $s1 == 0 && $s2 == $s3 && $s3 == $s4 )
            {
                $s1 = $s2;
                $gg = $s2;
            }
            if ( $s2 == 0 && $s1 == $s3 && $s3 == $s4 )
            {
                $s2 = $s3;
                $gg = $s3;
            }
            if ( $s3 == 0 && $s1 == $s2 && $s2 == $s3 )
            {
                $s3 = $s2;
                $gg = $s2;
            }
            if ( $s4 == 0 && $s1 == $s2 && $s2 == $s3 )
            {
                $s4 = $s2;
                $gg = $s2;
            }
            if ( $s1 == 0 && $s2 == 0 && $s3 == $s4 )
            {
                $s1 = $s3;
                $s2 = $s3;
                $gg = $s3;
            }
            if ( $s1 == 0 && $s3 == 0 && $s2 == $s4 )
            {
                $s1 = $s2;
                $s3 = $s2;
                $gg = $s2;
            }
            if ( $s1 == 0 && $s4 == 0 && $s2 == $s3 )
            {
                $s1 = $s2;
                $s4 = $s2;
                $gg = $s2;
            }
            if ( $s2 == 0 && $s3 == 0 && $s1 == $s4 )
            {
                $s2 = $s1;
                $s3 = $s1;
                $gg = $s1;
            }
            if ( $s2 == 0 && $s4 == 0 && $s1 == $s3 )
            {
                $s2 = $s1;
                $s4 = $s1;
                $gg = $s1;
            }
            if ( $s3 == 0 && $s4 == 0 && $s1 == $s2 )
            {
                $s3 = $s1;
                $s4 = $s1;
                $gg = $s1;
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
        $ln = 0;
        for ( ; $ln <= 8; ++$ln )
        {
            $s1 = $map[$lin[$ln][0]];
            $s2 = $map[$lin[$ln][1]];
            $s3 = $map[$lin[$ln][2]];
            $s4 = $map[$lin[$ln][3]];
            $s5 = $map[$lin[$ln][4]];
            if ( $s1 == 0 || $s2 == 0 || $s3 == 0 )
            {
                $no = 1;
            }
            if ( $s2 == 0 || $s3 == 0 && $s4 == 0 )
            {
                $no = 1;
            }
            if ( $s3 == 0 && $s4 == 0 && $s5 == 0 )
            {
                $no = 1;
            }
            if ( $s1 == 0 && $s2 == 0 && $s3 == 0 && $s4 == 0 )
            {
                $no = 1;
            }
            if ( $s2 == 0 && $s3 == 0 && $s4 == 0 && $s5 == 0 )
            {
                $no = 1;
            }
            if ( $s1 == 0 && $s2 == 0 && $s3 == 0 && $s4 == 0 && $s5 == 0 )
            {
                $no = 1;
            }
            if ( $s1 == 0 && $s2 == 0 && $s3 == 7 )
            {
                $no = 1;
            }
            if ( $s1 == 0 && $s2 == 7 && $s3 == 0 )
            {
                $no = 1;
            }
            if ( $s1 == 0 && $s2 == 7 && $s3 == 7 )
            {
                $no = 1;
            }
            if ( $s1 == 7 && $s2 == 7 && $s3 == 0 )
            {
                $no = 1;
            }
            if ( $s1 == 7 && $s2 == 0 && $s3 == 0 )
            {
                $no = 1;
            }
            if ( $s1 == 7 && $s2 == 0 && $s3 == 7 )
            {
                $no = 1;
            }
            if ( $s2 == 0 && $s3 == 0 && $s4 == 7 )
            {
                $no = 1;
            }
            if ( $s2 == 0 && $s3 == 7 && $s4 == 0 )
            {
                $no = 1;
            }
            if ( $s2 == 0 && $s3 == 7 && $s4 == 7 )
            {
                $no = 1;
            }
            if ( $s2 == 7 && $s3 == 7 && $s4 == 0 )
            {
                $no = 1;
            }
            if ( $s2 == 7 && $s3 == 0 && $s4 == 0 )
            {
                $no = 1;
            }
            if ( $s2 == 7 && $s3 == 0 && $s4 == 7 )
            {
                $no = 1;
            }
            if ( $s3 == 0 && $s4 == 0 && $s5 == 7 )
            {
                $no = 1;
            }
            if ( $s3 == 0 && $s4 == 7 && $s5 == 0 )
            {
                $no = 1;
            }
            if ( $s3 == 0 && $s4 == 7 && $s5 == 7 )
            {
                $no = 1;
            }
            if ( $s3 == 7 && $s4 == 7 && $s5 == 0 )
            {
                $no = 1;
            }
            if ( $s3 == 7 && $s4 == 0 && $s5 == 0 )
            {
                $no = 1;
            }
            if ( $s3 == 7 && $s4 == 0 && $s5 == 7 )
            {
                $no = 1;
            }
            if ( $s5 == 0 && $s4 == $s3 )
            {
                $s5 = $s4;
                $gg = $s4;
            }
            if ( $s4 == 0 && $s5 == $s3 )
            {
                $s4 = $s3;
                $gg = $s3;
            }
            if ( $s3 == 0 && $s5 == $s4 )
            {
                $s3 = $s4;
                $gg = $s4;
            }
            if ( $s5 == 0 && $s4 == 0 )
            {
                $s5 = $s3;
                $s4 = $s3;
                $gg = $s3;
            }
            if ( $s4 == 0 && $s3 == 0 )
            {
                $s4 = $s5;
                $s3 = $s5;
                $gg = $s5;
            }
            if ( $s5 == 0 && $s3 == 0 )
            {
                $s5 = $s4;
                $s3 = $s4;
                $gg = $s4;
            }
            if ( $s5 == 0 && $s4 == $s3 && $s3 == $s2 )
            {
                $s5 = $s2;
                $gg = $s2;
            }
            if ( $s4 == 0 && $s5 == $s3 && $s3 == $s2 )
            {
                $s4 = $s3;
                $gg = $s3;
            }
            if ( $s3 == 0 && $s5 == $s4 && $s4 == $s3 )
            {
                $s3 = $s4;
                $gg = $s4;
            }
            if ( $s2 == 0 && $s5 == $s4 && $s5 == $s3 )
            {
                $s2 = $s4;
                $gg = $s4;
            }
            if ( $s5 == 0 && $s4 == 0 && $s3 == $s2 )
            {
                $s5 = $s3;
                $s4 = $s3;
                $gg = $s3;
            }
            if ( $s5 == 0 && $s3 == 0 && $s4 == $s2 )
            {
                $s5 = $s4;
                $s3 = $s4;
                $gg = $s4;
            }
            if ( $s5 == 0 && $s2 == 0 && $s3 == $s3 )
            {
                $s5 = $s4;
                $s2 = $s4;
                $gg = $s4;
            }
            if ( $s4 == 0 && $s3 == 0 && $s5 == $s2 )
            {
                $s4 = $s5;
                $s3 = $s5;
                $gg = $s5;
            }
            if ( $s4 == 0 && $s2 == 0 && $s5 == $s3 )
            {
                $s4 = $s5;
                $s2 = $s5;
                $gg = $s5;
            }
            if ( $s3 == 0 && $s2 == 0 && $s5 == $s4 )
            {
                $s3 = $s5;
                $s2 = $s5;
                $gg = $s5;
            }
            if ( $s1 == 0 && $s2 == $s3 && $s3 == $s4 && $s4 == $s5 )
            {
                $s1 = $s2;
                $gg = $s2;
            }
            if ( $s2 == 0 && $s1 == $s3 && $s3 == $s4 && $s4 == $s5 )
            {
                $s2 = $s3;
                $gg = $s3;
            }
            if ( $s3 == 0 && $s1 == $s2 && $s2 == $s3 && $s4 == $s5 )
            {
                $s3 = $s2;
                $gg = $s2;
            }
            if ( $s4 == 0 && $s1 == $s2 && $s2 == $s3 && $s3 == $s5 )
            {
                $s4 = $s2;
                $gg = $s2;
            }
            if ( $s1 == 0 && $s2 == 0 && $s3 == $s4 && $s4 == $s5 )
            {
                $s1 = $s3;
                $s2 = $s3;
                $gg = $s3;
            }
            if ( $s1 == 0 && $s3 == 0 && $s2 == $s4 && $s4 == $s5 )
            {
                $s1 = $s2;
                $s3 = $s2;
                $gg = $s2;
            }
            if ( $s1 == 0 && $s4 == 0 && $s2 == $s3 && $s3 == $s5 )
            {
                $s1 = $s2;
                $s4 = $s2;
                $gg = $s2;
            }
            if ( $s1 == 0 && $s5 == 0 && $s2 == $s3 && $s3 == $s4 )
            {
                $s1 = $s2;
                $s5 = $s2;
                $gg = $s2;
            }
            if ( $s2 == 0 && $s3 == 0 && $s1 == $s4 && $s4 == $s5 )
            {
                $s2 = $s1;
                $s3 = $s1;
                $gg = $s1;
            }
            if ( $s2 == 0 && $s4 == 0 && $s1 == $s3 && $s3 == $s5 )
            {
                $s2 = $s1;
                $s4 = $s1;
                $gg = $s1;
            }
            if ( $s2 == 0 && $s5 == 0 && $s1 == $s3 && $s3 == $s4 )
            {
                $s2 = $s1;
                $s5 = $s1;
                $gg = $s1;
            }
            if ( $s3 == 0 && $s4 == 0 && $s1 == $s2 && $s2 == $s5 )
            {
                $s3 = $s1;
                $s4 = $s1;
                $gg = $s1;
            }
            if ( $s3 == 0 && $s5 == 0 && $s1 == $s2 && $s2 == $s4 )
            {
                $s3 = $s1;
                $s5 = $s1;
                $gg = $s1;
            }
            if ( $s4 == 0 && $s5 == 0 && $s1 == $s2 && $s2 == $s3 )
            {
                $s4 = $s1;
                $s5 = $s1;
                $gg = $s1;
            }
            if ( $s5 == $s4 && $s4 == $s3 )
            {
                $map_win2[$ln] = $psym[$s4][3];
            }
            if ( $s5 == $s4 && $s4 == $s3 && $s3 == $s2 )
            {
                $map_win2[$ln] = $psym[$s3][4];
            }
            if ( !( $s1 == $s2 ) || !( $s2 == $s3 ) || !( $s3 == $s4 ) || !( $s4 == $s5 ) )
            {
                    continue;
            }
            else
            {
                $map_win2[$ln] = $psym[$s3][5];
                $map_win1[$ln] = 0;
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
        if ( $mas_win == 1 && $winall == 0 )
        {
            $am = 10;
        }
        if ( $mas_win == 0 && $winall == 0 )
        {
            $am = 120000;
        }
        if ( $mas_win == 0 && $winall == 0 && $rnd_bonus == 1 )
        {
            $am = 120000;
            $startbon = 1;
        }
        if ( $mas_win == 1 && 0 < $winall )
        {
            $am = 120000;
        }
        if ( $casbank <= $winall )
        {
            $am = 10;
        }
        if ( $no == 1 )
        {
                continue;
        }
        else
        {
            $am = 10;
        }
    }
    if ( $startbon == 1 )
    {
        $tttb1 = array( 1, 6, 11 );
        $tttb2 = array( 2, 7, 12 );
        $tttb3 = array( 3, 8, 13 );
        $tttb4 = array( 4, 9, 14 );
        $tttb5 = array( 5, 10, 15 );
        shuffle( &$tttb1 );
        $rnd_sym_bon1 = $tttb1[0];
        shuffle( &$tttb2 );
        $rnd_sym_bon2 = $tttb2[0];
        shuffle( &$tttb3 );
        $rnd_sym_bon3 = $tttb3[0];
        shuffle( &$tttb4 );
        $rnd_sym_bon4 = $tttb4[0];
        shuffle( &$tttb5 );
        $rnd_sym_bon5 = $tttb5[0];
        $bb_count_map = array( 3, 3, 3, 3, 3, 4, 4, 5, 5 );
        shuffle( &$bb_count_map );
        $goldsvet = $bb_count_map[0];
        if ( $goldsvet == 3 )
        {
            $goldsvet2 = rand( 1, 4 );
            if ( $goldsvet2 == 1 )
            {
                ${ "sym".$rnd_sym_bon3 } = 8;
                ${ "sym".$rnd_sym_bon4 } = 8;
                ${ "sym".$rnd_sym_bon5 } = 8;
            }
            if ( $goldsvet2 == 2 )
            {
                ${ "sym".$rnd_sym_bon1 } = 8;
                ${ "sym".$rnd_sym_bon3 } = 8;
                ${ "sym".$rnd_sym_bon5 } = 8;
            }
            if ( $goldsvet2 == 3 )
            {
                ${ "sym".$rnd_sym_bon1 } = 8;
                ${ "sym".$rnd_sym_bon2 } = 8;
                ${ "sym".$rnd_sym_bon4 } = 8;
            }
            if ( $goldsvet2 == 4 )
            {
                ${ "sym".$rnd_sym_bon1 } = 8;
                ${ "sym".$rnd_sym_bon2 } = 8;
                ${ "sym".$rnd_sym_bon3 } = 8;
            }
            $bb_win_map = array( 0, 0, 0, 2, 2, 2, 5, 5, 5, 10, 10, 20, 50, 70, 100 );
        }
        if ( $goldsvet == 4 )
        {
            ${ "sym".$rnd_sym_bon2 } = 8;
            ${ "sym".$rnd_sym_bon3 } = 8;
            ${ "sym".$rnd_sym_bon4 } = 8;
            ${ "sym".$rnd_sym_bon5 } = 8;
            $bb_win_map = array( 0, 0, 4, 4, 4, 4 );
        }
        if ( $goldsvet == 5 )
        {
            ${ "sym".$rnd_sym_bon1 } = 8;
            ${ "sym".$rnd_sym_bon2 } = 8;
            ${ "sym".$rnd_sym_bon3 } = 8;
            ${ "sym".$rnd_sym_bon4 } = 8;
            ${ "sym".$rnd_sym_bon5 } = 8;
            $bb_win_map = array( 0, 0, 6, 6, 6, 6 );
        }
        $casbank = winlimit( );
        $am444 = 0;
        while ( $am444 < 1000000 )
        {
            ++$am444;
            shuffle( &$bb_win_map );
            $bb_win = $bb_win_map[0];
            $bonus_win = $bb_win * $allbet;
            if ( 0 < $bonus_win )
            {
                $am444 = 1500000;
            }
            if ( $casbank <= $bonus_win )
            {
                $am444 = 1;

            }
            if ( $bonus_win == 0 )
            {
                $am444 = 1500000;            }

        }
        if ( $bb_win == 0 )
        {
            $bonus_win = 0;
            if ( $goldsvet == 3 )
            {
                $bs1 = rand( 2, 6 );
                $bs2 = rand( 2, 6 );
                $bs3 = rand( 2, 6 );
                $bs00 = array( 0, 0, 0, 7, 20, 2, 9, 15, 18, 22, 4, 8, 12, 16, 21, 25 );
                shuffle( &$bs00 );
                $bs0 = $bs00[0];
                $bonusik = "&reel=".$bs1."|$bs2|$bs3|$bs0|$bonus_win";
            }
            if ( $goldsvet == 4 )
            {
                $bs1 = rand( 2, 6 );
                $bs2 = rand( 2, 6 );
                $bs3 = rand( 2, 6 );
                $bs00 = array( 2, 9, 15, 18, 22, 4, 8, 12, 16, 21, 25 );
                shuffle( &$bs00 );
                $bs0 = $bs00[0];
                $bs12 = rand( 2, 6 );
                $bs22 = rand( 2, 6 );
                $bs32 = rand( 2, 6 );
                $bs002 = array( 0, 7, 13, 20, 2, 9, 15, 18, 22, 4, 8, 12, 16, 21, 25 );
                shuffle( &$bs002 );
                $bs02 = $bs002[0];
                $bonusik = "&reel=".$bs1."|$bs2|$bs3|$bs0|$bonus_win|reel=$bs12|$bs22|$bs32|$bs02|$bonus_win";
            }
            if ( $goldsvet == 5 )
            {
                $bs1 = rand( 2, 6 );
                $bs2 = rand( 2, 6 );
                $bs3 = rand( 2, 6 );
                $bs00 = array( 2, 9, 15, 18, 22, 4, 8, 12, 16, 21, 25 );
                shuffle( &$bs00 );
                $bs0 = $bs00[0];
                $bs12 = rand( 2, 6 );
                $bs22 = rand( 2, 6 );
                $bs32 = rand( 2, 6 );
                $bs002 = array( 2, 9, 15, 18, 22, 4, 8, 12, 16, 21, 25 );
                shuffle( &$bs002 );
                $bs02 = $bs002[0];
                $bs122 = rand( 2, 6 );
                $bs222 = rand( 2, 6 );
                $bs322 = rand( 2, 6 );
                $bs0022 = array( 0, 7, 13, 20, 2, 9, 15, 18, 22, 4, 8, 12, 16, 21, 25 );
                shuffle( &$bs0022 );
                $bs03 = $bs0022[0];
                $bonusik = "&reel=".$bs1."|$bs2|$bs3|$bs0|$bonus_win|reel=$bs12|$bs22|$bs32|$bs02|$bonus_win|reel=$bs122|$bs222|$bs322|$bs03|$bonus_win";
            }
        }
        if ( $bb_win == 2 )
        {
            $tt = rand( 1, 5 );
            if ( $tt == 1 )
            {
                $bs11 = array( 0, 2, 4 );
                shuffle( &$bs11 );
            }
            if ( $tt == 2 )
            {
                $bs11 = array( 0, 6, 3 );
                shuffle( &$bs11 );
            }
            if ( $tt == 3 )
            {
                $bs11 = array( 0, 5, 1 );
                shuffle( &$bs11 );
            }
            if ( $tt == 4 )
            {
                $bs11 = array( 0, 5, 6 );
                shuffle( &$bs11 );
            }
            if ( $tt == 5 )
            {
                $bs11 = array( 0, 1, 4 );
                shuffle( &$bs11 );
            }
            $bs1 = $bs11[0];
            $bs2 = $bs11[1];
            $bs3 = $bs11[2];
            $bs00 = array( 4, 8, 12, 16, 21, 25 );
            shuffle( &$bs00 );
            $bs0 = $bs00[0];
            $bonusik = "&reel=".$bs1."|$bs2|$bs3|$bs0|$bonus_win";
        }
        if ( $bb_win == 4 )
        {
            $tt = rand( 1, 5 );
            if ( $tt == 1 )
            {
                $bs11 = array( 0, 2, 4 );
                shuffle( &$bs11 );
            }
            if ( $tt == 2 )
            {
                $bs11 = array( 0, 6, 3 );
                shuffle( &$bs11 );
            }
            if ( $tt == 3 )
            {
                $bs11 = array( 0, 5, 1 );
                shuffle( &$bs11 );
            }
            if ( $tt == 4 )
            {
                $bs11 = array( 0, 5, 6 );
                shuffle( &$bs11 );
            }
            if ( $tt == 5 )
            {
                $bs11 = array( 0, 1, 4 );
                shuffle( &$bs11 );
            }
            $bs1 = $bs11[0];
            $bs2 = $bs11[1];
            $bs3 = $bs11[2];
            $bs00 = array( 4, 8, 12, 16, 21, 25 );
            shuffle( &$bs00 );
            $bs0 = $bs00[0];
            $tt = rand( 1, 5 );
            if ( $tt == 1 )
            {
                $bs11 = array( 0, 2, 4 );
                shuffle( &$bs11 );
            }
            if ( $tt == 2 )
            {
                $bs11 = array( 0, 6, 3 );
                shuffle( &$bs11 );
            }
            if ( $tt == 3 )
            {
                $bs11 = array( 0, 5, 1 );
                shuffle( &$bs11 );
            }
            if ( $tt == 4 )
            {
                $bs11 = array( 0, 5, 6 );
                shuffle( &$bs11 );
            }
            if ( $tt == 5 )
            {
                $bs11 = array( 0, 1, 4 );
                shuffle( &$bs11 );
            }
            $bs12 = $bs11[0];
            $bs22 = $bs11[1];
            $bs32 = $bs11[2];
            $bs00 = array( 4, 8, 12, 16, 21, 25 );
            shuffle( &$bs00 );
            $bs02 = $bs00[0];
            $bonus_win1 = $bonus_win / 2;
            $bonus_win2 = $bonus_win;
            $bonusik = "&reel=".$bs1."|$bs2|$bs3|$bs0|$bonus_win1|reel=$bs12|$bs22|$bs32|$bs02|$bonus_win2";
        }
        if ( $bb_win == 6 )
        {
            $tt = rand( 1, 5 );
            if ( $tt == 1 )
            {
                $bs11 = array( 0, 2, 4 );
                shuffle( &$bs11 );
            }
            if ( $tt == 2 )
            {
                $bs11 = array( 0, 6, 3 );
                shuffle( &$bs11 );
            }
            if ( $tt == 3 )
            {
                $bs11 = array( 0, 5, 1 );
                shuffle( &$bs11 );
            }
            if ( $tt == 4 )
            {
                $bs11 = array( 0, 5, 6 );
                shuffle( &$bs11 );
            }
            if ( $tt == 5 )
            {
                $bs11 = array( 0, 1, 4 );
                shuffle( &$bs11 );
            }
            $bs1 = $bs11[0];
            $bs2 = $bs11[1];
            $bs3 = $bs11[2];
            $bs00 = array( 4, 8, 12, 16, 21, 25 );
            shuffle( &$bs00 );
            $bs0 = $bs00[0];
            $tt = rand( 1, 5 );
            if ( $tt == 1 )
            {
                $bs11 = array( 0, 2, 4 );
                shuffle( &$bs11 );
            }
            if ( $tt == 2 )
            {
                $bs11 = array( 0, 6, 3 );
                shuffle( &$bs11 );
            }
            if ( $tt == 3 )
            {
                $bs11 = array( 0, 5, 1 );
                shuffle( &$bs11 );
            }
            if ( $tt == 4 )
            {
                $bs11 = array( 0, 5, 6 );
                shuffle( &$bs11 );
            }
            if ( $tt == 5 )
            {
                $bs11 = array( 0, 1, 4 );
                shuffle( &$bs11 );
            }
            $bs12 = $bs11[0];
            $bs22 = $bs11[1];
            $bs32 = $bs11[2];
            $bs00 = array( 4, 8, 12, 16, 21, 25 );
            shuffle( &$bs00 );
            $bs02 = $bs00[0];
            $tt = rand( 1, 5 );
            if ( $tt == 1 )
            {
                $bs11 = array( 0, 2, 4 );
                shuffle( &$bs11 );
            }
            if ( $tt == 2 )
            {
                $bs11 = array( 0, 6, 3 );
                shuffle( &$bs11 );
            }
            if ( $tt == 3 )
            {
                $bs11 = array( 0, 5, 1 );
                shuffle( &$bs11 );
            }
            if ( $tt == 4 )
            {
                $bs11 = array( 0, 5, 6 );
                shuffle( &$bs11 );
            }
            if ( $tt == 5 )
            {
                $bs11 = array( 0, 1, 4 );
                shuffle( &$bs11 );
            }
            $bs13 = $bs11[0];
            $bs23 = $bs11[1];
            $bs33 = $bs11[2];
            $bs00 = array( 4, 8, 12, 16, 21, 25 );
            shuffle( &$bs00 );
            $bs03 = $bs00[0];
            $bonus_win1 = $bonus_win / 3;
            $bonus_win2 = $bonus_win1 + $bonus_win1;
            $bonus_win3 = $bonus_win;
            $bonusik = "&reel=".$bs1."|$bs2|$bs3|$bs0|$bonus_win1|reel=$bs12|$bs22|$bs32|$bs02|$bonus_win2|reel=$bs13|$bs23|$bs33|$bs03|$bonus_win3|";
        }
        if ( $bb_win == 5 )
        {
            $tt = rand( 1, 5 );
            if ( $tt == 1 )
            {
                $bs11 = array( 1, 2, 4 );
                shuffle( &$bs11 );
            }
            if ( $tt == 2 )
            {
                $bs11 = array( 1, 6, 3 );
                shuffle( &$bs11 );
            }
            if ( $tt == 3 )
            {
                $bs11 = array( 1, 5, 0 );
                shuffle( &$bs11 );
            }
            if ( $tt == 4 )
            {
                $bs11 = array( 1, 5, 6 );
                shuffle( &$bs11 );
            }
            if ( $tt == 5 )
            {
                $bs11 = array( 1, 0, 4 );
                shuffle( &$bs11 );
            }
            $bs1 = $bs11[0];
            $bs2 = $bs11[1];
            $bs3 = $bs11[2];
            $bs00 = array( 2, 9, 15, 18, 22 );
            shuffle( &$bs00 );
            $bs0 = $bs00[0];
            $bonusik = "&reel=".$bs1."|$bs2|$bs3|$bs0|$bonus_win";
        }
        if ( $bb_win == 10 )
        {
            $tt = rand( 1, 5 );
            if ( $tt == 1 )
            {
                $bs11 = array( 2, 0, 4 );
                shuffle( &$bs11 );
            }
            if ( $tt == 2 )
            {
                $bs11 = array( 2, 6, 3 );
                shuffle( &$bs11 );
            }
            if ( $tt == 3 )
            {
                $bs11 = array( 2, 5, 0 );
                shuffle( &$bs11 );
            }
            if ( $tt == 4 )
            {
                $bs11 = array( 2, 5, 6 );
                shuffle( &$bs11 );
            }
            if ( $tt == 5 )
            {
                $bs11 = array( 2, 0, 4 );
                shuffle( &$bs11 );
            }
            $bs1 = $bs11[0];
            $bs2 = $bs11[1];
            $bs3 = $bs11[2];
            $bs00 = array( 5, 11, 17, 24 );
            shuffle( &$bs00 );
            $bs0 = $bs00[0];
            $bonusik = "&reel=".$bs1."|$bs2|$bs3|$bs0|$bonus_win";
        }
        if ( $bb_win == 20 )
        {
            $tt = rand( 1, 5 );
            if ( $tt == 1 )
            {
                $bs11 = array( 3, 0, 4 );
                shuffle( &$bs11 );
            }
            if ( $tt == 2 )
            {
                $bs11 = array( 3, 6, 4 );
                shuffle( &$bs11 );
            }
            if ( $tt == 3 )
            {
                $bs11 = array( 3, 5, 0 );
                shuffle( &$bs11 );
            }
            if ( $tt == 4 )
            {
                $bs11 = array( 3, 5, 6 );
                shuffle( &$bs11 );
            }
            if ( $tt == 5 )
            {
                $bs11 = array( 3, 0, 4 );
                shuffle( &$bs11 );
            }
            $bs1 = $bs11[0];
            $bs2 = $bs11[1];
            $bs3 = $bs11[2];
            $bs00 = array( 3, 10, 23 );
            shuffle( &$bs00 );
            $bs0 = $bs00[0];
            $bonusik = "&reel=".$bs1."|$bs2|$bs3|$bs0|$bonus_win";
        }
        if ( $bb_win == 50 )
        {
            $tt = rand( 1, 5 );
            if ( $tt == 1 )
            {
                $bs11 = array( 4, 0, 2 );
                shuffle( &$bs11 );
            }
            if ( $tt == 2 )
            {
                $bs11 = array( 4, 6, 1 );
                shuffle( &$bs11 );
            }
            if ( $tt == 3 )
            {
                $bs11 = array( 4, 5, 0 );
                shuffle( &$bs11 );
            }
            if ( $tt == 4 )
            {
                $bs11 = array( 4, 5, 6 );
                shuffle( &$bs11 );
            }
            if ( $tt == 5 )
            {
                $bs11 = array( 4, 0, 3 );
                shuffle( &$bs11 );
            }
            $bs1 = $bs11[0];
            $bs2 = $bs11[1];
            $bs3 = $bs11[2];
            $bs00 = array( 1, 14 );
            shuffle( &$bs00 );
            $bs0 = $bs00[0];
            $bonusik = "&reel=".$bs1."|$bs2|$bs3|$bs0|$bonus_win";
        }
        if ( $bb_win == 70 )
        {
            $tt = rand( 1, 5 );
            if ( $tt == 1 )
            {
                $bs11 = array( 5, 0, 2 );
                shuffle( &$bs11 );
            }
            if ( $tt == 2 )
            {
                $bs11 = array( 5, 6, 1 );
                shuffle( &$bs11 );
            }
            if ( $tt == 3 )
            {
                $bs11 = array( 5, 1, 0 );
                shuffle( &$bs11 );
            }
            if ( $tt == 4 )
            {
                $bs11 = array( 5, 1, 6 );
                shuffle( &$bs11 );
            }
            if ( $tt == 5 )
            {
                $bs11 = array( 5, 0, 3 );
                shuffle( &$bs11 );
            }
            $bs1 = $bs11[0];
            $bs2 = $bs11[1];
            $bs3 = $bs11[2];
            $bs00 = array( 6 );
            shuffle( &$bs00 );
            $bs0 = $bs00[0];
            $bonusik = "&reel=".$bs1."|$bs2|$bs3|$bs0|$bonus_win";
        }
        if ( $bb_win == 100 )
        {
            $tt = rand( 1, 5 );
            if ( $tt == 1 )
            {
                $bs11 = array( 6, 0, 2 );
                shuffle( &$bs11 );
            }
            if ( $tt == 2 )
            {
                $bs11 = array( 6, 3, 1 );
                shuffle( &$bs11 );
            }
            if ( $tt == 3 )
            {
                $bs11 = array( 6, 1, 0 );
                shuffle( &$bs11 );
            }
            if ( $tt == 4 )
            {
                $bs11 = array( 6, 1, 4 );
                shuffle( &$bs11 );
            }
            if ( $tt == 5 )
            {
                $bs11 = array( 6, 0, 3 );
                shuffle( &$bs11 );
            }
            $bs1 = $bs11[0];
            $bs2 = $bs11[1];
            $bs3 = $bs11[2];
            $bs00 = array( 19 );
            shuffle( &$bs00 );
            $bs0 = $bs00[0];
            $bonusik = "&reel=".$bs1."|$bs2|$bs3|$bs0|$bonus_win";
        }
        if ( 0 < $bonus_win )
        {
            mysql_query( "update users set cash=cash+'".$bonus_win."' where login='$l'" );
            mysql_query( "update g_set_new set g_bank=g_bank-'".$bonus_win."' where g_name='cocktail'" );
            $stat_txt = "cocktail_bonus";
        }
        $winall = $bonus_win;
    }
    if ( 0 < $winall && $startbon != 1 )
    {
        $winall44 = sprintf( "%01.2f", $winall );
        mysql_query( "update users set cash=cash+'".$winall44."' where login='$l'" );
        mysql_query( "update g_set_new set g_bank=g_bank-'".$winall44."' where g_name='cocktail'" );
        $double_card = rand( 2, 13 );
        $double_card2 = vercard( $double_card );
        $_SESSION['double_card'] = $double_card;
        $_SESSION['double_card2'] = $double_card2;
        $_SESSION['double_win'] = $winall;
    }
    else
    {
        $_SESSION['double_card'] = 0;
        $_SESSION['double_card2'] = "";
        $_SESSION['double_win'] = 0;
    }
    $row = mysql_fetch_array( mysql_query( "select * from users where login='".$l."'" ) );
    $user_balance = floor( $row[3] );
    $winall44 = sprintf( "%01.2f", $winall );
    mysql_query( "INSERT INTO stat_game VALUES('NULL','".$date."','$time','$l','$user_balance','$allbet','$winall44','$stat_txt')" );
    if ( 0 < $winall )
    {
        $user_balance -= $winall;
    }
    echo "OK|".$sym1."|{$sym6}|{$sym11}|{$sym2}|{$sym7}|{$sym12}|{$sym3}|{$sym8}|{$sym13}|{$sym4}|{$sym9}|{$sym14}|{$sym5}|{$sym10}|{$sym15}|{$winall}|{$user_balance}|{$double_card2}".$bonusik;
}
if ( $action == "double" )
{
    $double_card = $_SESSION['double_card'];
    $double_card2 = $_SESSION['double_card2'];
    $double_win = $_SESSION['double_win'];
    mysql_query( "update users set cash=cash-'".$double_win."' where login='{$l}'" );
    mysql_query( "update g_set_new set g_bank=g_bank+'".$double_win."' where g_name='cocktail'" );
    $stat_bet = $double_win;
    $dcard1 = $double_card2;
    $double_user_card = rand( 1, 13 );
    $double_user_card2 = vercard( $double_user_card );
    $double_user_card777 = rand( 1, 1 );
    if ( $double_card < $double_user_card )
    {
        $double_win *= 2;
    }
    if ( $double_user_card < $double_card )
    {
        $double_win = 0;
    }
    if ( $double_user_card == $double_card )
    {
        $double_win = $double_win;
    }
    $casbank = winlimit( );
    if ( $casbank < $double_win )
    {
        if ( $double_card == 1 )
        {
            $double_user_card = $double_card;
        }
        else
        {
            $double_user_card = 2;
        }
        $double_user_card2 = vercard( $double_user_card );
        $double_win /= 2;
    }
    $date = date( "d.m.y" );
    $time = date( "H:i:s" );
    $stat_win = $double_win;
    mysql_query( "INSERT INTO stat_game VALUES('NULL','".$date."','{$time}','{$l}','{$user_balance}','{$stat_bet}','{$stat_win}','cocktail_double')" );
    if ( 0 < $double_win )
    {
        $double_card_new = rand( 1, 13 );
        $double_card_new2 = vercard( $double_card_new );
        $_SESSION['double_card'] = $double_card_new;
        $_SESSION['double_card2'] = $double_card_new2;
        $_SESSION['double_win'] = $double_win;
        mysql_query( "update users set cash=cash+'".$double_win."' where login='{$l}'" );
        mysql_query( "update g_set_new set g_bank=g_bank-'".$double_win."' where g_name='cocktail'" );
    }
    else
    {
        $_SESSION['double_card'] = 0;
        $_SESSION['double_card2'] = "";
        $_SESSION['double_win'] = 0;
        $double_card_new2 = "";
    }
    $row = mysql_fetch_array( mysql_query( "select * from users where login='".$l."'" ) );
    $user_balance = floor( $row[3] );
    if ( 0 < $double_win )
    {
        $user_balance -= $double_win;
    }
    if ( $nado_card == 1 )
    {
        $ucard1 = $double_user_card2;
    }
    else
    {
        $ucard1 = rand( 0, 51 );
    }
    if ( $nado_card == 2 )
    {
        $ucard2 = $double_user_card2;
    }
    else
    {
        $ucard2 = rand( 0, 51 );
    }
    if ( $nado_card == 3 )
    {
        $ucard3 = $double_user_card2;
    }
    else
    {
        $ucard3 = rand( 0, 51 );
    }
    if ( $nado_card == 4 )
    {
        $ucard4 = $double_user_card2;
    }
    else
    {
        $ucard4 = rand( 0, 51 );
    }
    echo "OK|".$dcard1."|{$ucard1}|{$ucard2}|{$ucard3}|{$ucard4}|{$double_win}|{$user_balance}|{$double_card_new2}";
}
?>
