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
    ${ "ЇЧzЮ" } = mysql_fetch_array( mysql_query( "select * from g_set_new_cr where g_name='crmonkey'" ) );
    ${ "]«Od|ы" } = ${ "ЇЧzЮ" }['g_bank'];
    return ${ "]«Od|ы" };
}

error_reporting( 0 );
session_start( );
$l = $_SESSION['l'];

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
$row_bon = mysql_fetch_array( mysql_query( "select * from g_set_new_cr where g_name='crmonkey'" ) );
$g_cask = $row_bon['g_cask'];
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
if ( $action == "init" )
{
    echo "OK|".$user_balance."&extralife=$g_cask";
}
if ( $action == "play" )
{

    $stat_txt = "crmonkey";
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
    $rowb9 = mysql_fetch_array( mysql_query( "select * from g_set_new_cr where g_name='crmonkey'" ) );
    $proc4 = $rowb9['g_proc'];
    $allbet23 = $allbet / 100 * $proc4;
    mysql_query( "update g_set_new_cr set g_bank=g_bank+'".$allbet23."' where g_name='crmonkey'" );
    $row_bon = mysql_fetch_array( mysql_query( "select * from g_set_new_cr where g_name='crmonkey'" ) );
    $g_rezim = $row_bon['g_rezim'];
    if ( $g_rezim == 1 )
    {
        $mx2 = array( 0, 0, 0, 8, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6, 6, 7, 7 );
    }
    if ( $g_rezim == 2 )
    {
        $mx2 = array( 0, 0, 0, 8, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7 );
    }
    if ( $g_rezim == 3 )
    {
        $mx2 = array( 0, 0, 0, 8, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 7, 7, 7 );
    }
    if ( $g_rezim == 4 )
    {
        $mx2 = array( 0, 0, 0, 8, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7 );
    }
    if ( $g_rezim == 5 )
    {
        $mx2 = array( 0, 0, 0, 8, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7 );
    }
    $psym[0] = array( 0, 0, 0, 100, 500, 2000 ); // черееп
    $psym[1] = array( 0, 0, 0, 2, 3, 10 ); // бабочка
    $psym[2] = array( 0, 0, 0, 3, 5, 20 ); // банан
    $psym[3] = array( 0, 0, 0, 5, 10, 50 );  // вроде змия
    $psym[4] = array( 0, 0, 0, 10, 30, 100 );  // наковальня
    $psym[5] = array( 0, 0, 0, 20, 50, 200 );   // кокос 
    $psym[6] = array( 0, 0, 0, 30, 100, 500 );  // лев
    $psym[7] = array( 0, 0, 0, 200, 1000, 5000 ); // надпись
    $psym[8] = array( 0, 0, 0, 0, 0, 0 ); // 
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
    $row_bon = mysql_fetch_array( mysql_query( "select * from g_set_new_cr where g_name='crmonkey'" ) );
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
        $map_win3 = array( 0, 0, 0, 0, 0, 0, 0, 0, 0 );
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
            if ( $s2 == 0 && $s3 == $s4 )
            {
                $s2 = $s3;
                $gg = $s3;
            }
            if ( $s3 == 0 && $s2 == $s4 )
            {
                $s3 = $s4;
                $gg = $s4;
            }
            if ( $s4 == 0 && $s2 == $s3 )
            {
                $s4 = $s2;
                $gg = $s2;
            }
            if ( $s2 == 0 && $s3 == 0 )
            {
                $s2 = $s4;
                $s3 = $s4;
                $gg = $s4;
            }
            if ( $s3 == 0 && $s4 == 0 )
            {
                $s3 = $s2;
                $s4 = $s2;
                $gg = $s2;
            }
            if ( $s2 == 0 && $s4 == 0 )
            {
                $s2 = $s3;
                $s4 = $s3;
                $gg = $s3;
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
                $map_win3[$ln] = 0;
            }
            if ( !( $s1 == $s2 ) || !( $s2 == $s3 ) || !( $s3 == $s4 ) )
            {
                    continue;
            }
            else
            {
                $map_win1[$ln] = $psym[$s3][4];
                $map_win3[$ln] = 0;
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
                $map_win3[$ln] = 0;
            }
            if ( $s5 == $s4 && $s4 == $s3 && $s3 == $s2 )
            {
                $map_win2[$ln] = $psym[$s3][4];
                $map_win3[$ln] = 0;
            }
            if ( !( $s1 == $s2 ) || !( $s2 == $s3 ) || !( $s3 == $s4 ) || !( $s4 == $s5 ) )
            {
                    continue;
            }
            else
            {
                $map_win2[$ln] = $psym[$s3][5];
                $map_win1[$ln] = 0;
                $map_win3[$ln] = 0;
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
            ${ "win_3".$k } = $bet * $map_win3[$k - 1];
        }
        $k = 1;
        for ( ; $k <= 9; ++$k )
        {
            ${ "win".$k } = ${ "win_1".$k } + ${ "win_2".$k } + ${ "win_3".$k };
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
            $am = 1;
        }
        if ( $no == 1 )
        {
            $am = 10;
        }

    }
    $bonusik = "&extralife=$g_cask";

    if ( $startbon == 1 )
    {
        ${ "sym".rand( 1, 3 ) } = 8;
        ${ "sym".rand( 4, 6 ) } = 8;
        ${ "sym".rand( 7, 9 ) } = 8;
        $casbank = winlimit( );
        $ttt1 = array( 0, 1, 2, 3, 4, 5, 10, 15, 20, 25 );
        $am444 = 0;
        while ( $am444 < 100000 )
        {
            shuffle( &$ttt1 );
            $ttt11 = $ttt1[0];
            ++$am444;
            $bonus_win = $ttt11 * $allbet;
            if ( 0 < $bonus_win )
            {
                $am444 = 150000;
            }
            if ( $casbank <= $bonus_win )
            {
$ttt11 = 0;
$bonus_win = 0;

            }

        }
        if ( $ttt11 == 0 )
        {
           
$tt1=0;
$tt2=0;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
        }
        if ( $ttt11 == 1 )
        {

$tt1=1;
$tt2=0;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
        }
        if ( $ttt11 == 2 )
        {
            $tttr = rand( 1, 2 );
            if ( $tttr == 1 )
            {
$tt1=2;
$tt2=0;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 2 )
            {
$tt1=1;
$tt2=1;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
        }
        if ( $ttt11 == 3 )
        {
            $tttr = rand( 1, 4 );
            if ( $tttr == 1 )
            {
$tt1=3;
$tt2=0;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 2 )
            {
$tt1=2;
$tt2=1;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 3 )
            {
$tt1=1;
$tt2=2;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 4 )
            {

$tt1=1;
$tt2=1;
$tt3=1;
$tt4=0;
$tt5=0;
$tt6=0;
            }
        }
        if ( $ttt11 == 4 )
        {
            $tttr = rand( 1, 6 );
            if ( $tttr == 1 )
            {
 $tt1=4;
$tt2=0;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 2 )
            {
 $tt1=2;
$tt2=2;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 3 )
            {
 $tt1=2;
$tt2=1;
$tt3=1;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 4 )
            {
$tt1=3;
$tt2=1;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 5 )
            {
 $tt1=1;
$tt2=3;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 6 )
            {
$tt1=1;
$tt2=2;
$tt3=1;
$tt4=0;
$tt5=0;
$tt6=0;
            }
        }
        if ( $ttt11 == 5 )
        {
            $tttr = rand( 1, 7 );
            if ( $tttr == 1 )
            {
$tt1=5;
$tt2=0;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 2 )
            {
 $tt1=2;
$tt2=3;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 3 )
            {
 $tt1=3;
$tt2=2;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 4 )
            {
$tt1=1;
$tt2=1;
$tt3=3;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 5 )
            {
$tt1=2;
$tt2=1;
$tt3=2;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 6 )
            {
$tt1=2;
$tt2=2;
$tt3=1;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 7 )
            {
 $tt1=3;
$tt2=1;
$tt3=1;
$tt4=0;
$tt5=0;
$tt6=0;
            }
        }
        if ( $ttt11 == 10 )
        {
            $tttr = rand( 1, 5 );
            if ( $tttr == 1 )
            {
$tt1=10;
$tt2=0;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 2 )
            {
$tt1=5;
$tt2=5;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 3 )
            {
$tt1=3;
$tt2=2;
$tt3=5;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 4 )
            {
 $tt1=5;
$tt2=2;
$tt3=3;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 5 )
            {
 $tt1=5;
$tt2=3;
$tt3=2;
$tt4=0;
$tt5=0;
$tt6=0;
            }
        }
        if ( $ttt11 == 15 )
        {
            $tttr = rand( 1, 4 );
            if ( $tttr == 1 )
            {
$tt1=15;
$tt2=0;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 2 )
            {
$tt1=5;
$tt2=5;
$tt3=5;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 3 )
            {
$tt1=10;
$tt2=5;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 4 )
            {
$tt1=5;
$tt2=10;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
        }
        if ( $ttt11 == 20 )
        {

            {
                $tttr = rand( 1, 5 );
            }
            if ( $tttr == 1 )
            {
$tt1=20;
$tt2=0;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 2 )
            {
$tt1=10;
$tt2=10;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 3 )
            {
$tt1=15;
$tt2=5;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 4 )
            {
$tt1=5;
$tt2=15;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 5 )
            {
$tt1=5;
$tt2=5;
$tt3=5;
$tt4=5;
$tt5=0;
$tt6=0;
            }
        }
        if ( $ttt11 == 25 )
        {
            $tttr = rand( 1, 5 );
            if ( $tttr == 1 )
            {
 $tt1=25;
$tt2=0;
$tt3=0;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 2 )
            {
$tt1=10;
$tt2=10;
$tt3=5;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 3 )
            {
$tt1=5;
$tt2=10;
$tt3=10;
$tt4=0;
$tt5=0;
$tt6=0;
            }
            if ( $tttr == 4 )
            {
$tt1=10;
$tt2=5;
$tt3=10;
$tt4=0;
$tt5=0;
$tt6=0;
            }


            if ( $tttr == 5 )
            {
$tt1=5;
$tt2=5;
$tt3=5;
$tt4=5;
$tt5=5;
$tt6=0;
            }


        }



$bonusik = "&sk=".$tt1."|sk=$tt2|sk=$tt3|sk=$tt4|sk=$tt5|sk=$tt6&extralife=$g_cask";


























        if ( 0 < $bonus_win )
        {
            mysql_query( "update users set cash=cash+'".$bonus_win."' where login='$l'" );
            mysql_query( "update g_set_new_cr set g_bank=g_bank-'".$bonus_win."' where g_name='crmonkey'" );
        }
        $stat_txt = "crmonkey_don";
        $winall = $bonus_win;
    }

    if ( 0 < $winall && $startbon != 1 )
    {
        $winall44 = sprintf( "%01.2f", $winall );
        mysql_query( "update users set cash=cash+'".$winall44."' where login='$l'" );
        mysql_query( "update g_set_new_cr set g_bank=g_bank-'".$winall44."' where g_name='crmonkey'" );
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
    mysql_query( "update g_set_new_cr set g_bank=g_bank+'".$double_win."' where g_name='crmonkey'" );
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
    mysql_query( "INSERT INTO stat_game VALUES('NULL','".$date."','{$time}','{$l}','{$user_balance}','{$stat_bet}','{$stat_win}','crmonkey_double')" );
    if ( 0 < $double_win )
    {
        $double_card_new = rand( 1, 13 );
        $double_card_new2 = vercard( $double_card_new );
        $_SESSION['double_card'] = $double_card_new;
        $_SESSION['double_card2'] = $double_card_new2;
        $_SESSION['double_win'] = $double_win;
        mysql_query( "update users set cash=cash+'".$double_win."' where login='{$l}'" );
        mysql_query( "update g_set_new_cr set g_bank=g_bank-'".$double_win."' where g_name='crmonkey'" );
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
