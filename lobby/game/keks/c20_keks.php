<?php

function vercard  ( $dig )
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


error_reporting( 0 );
session_start( );
$l = $_SESSION['l'];

if ( !isset( $l ) )
{
	header( "Location: ../../login.php" );
	exit( );
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

	$user = $l;
	$row = mysql_fetch_array ( mysql_query ( "select * from users where login='".$l."'" ) );
	$user_balance = floor( $row[3] );



	function winlimit ( )
	{
		$_obfuscate_r9d63g   = mysql_fetch_array ( mysql_query ( "select * from g_set_new where g_name='keks'" ) );
		$_obfuscate_vOXntavok2Q  = $_obfuscate_r9d63g  ['g_bank'] / 100 * $_obfuscate_r9d63g  ['g_proc'];
		return $_obfuscate_vOXntavok2Q ;
	}


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

	$row = mysql_fetch_array ( mysql_query ( "select * from users where login='".$l."'" ) );
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
	echo "OK|".$user_balance."|&extralife=9999999999";
}
if ( $action == "play" )
{
	/*
    $host = str_replace( "www.", "", getenv( "HTTP_HOST" ) );
    if ( $host != "azartsoft.co.cc" )
    {
        exit( );
    }
    */

		$stat_txt = "keks";

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
	$rowb9 = mysql_fetch_array ( mysql_query ( "select * from g_set_new where g_name='keks'" ) );
    $proc4 = $rowb9['g_proc'];
	$allbet23 = $allbet / 100 * $proc4;

		mysql_query ( "update users set cash=cash-'".$allbet."' where login='{$l}'" );
		mysql_query ( "update g_set_new set g_bank=g_bank+'".$allbet23."' where g_name='keks'" );

	$row_bon = mysql_fetch_array ( mysql_query ( "select * from g_set_new where g_name='keks'" ) );
	$g_rezim = $row_bon['g_rezim'];
	if ( $g_rezim == 1 )
	{
		$mx2 = array( 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 8, 8 );
	}
	if ( $g_rezim == 2 )
	{
		$mx2 = array( 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 8, 8 );
	}
	if ( $g_rezim == 3 )
	{
		$mx2 = array( 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 7, 7, 7, 7, 8, 8 );
	}
	if ( $g_rezim == 4 )
	{
		$mx2 = array( 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 7, 7, 7, 7, 7, 6, 6, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 8, 8 );
	}
	if ( $g_rezim == 5 )
	{
		$mx2 = array( 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 8, 8 );
	}
	$psym[0] = array( 0, 0, 0, 2, 3, 10 );
	$psym[1] = array( 0, 0, 0, 3, 5, 20 );
	$psym[2] = array( 0, 0, 0, 5, 10, 50 );
	$psym[3] = array( 0, 0, 0, 10, 30, 100 );
	$psym[4] = array( 0, 0, 0, 20, 50, 200 );
	$psym[5] = array( 0, 0, 0, 30, 100, 500 );
	$psym[6] = array( 0, 0, 0, 100, 500, 2000 );
	$psym[7] = array( 0, 0, 0, 200, 1000, 5000 );
	$psym[8] = array( 0, 0, 0, 0, 0, 0 );
	$m_line = array( 5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 10, 11, 12, 13, 14, 0, 6, 12, 8, 4, 10, 6, 2, 8, 14, 0, 1, 7, 3, 4, 10, 11, 7, 13, 14, 5, 11, 12, 13, 9, 5, 1, 2, 3, 9 );
	$km2 = 0;
	$m_ln = 0;
	for ( ;	$m_ln <= 8;	++$m_ln	)
	{
		$km = 0;
		for ( ;	$km <= 4;	++$km	)
		{
			$lin[$m_ln][$km] = $m_line[$km2];
			++$km2;
		}
	}
	$row_bon = mysql_fetch_array ( mysql_query ( "select * from g_set_new where g_name='keks'" ) );
	$g_shansbon = $row_bon['g_shansbon'];
	$shs2 = explode( "|", $g_shansbon );
	$g_shansbon1 = $shs2[0];
	$g_shansbon2 = $shs2[1];
	$g_shansbon3 = $shs2[2];
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
	$casbank = winlimit ( );
	if ( $casbank < $allbet )
	{
		$ooo2 = 2000;
	}
	$rnd_bonus1 = rand( 1, $g_shansbon1 );
	$rnd_result = rand( 1, $ooo2 );
	if ( $rnd_result == 1 )
	{
		$mas_win = 1;
	}
	else
	{
		$mas_win = 0;
	}
	$casbank = winlimit ( );
	$am = 0;
	while ( $am < 100000 )
	{
		$map_win1 = array( 0, 0, 0, 0, 0, 0, 0, 0, 0 );
		$map_win2 = array( 0, 0, 0, 0, 0, 0, 0, 0, 0 );
		$no = 0;
		srand( ( double )microtime( ) * 1000000 );
		shuffle( &$mx2 );
		$k = 0;
		for ( ;	$k <= 14;	++$k	)
		{
			$map[$k] = $mx2[$k];
		}
		$ln = 0;
		for ( ;	$ln <= 8;	++$ln	)
		{
			$s1 = $map[$lin[$ln][0]];
			$s2 = $map[$lin[$ln][1]];
			$s3 = $map[$lin[$ln][2]];
			$s4 = $map[$lin[$ln][3]];
			$s5 = $map[$lin[$ln][4]];
			if ( $s1 == 6 && $s2 == $s3 && $s2 != 7 )
			{
				$s1 = $s2;
				$gg = $s2;
			}
			if ( $s2 == 6 && $s1 == $s3 && $s1 != 7 )
			{
				$s2 = $s3;
				$gg = $s3;
			}
			if ( $s3 == 6 && $s1 == $s2 && $s2 != 7 )
			{
				$s3 = $s2;
				$gg = $s2;
			}
			if ( $s1 == 6 && $s2 == 6 && $s3 != 7 )
			{
				$s1 = $s3;
				$s2 = $s3;
				$gg = $s3;
			}
			if ( $s2 == 6 && $s3 == 6 && $s1 != 7 )
			{
				$s2 = $s1;
				$s3 = $s1;
				$gg = $s1;
			}
			if ( $s1 == 6 && $s3 == 6 && $s2 != 7 )
			{
				$s1 = $s2;
				$s3 = $s2;
				$gg = $s2;
			}
			if ( $s1 == 6 && $s2 == $s3 && $s3 == $s4 && $s2 != 7 )
			{
				$s1 = $s2;
				$gg = $s2;
			}
			if ( $s2 == 6 && $s1 == $s3 && $s3 == $s4 && $s1 != 7 )
			{
				$s2 = $s3;
				$gg = $s3;
			}
			if ( $s3 == 6 && $s1 == $s2 && $s2 == $s3 && $s2 != 7 )
			{
				$s3 = $s2;
				$gg = $s2;
			}
			if ( $s4 == 6 && $s1 == $s2 && $s2 == $s3 && $s2 != 7 )
			{
				$s4 = $s2;
				$gg = $s2;
			}
			if ( $s1 == 6 && $s2 == 6 && $s3 == $s4 && $s3 != 7 )
			{
				$s1 = $s3;
				$s2 = $s3;
				$gg = $s3;
			}
			if ( $s1 == 6 && $s3 == 6 && $s2 == $s4 && $s2 != 7 )
			{
				$s1 = $s2;
				$s3 = $s2;
				$gg = $s2;
			}
			if ( $s1 == 6 && $s4 == 6 && $s2 == $s3 && $s2 != 7 )
			{
				$s1 = $s2;
				$s4 = $s2;
				$gg = $s2;
			}
			if ( $s2 == 6 && $s3 == 6 && $s1 == $s4 && $s1 != 7 )
			{
				$s2 = $s1;
				$s3 = $s1;
				$gg = $s1;
			}
			if ( $s2 == 6 && $s4 == 6 && $s1 == $s3 && $s1 != 7 )
			{
				$s2 = $s1;
				$s4 = $s1;
				$gg = $s1;
			}
			if ( $s3 == 6 && $s4 == 6 && $s1 == $s2 && $s1 != 7 )
			{
				$s3 = $s1;
				$s4 = $s1;
				$gg = $s1;
			}
			if ( $s1 == $s2 && $s2 == $s3 )
			{
				$map_win1[$ln] = $psym[$s2][3];
			}
			if ( $s1 == $s2 && $s2 == $s3 && $s3 == $s4 )
			{
				$map_win1[$ln] = $psym[$s3][4];
			}
			if ( $s1 == $s2 && $s2 == $s3 && $s3 == $s4 && $s4 == $s5 )
			{
				$map_win1[$ln] = $psym[$s3][5];
			}
		}
		$ln = 0;
		for ( ;	$ln <= 8;	++$ln	)
		{
			$s1 = $map[$lin[$ln][0]];
			$s2 = $map[$lin[$ln][1]];
			$s3 = $map[$lin[$ln][2]];
			$s4 = $map[$lin[$ln][3]];
			$s5 = $map[$lin[$ln][4]];
			if ( $s5 == 6 && $s4 == $s3 && $s4 != 7 )
			{
				$s5 = $s4;
				$gg = $s4;
			}
			if ( $s4 == 6 && $s5 == $s3 && $s5 != 7 )
			{
				$s4 = $s3;
				$gg = $s3;
			}
			if ( $s3 == 6 && $s5 == $s4 && $s5 != 7 )
			{
				$s3 = $s4;
				$gg = $s4;
			}
			if ( $s5 == 6 && $s4 == 6 && $s3 != 7 )
			{
				$s5 = $s3;
				$s4 = $s3;
				$gg = $s3;
			}
			if ( $s4 == 6 && $s3 == 6 && $s5 != 7 )
			{
				$s4 = $s5;
				$s3 = $s5;
				$gg = $s5;
			}
			if ( $s5 == 6 && $s3 == 6 && $s4 != 7 )
			{
				$s5 = $s4;
				$s3 = $s4;
				$gg = $s4;
			}
			if ( $s5 == 6 && $s4 == $s3 && $s3 == $s2 && $s4 != 7 )
			{
				$s5 = $s2;
				$gg = $s2;
			}
			if ( $s4 == 6 && $s5 == $s3 && $s3 == $s2 && $s5 != 7 )
			{
				$s4 = $s3;
				$gg = $s3;
			}
			if ( $s3 == 6 && $s5 == $s4 && $s4 == $s3 && $s5 != 7 )
			{
				$s3 = $s4;
				$gg = $s4;
			}
			if ( $s2 == 6 && $s5 == $s4 && $s5 == $s3 && $s5 != 7 )
			{
				$s2 = $s4;
				$gg = $s4;
			}
			if ( $s5 == 6 && $s4 == 6 && $s3 == $s2 && $s3 != 7 )
			{
				$s5 = $s3;
				$s4 = $s3;
				$gg = $s3;
			}
			if ( $s5 == 6 && $s3 == 6 && $s4 == $s2 && $s4 != 7 )
			{
				$s5 = $s4;
				$s3 = $s4;
				$gg = $s4;
			}
			if ( $s5 == 6 && $s2 == 6 && $s3 == $s4 && $s4 != 7 )
			{
				$s5 = $s4;
				$s2 = $s4;
				$gg = $s4;
			}
			if ( $s4 == 6 && $s3 == 6 && $s5 == $s2 && $s5 != 7 )
			{
				$s4 = $s5;
				$s3 = $s5;
				$gg = $s5;
			}
			if ( $s4 == 6 && $s2 == 6 && $s5 == $s3 && $s5 != 7 )
			{
				$s4 = $s5;
				$s2 = $s5;
				$gg = $s5;
			}
			if ( $s3 == 6 && $s2 == 6 && $s5 == $s4 && $s5 != 7 )
			{
				$s3 = $s5;
				$s2 = $s5;
				$gg = $s5;
			}
			if ( $s1 == 6 && $s2 == $s3 && $s3 == $s4 && $s4 == $s5 && $s2 != 7 )
			{
				$s1 = $s2;
				$gg = $s2;
			}
			if ( $s2 == 6 && $s1 == $s3 && $s3 == $s4 && $s4 == $s5 && $s1 != 7 )
			{
				$s2 = $s3;
				$gg = $s3;
			}
			if ( $s3 == 6 && $s1 == $s2 && $s2 == $s4 && $s4 == $s5 && $s1 != 7 )
			{
				$s3 = $s2;
				$gg = $s2;
			}
			if ( $s4 == 6 && $s1 == $s2 && $s2 == $s3 && $s3 == $s5 && $s1 != 7 )
			{
				$s4 = $s2;
				$gg = $s2;
			}
			if ( $s1 == 6 && $s2 == 6 && $s3 == $s4 && $s4 == $s5 && $s5 != 7 )
			{
				$s1 = $s3;
				$s2 = $s3;
				$gg = $s3;
			}
			if ( $s1 == 6 && $s3 == 6 && $s2 == $s4 && $s4 == $s5 && $s2 != 7 )
			{
				$s1 = $s2;
				$s3 = $s2;
				$gg = $s2;
			}
			if ( $s1 == 6 && $s4 == 6 && $s2 == $s3 && $s3 == $s5 && $s2 != 7 )
			{
				$s1 = $s2;
				$s4 = $s2;
				$gg = $s2;
			}
			if ( $s1 == 6 && $s5 == 6 && $s2 == $s3 && $s3 == $s4 && $s2 != 7 )
			{
				$s1 = $s2;
				$s5 = $s2;
				$gg = $s2;
			}
			if ( $s2 == 6 && $s3 == 6 && $s1 == $s4 && $s4 == $s5 && $s1 != 7 )
			{
				$s2 = $s1;
				$s3 = $s1;
				$gg = $s1;
			}
			if ( $s2 == 6 && $s4 == 6 && $s1 == $s3 && $s3 == $s5 && $s1 != 7 )
			{
				$s2 = $s1;
				$s4 = $s1;
				$gg = $s1;
			}
			if ( $s2 == 6 && $s5 == 6 && $s1 == $s3 && $s3 == $s4 && $s1 != 7 )
			{
				$s2 = $s1;
				$s5 = $s1;
				$gg = $s1;
			}
			if ( $s3 == 6 && $s4 == 6 && $s1 == $s2 && $s2 == $s5 && $s1 != 7 )
			{
				$s3 = $s1;
				$s4 = $s1;
				$gg = $s1;
			}
			if ( $s3 == 6 && $s5 == 6 && $s1 == $s2 && $s2 == $s4 && $s1 != 7 )
			{
				$s3 = $s1;
				$s5 = $s1;
				$gg = $s1;
			}
			if ( $s4 == 6 && $s5 == 6 && $s1 == $s2 && $s2 == $s3 && $s1 != 7 )
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
			if ( $s5 == $s4 && $s4 == $s3 && $s3 == $s2 && $s2 == $s1 )
			{
				$map_win2[$ln] = $psym[$s3][5];
			}
			if ( $map_win1[$ln] < $map_win2[$ln] )
			{
				$map_win1[$ln] = 0;
			}
			if ( $map_win2[$ln] <= $map_win1[$ln] )
			{
				$map_win2[$ln] = 0;
			}
		}
		$k = 1;
		for ( ;	$k <= 15;	++$k	)
		{
			${ "sym".$k } = $map[$k - 1];
		}
		$k = 1;
		for ( ;	$k <= 9;	++$k	)
		{
			${ "win_1".$k } = $bet * $map_win1[$k - 1];
		}
		$k = 1;
		for ( ;	$k <= 9;	++$k	)
		{
			${ "win_2".$k } = $bet * $map_win2[$k - 1];
		}
		$k = 1;
		for ( ;	$k <= 9;	++$k	)
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
		if ( $mas_win == 0 && $winall == 0 && $rnd_bonus1 == 1 )
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
			continue;
		}
	}
	if ( $startbon == 1 )
	{
		$rnd_sym_bon0 = rand( 1, 3 );
		$rnd_sym_bon1 = rand( 4, 6 );
		$rnd_sym_bon2 = rand( 7, 9 );
		${ "sym".$rnd_sym_bon0 } = 8;
		${ "sym".$rnd_sym_bon1 } = 8;
		${ "sym".$rnd_sym_bon2 } = 8;
		$casbank = winlimit ( );
		$ttt = array( 0, 5, 8, 12, 17, 42, 25, 22, 13, 20 );
		$bbbb3 = array( 0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 1, 2 );
		$am444 = 0;
		while ( $am444 < 100000 )
		{
			shuffle( &$ttt );
			$ttt = $ttt[0];
			++$am444;
			$bonus_win = $ttt * $allbet;
			if ( $g_shansbon3 == 1 )
			{
				$g_shansbon3 = 2;
			}
			$rnd_bonus3 = rand( 1, $g_shansbon3 );
			if ( $rnd_bonus3 == 1 )
			{
				shuffle( &$bbbb3 );
				$rnd_bonus3_1 = $bbbb3[0];
				if ( $rnd_bonus3_1 == 0 )
				{
					$bonus_win += 0;
					$idol = "super=0|";
				}
				if ( $rnd_bonus3_1 == 1 )
				{
					$bonus_win = $bonus_win + $allbet * 1;
					$idol = "super=1|";
				}
				if ( $rnd_bonus3_1 == 2 )
				{
					$bonus_win = $bonus_win + $allbet * 2;
					$idol = "super=2|";
				}
				if ( $rnd_bonus3_1 == 5 )
				{
					$bonus_win = $bonus_win + $allbet * 5;
					$idol = "super=5|";
				}
				if ( $rnd_bonus3_1 == 10 )
				{
					$bonus_win = $bonus_win + $allbet * 10;
					$idol = "super=10|";
				}
				if ( $rnd_bonus3_1 == 15 )
				{
					$bonus_win = $bonus_win + $allbet * 15;
					$idol = "super=15|";
				}
				if ( $rnd_bonus3_1 == 20 )
				{
					$bonus_win = $bonus_win + $allbet * 20;
					$idol = "super=20|";
				}
				if ( $rnd_bonus3_1 == 25 )
				{
					$bonus_win = $bonus_win + $allbet * 25;
					$idol = "super=25|";
				}
				if ( $rnd_bonus3_1 == 30 )
				{
					$bonus_win = $bonus_win + $allbet * 30;
					$idol = "super=30|";
				}
				if ( $rnd_bonus3_1 == 35 )
				{
					$bonus_win = $bonus_win + $allbet * 35;
					$idol = "super=35|";
				}
				if ( $rnd_bonus3_1 == 40 )
				{
					$bonus_win = $bonus_win + $allbet * 40;
					$idol = "super=40|";
				}
				if ( $rnd_bonus3_1 == 45 )
				{
					$bonus_win = $bonus_win + $allbet * 45;
					$idol = "super=45|";
				}
				if ( $rnd_bonus3_1 == 50 )
				{
					$bonus_win = $bonus_win + $allbet * 50;
					$idol = "super=50|";
				}
			}
			if ( 0 < $bonus_win )
			{
				$am444 = 150000;
			}
			if ( $casbank <= $bonus_win )
			{
				$am444 = 1;
			}
			if ( $bonus_win == 0 )
			{
				$am444 = 150000;
			}
		}
		if ( $ttt == 0 )
		{
			$bonusik = "&hole=0|".$idol;
		}
		if ( $ttt == 5 )
		{
			$bonusik = "&hole=5|".$idol;
		}
		if ( $ttt == 8 )
		{
			$bonusik = "&hole=8|".$idol;
		}
		if ( $ttt == 12 )
		{
			$bonusik = "&hole=12|".$idol;
		}
		if ( $ttt == 17 )
		{
			$bonusik = "&hole=17|".$idol;
		}
		if ( $ttt == 42 )
		{
			$tttr = rand( 1, 3 );
			if ( $tttr == 1 )
			{
				$bonusik = "&hole=5|hole=8|hole=12|hole=17|".$idol;
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&hole=8|hole=17|hole=12|hole=5|".$idol;
			}
			if ( $tttr == 3 )
			{
				$bonusik = "&hole=12|hole=17|hole=5|hole=8|".$idol;
			}
		}
		if ( $ttt == 25 )
		{
			$tttr = rand( 1, 4 );
			if ( $tttr == 1 )
			{
				$bonusik = "&hole=5|hole=8|hole=12|".$idol;
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&hole=12|hole=5|hole=8|".$idol;
			}
			if ( $tttr == 3 )
			{
				$bonusik = "&hole=8|hole=12|hole=5|".$idol;
			}
			if ( $tttr == 4 )
			{
				$bonusik = "&hole=8|hole=17|".$idol;
			}
		}
		if ( $ttt == 22 )
		{
			$tttr = rand( 1, 2 );
			if ( $tttr == 1 )
			{
				$bonusik = "&hole=5|hole=17|".$idol;
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&hole=17|hole=5|".$idol;
			}
		}
		if ( $ttt == 13 )
		{
			$tttr = rand( 1, 2 );
			if ( $tttr == 1 )
			{
				$bonusik = "&hole=5|hole=8|".$idol;
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&hole=8|hole=5|".$idol;
			}
		}
		if ( $ttt == 20 )
		{
			$tttr = rand( 1, 2 );
			if ( $tttr == 1 )
			{
				$bonusik = "&hole=12|hole=8|".$idol;
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&hole=8|hole=12|".$idol;
			}
		}
		if ( 0 < $bonus_win )
		{

				mysql_query ( "update users set cash=cash+'".$bonus_win."' where login='{$l}'" );
				mysql_query ( "update g_set_new set g_bank=g_bank-'".$bonus_win."' where g_name='keks'" );
				$stat_txt = "keks_bonus";

		}
		$winall = $bonus_win;
	}
	if ( 0 < $winall && $startbon != 1 )
	{
		$winall44 = sprintf( "%01.2f", $winall );

			mysql_query ( "update users set cash=cash+'".$winall44."' where login='{$l}'" );
			mysql_query ( "update g_set_new set g_bank=g_bank-'".$winall44."' where g_name='keks'" );

		$double_card = rand( 2, 13 );
		$double_card2 = vercard  ( $double_card );
		$GLOBALS['_SESSION']['double_card'] = $double_card;
		$GLOBALS['_SESSION']['double_card2'] = $double_card2;
		$GLOBALS['_SESSION']['double_win'] = $winall;
	}
	else
	{
		$GLOBALS['_SESSION']['double_card'] = 0;
		$GLOBALS['_SESSION']['double_card2'] = "";
		$GLOBALS['_SESSION']['double_win'] = 0;
	}

		$row = mysql_fetch_array ( mysql_query ( "select * from users where login='".$l."'" ) );
		$user_balance = floor( $row[3] );

	$winall44 = sprintf( "%01.2f", $winall );
	mysql_query ( "INSERT INTO stat_game VALUES('NULL','".$date."','{$time}','{$l}','{$user_balance}','{$allbet}','{$winall44}','{$stat_txt}')" );
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

		mysql_query ( "update users set cash=cash-'".$double_win."' where login='{$l}'" );
		mysql_query ( "update g_set_new set g_bank=g_bank+'".$double_win."' where g_name='keks'" );

	$stat_bet = $double_win;
	$dcard1 = $double_card2;
	$double_user_card = rand( 1, 13 );
	$double_user_card2 = vercard  ( $double_user_card );
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
	$casbank = winlimit ( );
	if ( $casbank < $double_win )
	{
		if ( $double_card == 1 )
		{
			$double_user_card = $double_card;
			$double_user_card2 = vercard  ( $double_user_card );
			$double_win /= 2;
		}
		else
		{
			$double_user_card = $double_card - 1;
			$double_user_card2 = vercard  ( $double_user_card );
			$double_win = 0;
		}
	}
	$date = date( "d.m.y" );
	$time = date( "H:i:s" );
	$stat_win = $double_win;

		mysql_query ( "INSERT INTO stat_game VALUES('NULL','".$date."','{$time}','{$l}','{$user_balance}','{$stat_bet}','{$stat_win}','keks_double')" );

	if ( 0 < $double_win )
	{
		$double_card_new = rand( 1, 13 );
		$double_card_new2 = vercard  ( $double_card_new );
		$GLOBALS['_SESSION']['double_card'] = $double_card_new;
		$GLOBALS['_SESSION']['double_card2'] = $double_card_new2;
		$GLOBALS['_SESSION']['double_win'] = $double_win;

			mysql_query ( "update users set cash=cash+'".$double_win."' where login='{$l}'" );
			mysql_query ( "update g_set_new set g_bank=g_bank-'".$double_win."' where g_name='keks'" );

	}
	else
	{
		$GLOBALS['_SESSION']['double_card'] = 0;
		$GLOBALS['_SESSION']['double_card2'] = "";
		$GLOBALS['_SESSION']['double_win'] = 0;
		$double_card_new2 = "";
	}

		$row = mysql_fetch_array ( mysql_query ( "select * from users where login='".$l."'" ) );
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