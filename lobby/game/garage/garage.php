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
	$c14 = array( 52, 52, 52, 52 );
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
		$_obfuscate_r9d63g   = mysql_fetch_array ( mysql_query ( "select * from g_set_new_g where g_name='garage'" ) );
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

if ( $action != "superkey" )
{
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
}
if ( $action == "superkey" )
{
	unset( $sk );
	$GLOBALS['_SESSION']['sk'] = 0;
	$sk = $_SESSION['sk'];
	$sk2 = 0;
	echo "&sk=0";
}
if ( $action == "error" )
{
	echo "error|error";
}
if ( $action == "initg" )
{
	echo "OK|".$user_balance."|";
}
if ( $action == "playg" )
{
	/*
    $host = str_replace( "www.", "", getenv( "HTTP_HOST" ) );
    if ( $host != "azartsoft.co.cc" )
    {
        exit( );
    }
    */

	$g_bon_123 = 0;

		$stat_txt = "garage";

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
	$rowb9 = mysql_fetch_array ( mysql_query ( "select * from g_set_new_g where g_name='garage'" ) );
	$proc4 = $rowb9['g_proc'];
	$allbet23 = $allbet / 100 * $proc4;

		mysql_query ( "update users set cash=cash-'".$allbet."' where login='{$l}'" );
		mysql_query ( "update g_set_new_g set g_bank=g_bank+'".$allbet23."' where g_name='garage'" );

	$row_bon = mysql_fetch_array ( mysql_query ( "select * from g_set_new_g where g_name='garage'" ) );
	$g_rezim = $row_bon['g_rezim'];
	if ( $g_rezim == 1 )
	{
		$mx2 = array( 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 7, 7, 8, 8 );
	}
	if ( $g_rezim == 2 )
	{
		$mx2 = array( 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 6, 6, 6, 6, 7, 7, 8, 8 );
	}
	if ( $g_rezim == 3 )
	{
		$mx2 = array( 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 6, 6, 6, 6, 7, 7, 8, 8 );
	}
	if ( $g_rezim == 4 )
	{
		$mx2 = array( 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 6, 6, 6, 6, 7, 7, 8, 8 );
	}
	if ( $g_rezim == 5 )
	{
		$mx2 = array( 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 7, 7, 8, 8 );
	}
	$psym[0] = array( 0, 0, 0, 2, 3, 10 );
	$psym[1] = array( 0, 0, 0, 3, 5, 20 );
	$psym[2] = array( 0, 0, 0, 5, 10, 50 );
	$psym[3] = array( 0, 0, 0, 10, 30, 100 );
	$psym[4] = array( 0, 0, 0, 20, 50, 200 );
	$psym[5] = array( 0, 0, 0, 50, 200, 1000 );
	$psym[6] = array( 0, 0, 0, 100, 500, 5000 );
	$psym[7] = array( 0, 0, 0, 0, 0, 0 );
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
			continue;
		}
	}
	$row_bon = mysql_fetch_array ( mysql_query ( "select * from g_set_new_g where g_name='garage'" ) );
	$g_shansbon = $row_bon['g_shansbon'];
	$shs2 = explode( "|", $g_shansbon );
	$g_shansbon1 = $shs2[0];
	$g_shansbon2 = $shs2[1];
	$g_shansbon3 = $shs2[2];
	if ( $g_shansbon1 == 1 )
	{
		$g_shansbon1 = 2;
	}
	if ( $g_shansbon2 == 1 )
	{
		$g_shansbon2 = 2;
	}
	if ( $g_shansbon3 == 1 )
	{
		$g_shansbon3 = 2;
	}
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
		$ooo2 = 200000;
	}
	$rnd_bonus1 = rand( 1, $g_shansbon1 );
	$rnd_bonus2 = rand( 1, $g_shansbon2 );
	if ( $rnd_bonus1 == 1 && $rnd_bonus2 == 1 )
	{
		$rnd_bonus1 = 3;
		$rnd_bonus2 = 3;
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
			if ( $s1 == 6 && $s2 == $s3 )
			{
				$s1 = $s2;
				$gg = $s2;
			}
			if ( $s2 == 6 && $s1 == $s3 )
			{
				$s2 = $s3;
				$gg = $s3;
			}
			if ( $s3 == 6 && $s1 == $s2 )
			{
				$s3 = $s2;
				$gg = $s2;
			}
			if ( $s1 == 6 && $s2 == 6 )
			{
				$s1 = $s3;
				$s2 = $s3;
				$gg = $s3;
			}
			if ( $s2 == 6 && $s3 == 6 )
			{
				$s2 = $s1;
				$s3 = $s1;
				$gg = $s1;
			}
			if ( $s1 == 6 && $s3 == 6 )
			{
				$s1 = $s2;
				$s3 = $s2;
				$gg = $s2;
			}
			if ( $s1 == 6 && $s2 == $s3 && $s3 == $s4 )
			{
				$s1 = $s2;
				$gg = $s2;
			}
			if ( $s2 == 6 && $s1 == $s3 && $s3 == $s4 )
			{
				$s2 = $s3;
				$gg = $s3;
			}
			if ( $s3 == 6 && $s1 == $s2 && $s2 == $s3 )
			{
				$s3 = $s2;
				$gg = $s2;
			}
			if ( $s4 == 6 && $s1 == $s2 && $s2 == $s3 )
			{
				$s4 = $s2;
				$gg = $s2;
			}
			if ( $s1 == 6 && $s2 == 6 && $s3 == $s4 )
			{
				$s1 = $s3;
				$s2 = $s3;
				$gg = $s3;
			}
			if ( $s1 == 6 && $s3 == 6 && $s2 == $s4 )
			{
				$s1 = $s2;
				$s3 = $s2;
				$gg = $s2;
			}
			if ( $s1 == 6 && $s4 == 6 && $s2 == $s3 )
			{
				$s1 = $s2;
				$s4 = $s2;
				$gg = $s2;
			}
			if ( $s2 == 6 && $s3 == 6 && $s1 == $s4 )
			{
				$s2 = $s1;
				$s3 = $s1;
				$gg = $s1;
			}
			if ( $s2 == 6 && $s4 == 6 && $s1 == $s3 )
			{
				$s2 = $s1;
				$s4 = $s1;
				$gg = $s1;
			}
			if ( $s3 == 6 && $s4 == 6 && $s1 == $s2 )
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
			if ( $s1 == 6 && $s2 == 6 && $s3 == 6 )
			{
				$no = 1;
			}
			if ( $s2 == 6 && $s3 == 6 && $s4 == 6 )
			{
				$no = 1;
			}
			if ( $s3 == 6 && $s4 == 6 && $s5 == 6 )
			{
				$no = 1;
			}
			if ( $s1 == 6 && $s2 == 6 && $s3 == 6 && $s4 == 6 )
			{
				$no = 1;
			}
			if ( $s2 == 6 && $s3 == 6 && $s4 == 6 && $s5 == 6 )
			{
				$no = 1;
			}
			if ( $s1 == 6 && $s2 == 6 && $s3 == 6 && $s4 == 6 && $s5 == 6 )
			{
				$no = 1;
			}
			if ( $s5 == 6 && $s4 == $s3 )
			{
				$s5 = $s4;
				$gg = $s4;
			}
			if ( $s4 == 6 && $s5 == $s3 )
			{
				$s4 = $s3;
				$gg = $s3;
			}
			if ( $s3 == 6 && $s5 == $s4 )
			{
				$s3 = $s4;
				$gg = $s4;
			}
			if ( $s5 == 6 && $s4 == 6 )
			{
				$s5 = $s3;
				$s4 = $s3;
				$gg = $s3;
			}
			if ( $s4 == 6 && $s3 == 6 )
			{
				$s4 = $s5;
				$s3 = $s5;
				$gg = $s5;
			}
			if ( $s5 == 6 && $s3 == 6 )
			{
				$s5 = $s4;
				$s3 = $s4;
				$gg = $s4;
			}
			if ( $s5 == 6 && $s4 == $s3 && $s3 == $s2 )
			{
				$s5 = $s2;
				$gg = $s2;
			}
			if ( $s4 == 6 && $s5 == $s3 && $s3 == $s2 )
			{
				$s4 = $s3;
				$gg = $s3;
			}
			if ( $s3 == 6 && $s5 == $s4 && $s4 == $s3 )
			{
				$s3 = $s4;
				$gg = $s4;
			}
			if ( $s2 == 6 && $s5 == $s4 && $s5 == $s3 )
			{
				$s2 = $s4;
				$gg = $s4;
			}
			if ( $s5 == 6 && $s4 == 6 && $s3 == $s2 )
			{
				$s5 = $s3;
				$s4 = $s3;
				$gg = $s3;
			}
			if ( $s5 == 6 && $s3 == 6 && $s4 == $s2 )
			{
				$s5 = $s4;
				$s3 = $s4;
				$gg = $s4;
			}
			if ( $s5 == 6 && $s2 == 6 && $s3 == $s3 )
			{
				$s5 = $s4;
				$s2 = $s4;
				$gg = $s4;
			}
			if ( $s4 == 6 && $s3 == 6 && $s5 == $s2 )
			{
				$s4 = $s5;
				$s3 = $s5;
				$gg = $s5;
			}
			if ( $s4 == 6 && $s2 == 6 && $s5 == $s3 )
			{
				$s4 = $s5;
				$s2 = $s5;
				$gg = $s5;
			}
			if ( $s3 == 6 && $s2 == 6 && $s5 == $s4 )
			{
				$s3 = $s5;
				$s2 = $s5;
				$gg = $s5;
			}
			if ( $s1 == 6 && $s2 == $s3 && $s3 == $s4 && $s4 == $s5 )
			{
				$s1 = $s2;
				$gg = $s2;
			}
			if ( $s2 == 6 && $s1 == $s3 && $s3 == $s4 && $s4 == $s5 )
			{
				$s2 = $s3;
				$gg = $s3;
			}
			if ( $s3 == 6 && $s1 == $s2 && $s2 == $s3 && $s4 == $s5 )
			{
				$s3 = $s2;
				$gg = $s2;
			}
			if ( $s4 == 6 && $s1 == $s2 && $s2 == $s3 && $s3 == $s5 )
			{
				$s4 = $s2;
				$gg = $s2;
			}
			if ( $s1 == 6 && $s2 == 6 && $s3 == $s4 && $s4 == $s5 )
			{
				$s1 = $s3;
				$s2 = $s3;
				$gg = $s3;
			}
			if ( $s1 == 6 && $s3 == 6 && $s2 == $s4 && $s4 == $s5 )
			{
				$s1 = $s2;
				$s3 = $s2;
				$gg = $s2;
			}
			if ( $s1 == 6 && $s4 == 6 && $s2 == $s3 && $s3 == $s5 )
			{
				$s1 = $s2;
				$s4 = $s2;
				$gg = $s2;
			}
			if ( $s1 == 6 && $s5 == 6 && $s2 == $s3 && $s3 == $s4 )
			{
				$s1 = $s2;
				$s5 = $s2;
				$gg = $s2;
			}
			if ( $s2 == 6 && $s3 == 6 && $s1 == $s4 && $s4 == $s5 )
			{
				$s2 = $s1;
				$s3 = $s1;
				$gg = $s1;
			}
			if ( $s2 == 6 && $s4 == 6 && $s1 == $s3 && $s3 == $s5 )
			{
				$s2 = $s1;
				$s4 = $s1;
				$gg = $s1;
			}
			if ( $s2 == 6 && $s5 == 6 && $s1 == $s3 && $s3 == $s4 )
			{
				$s2 = $s1;
				$s5 = $s1;
				$gg = $s1;
			}
			if ( $s3 == 6 && $s4 == 6 && $s1 == $s2 && $s2 == $s5 )
			{
				$s3 = $s1;
				$s4 = $s1;
				$gg = $s1;
			}
			if ( $s3 == 6 && $s5 == 6 && $s1 == $s2 && $s2 == $s4 )
			{
				$s3 = $s1;
				$s5 = $s1;
				$gg = $s1;
			}
			if ( $s4 == 6 && $s5 == 6 && $s1 == $s2 && $s2 == $s3 )
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
			$startbon1 = 1;
		}
		if ( $mas_win == 0 && $winall == 0 && $rnd_bonus2 == 1 )
		{
			$am = 120000;
			$startbon2 = 1;
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
			$am = 10;
		}
	}
	$sk_t = 0;
	$k = 0;
	for ( ;	$k <= 14;	++$k	)
	{
		if ( $map[$k] == 8 )
		{
			$sk_t += 1;
		}
	}
	if ( $sk_t == 2 )
	{
		$sk = $_SESSION['sk'];
		$sk += 1;
		$GLOBALS['_SESSION']['sk'] = $sk;
	}
	$sk = $_SESSION['sk'];
	$sk2 = $sk - 1;
	$bonusik = "&sk=".$sk2."&sk2|";
	if ( $startbon1 == 1 && $startbon2 != 1 )
	{
		${ "sym".rand( 1, 3 ) } = 8;
		${ "sym".rand( 4, 6 ) } = 8;
		${ "sym".rand( 7, 9 ) } = 8;
		$casbank = winlimit ( );
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
			if ( $bonus_win == 0 )
			{
				continue;
			}
		}
		if ( $ttt11 == 0 )
		{
			$bonusik = "&sk=".$sk2."&key=0|";
		}
		if ( $ttt11 == 1 )
		{
			$bonusik = "&sk=".$sk2."&key=1|";
		}
		if ( $ttt11 == 2 )
		{
			$tttr = rand( 1, 2 );
			if ( $tttr == 1 )
			{
				$bonusik = "&sk=".$sk2."&key=2|";
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&sk=".$sk2."&key=1|key=1|";
			}
		}
		if ( $ttt11 == 3 )
		{
			$tttr = rand( 1, 4 );
			if ( $tttr == 1 )
			{
				$bonusik = "&sk=".$sk2."&key=3|";
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&sk=".$sk2."&key=1|key=2|";
			}
			if ( $tttr == 3 )
			{
				$bonusik = "&sk=".$sk2."&key=2|key=1|";
			}
			if ( $tttr == 4 )
			{
				$bonusik = "&sk=".$sk2."&key=1|key=1|key=1|";
			}
		}
		if ( $ttt11 == 4 )
		{
			$tttr = rand( 1, 6 );
			if ( $tttr == 1 )
			{
				$bonusik = "&sk=".$sk2."&key=4|";
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&sk=".$sk2."&key=2|key=2|";
			}
			if ( $tttr == 3 )
			{
				$bonusik = "&sk=".$sk2."&key=2|key=1|key=1|";
			}
			if ( $tttr == 4 )
			{
				$bonusik = "&sk=".$sk2."&key=3|key=1|";
			}
			if ( $tttr == 5 )
			{
				$bonusik = "&sk=".$sk2."&key=1|key=3|";
			}
			if ( $tttr == 6 )
			{
				$bonusik = "&sk=".$sk2."&key=1|key=2|key=1|";
			}
		}
		if ( $ttt11 == 5 )
		{
			$tttr = rand( 1, 7 );
			if ( $tttr == 1 )
			{
				$bonusik = "&sk=".$sk2."&key=5|";
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&sk=".$sk2."&key=2|key=3|";
			}
			if ( $tttr == 3 )
			{
				$bonusik = "&sk=".$sk2."&key=3|key=2|";
			}
			if ( $tttr == 4 )
			{
				$bonusik = "&sk=".$sk2."&key=1|key=1|key=3|";
			}
			if ( $tttr == 5 )
			{
				$bonusik = "&sk=".$sk2."&key=2|key=1|key=2|";
			}
			if ( $tttr == 6 )
			{
				$bonusik = "&sk=".$sk2."&key=2|key=2|key=1|";
			}
			if ( $tttr == 7 )
			{
				$bonusik = "&sk=".$sk2."&key=3|key=1|key=1|";
			}
		}
		if ( $ttt11 == 10 )
		{
			$tttr = rand( 1, 5 );
			if ( $tttr == 1 )
			{
				$bonusik = "&sk=".$sk2."&key=10|";
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&sk=".$sk2."&key=5|key=5|";
			}
			if ( $tttr == 3 )
			{
				$bonusik = "&sk=".$sk2."&key=3|key=2|key=5|";
			}
			if ( $tttr == 4 )
			{
				$bonusik = "&sk=".$sk2."&key=5|key=2|key=3|";
			}
			if ( $tttr == 5 )
			{
				$bonusik = "&sk=".$sk2."&key=5|key=3|key=2|";
			}
		}
		if ( $ttt11 == 15 )
		{
			$tttr = rand( 1, 4 );
			if ( $tttr == 1 )
			{
				$bonusik = "&sk=".$sk2."&key=15|";
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&sk=".$sk2."&key=5|key=5|key=5|";
			}
			if ( $tttr == 3 )
			{
				$bonusik = "&sk=".$sk2."&key=10|key=5|";
			}
			if ( $tttr == 4 )
			{
				$bonusik = "&sk=".$sk2."&key=5|key=10|";
			}
		}
		if ( $ttt11 == 20 )
		{
			if ( 8 <= $sk2 )
			{
				$tttr = rand( 1, 4 );
			}
			else
			{
				$tttr = rand( 1, 5 );
			}
			if ( $tttr == 1 )
			{
				$bonusik = "&sk=".$sk2."&key=20|";
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&sk=".$sk2."&key=10|key=10|";
			}
			if ( $tttr == 3 )
			{
				$bonusik = "&sk=".$sk2."&key=15|key=5|";
			}
			if ( $tttr == 4 )
			{
				$bonusik = "&sk=".$sk2."&key=5|key=15|";
			}
			if ( $tttr == 5 )
			{
				$bonusik = "&sk=".$sk2."&key=5|key=5|key=5|key=5|";
			}
		}
		if ( $ttt11 == 25 )
		{
			$tttr = rand( 1, 4 );
			if ( $tttr == 1 )
			{
				$bonusik = "&sk=".$sk2."&key=25|";
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&sk=".$sk2."&key=10|key=10|key=5|";
			}
			if ( $tttr == 3 )
			{
				$bonusik = "&sk=".$sk2."&key=5|key=10|key=10|";
			}
			if ( $tttr == 4 )
			{
				$bonusik = "&sk=".$sk2."&key=10|key=5|key=10|";
			}
		}
		if ( 0 < $bonus_win )
		{

				mysql_query ( "update users set cash=cash+'".$bonus_win."' where login='{$l}'" );
				mysql_query ( "update g_set_new_g set g_bank=g_bank-'".$bonus_win."' where g_name='garage'" );
				$stat_txt = "garag_bonus";

		}
		$winall = $bonus_win;
	}
	if ( $startbon2 == 1 && $startbon1 != 1 )
	{
		$k = 1;
		for ( ;	$k <= 15;	++$k	)
		{
			if ( ${ "sym".$k } == 8 )
			{
				${ "sym".$k } = rand( 1, 5 );
			}
		}
		${ "sym".rand( 1, 3 ) } = 7;
		${ "sym".rand( 4, 6 ) } = 7;
		${ "sym".rand( 7, 9 ) } = 7;
		$casbank = winlimit ( );
		$ttt = array( 0, 5, 10, 15, 20, 25 );
		$am444 = 0;
		while ( $am444 < 100000 )
		{
			shuffle( &$ttt );
			$ttt = $ttt[1];
			++$am444;
			$bonus_win = $ttt * $allbet;
			if ( 0 < $bonus_win )
			{
				$am444 = 150000;
			}
			if ( $casbank < $bonus_win )
			{
				$am444 = 1;
			}
			if ( $bonus_win == 0 )
			{
				continue;
			}
		}

			$row_bon1 = mysql_fetch_array ( mysql_query ( "select * from g_set_new_g where g_name='garage'" ) );
			$g_bon1 = $row_bon1['g_bon1'];
			$g_bon2 = $row_bon1['g_bon2'];
			$g_bon3 = $row_bon1['g_bon3'];
			$g_bon1_1 = $row_bon1['g_bon1_1'];
			$g_bon1_2 = $row_bon1['g_bon1_2'];
			$g_bon1_3 = $row_bon1['g_bon1_3'];

		$ren_start = rand( 1, $g_shansbon3 );
		if ( $ren_start == 1 )
		{
			$g_jp2 = 0;
			$g_jp = 0;
			$bonus_win = 0;
			$ren = rand( 1, 3 );
			if ( $ren == 3 )
			{
				$ttt = 1;
				$g_jp = $allbet * 4;
				$g_jp2 = $allbet * 1;
				$g_jp_t = $g_jp + $g_jp2;
				$n = 1;
				$casbank = winlimit ( );
				if ( $casbank <= $g_jp_t )
				{
					$ren = 2;
					$g_bon_123 = 0;
					$g_jp = 0;
					$g_jp2 = 0;
					$n = 0;
				}

					mysql_query ( "update g_set_new_g set g_bank=g_bank-'".$g_jp."' where g_name='garage'" );
					mysql_query ( "update g_set_new_g set g_bon1_3=g_bon1_3+".$g_jp." where g_name='garage'" );
					mysql_query ( "update g_set_new_g set g_bon3=g_bon3+{$n} where g_name='garage'" );
					if ( $g_bon3 == 4 )
					{
						$g_bon_123 = $g_bon1_3 + $g_jp;
						mysql_query ( "update g_set_new_g set g_bon1_3=0 where g_name='garage'" );
						mysql_query ( "update g_set_new_g set g_bon3=0 where g_name='garage'" );
					}


			}
			if ( $ren == 2 )
			{
				$ttt = 2;
				$g_jp = $allbet * 3;
				$g_jp2 = $allbet * 2;
				$g_jp_t = $g_jp + $g_jp2;
				$n = 1;
				$casbank = winlimit ( );
				if ( $casbank <= $g_jp_t )
				{
					$ren = 1;
					$g_bon_123 = 0;
					$g_jp = 0;
					$g_jp2 = 0;
					$n = 0;
				}

					mysql_query ( "update g_set_new_g set g_bank=g_bank-'".$g_jp."' where g_name='garage'" );
					mysql_query ( "update g_set_new_g set g_bon1_2=g_bon1_2+".$g_jp." where g_name='garage'" );
					mysql_query ( "update g_set_new_g set g_bon2=g_bon2+{$n} where g_name='garage'" );
					if ( $g_bon2 == 4 )
					{
						$g_bon_123 = $g_bon1_2 + $g_jp;
						mysql_query ( "update g_set_new_g set g_bon1_2=0 where g_name='garage'" );
						mysql_query ( "update g_set_new_g set g_bon2=0 where g_name='garage'" );
					}


			}
			if ( $ren == 1 )
			{
				$ttt = 3;
				$g_jp = $allbet * 2;
				$g_jp2 = $allbet * 3;
				$g_jp_t = $g_jp + $g_jp2;
				$n = 1;
				$casbank = winlimit ( );
				if ( $casbank <= $g_jp_t )
				{
					$ren = 0;
					$ttt = 0;
					$g_bon_123 = 0;
					$g_jp = 0;
					$g_jp2 = 0;
					$n = 0;
				}

					mysql_query ( "update g_set_new_g set g_bank=g_bank-'".$g_jp."' where g_name='garage'" );
					mysql_query ( "update g_set_new_g set g_bon1_1=g_bon1_1+".$g_jp." where g_name='garage'" );
					mysql_query ( "update g_set_new_g set g_bon1=g_bon1+{$n} where g_name='garage'" );
					if ( $g_bon1 == 4 )
					{
						$g_bon_123 = $g_bon1_1 + $g_jp;
						mysql_query ( "update g_set_new_g set g_bon1_1=0 where g_name='garage'" );
						mysql_query ( "update g_set_new_g set g_bon1=0 where g_name='garage'" );
					}


			}
		}
		$e = $g_bon1.$g_bon2.$g_bon3."=".$g_bon1_1."=".$g_bon1_2."=".$g_bon1_3;
		if ( $ttt == 1 )
		{
			$bonusik = "&sk=".$sk2."&be=1|e={$e}|";
		}
		if ( $ttt == 2 )
		{
			$bonusik = "&sk=".$sk2."&be=2|e={$e}|";
		}
		if ( $ttt == 3 )
		{
			$bonusik = "&sk=".$sk2."&be=3|e={$e}|";
		}
		if ( $ttt == 0 )
		{
			$bonusik = "&sk=".$sk2."&be=0|e={$e}|";
		}
		if ( $ttt == 5 )
		{
			$bonusik = "&sk=".$sk2."&be=5|e={$e}|";
		}
		if ( $ttt == 10 )
		{
			$tttr = rand( 1, 2 );
			if ( $tttr == 1 )
			{
				$bonusik = "&sk=".$sk2."&be=10|e={$e}|";
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&sk=".$sk2."&be=5|be=5|e={$e}|";
			}
		}
		if ( $ttt == 15 )
		{
			$tttr = rand( 1, 4 );
			if ( $tttr == 1 )
			{
				$bonusik = "&sk=".$sk2."&be=15|e={$e}|";
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&sk=".$sk2."&be=5|be=5|be=5|e={$e}|";
			}
			if ( $tttr == 3 )
			{
				$bonusik = "&sk=".$sk2."&be=10|be=5|e={$e}|";
			}
			if ( $tttr == 4 )
			{
				$bonusik = "&sk=".$sk2."&be=5|be=10|e={$e}|";
			}
		}
		if ( $ttt == 20 )
		{
			$tttr = rand( 1, 8 );
			if ( $tttr == 1 )
			{
				$bonusik = "&sk=".$sk2."&be=20|e={$e}|";
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&sk=".$sk2."&be=5|be=5|be=5|be=5|e={$e}|";
			}
			if ( $tttr == 3 )
			{
				$bonusik = "&sk=".$sk2."&be=10|be=5|be=5|e={$e}|";
			}
			if ( $tttr == 4 )
			{
				$bonusik = "&sk=".$sk2."&be=5|be=5|be=10|e={$e}|";
			}
			if ( $tttr == 5 )
			{
				$bonusik = "&sk=".$sk2."&be=10|be=10|e={$e}|";
			}
			if ( $tttr == 6 )
			{
				$bonusik = "&sk=".$sk2."&be=5|be=10|be=5|e={$e}|";
			}
			if ( $tttr == 7 )
			{
				$bonusik = "&sk=".$sk2."&be=15|be=5|e={$e}|";
			}
			if ( $tttr == 8 )
			{
				$bonusik = "&sk=".$sk2."&be=5|be=15|e={$e}|";
			}
		}
		if ( $ttt == 25 )
		{
			$tttr = rand( 1, 8 );
			if ( $tttr == 1 )
			{
				$bonusik = "&sk=".$sk2."&be=25|e={$e}|";
			}
			if ( $tttr == 2 )
			{
				$bonusik = "&sk=".$sk2."&be=5|be=5|be=5|be=5|be=5|e={$e}|";
			}
			if ( $tttr == 3 )
			{
				$bonusik = "&sk=".$sk2."&be=10|be=5|be=5|be=5|e={$e}|";
			}
			if ( $tttr == 4 )
			{
				$bonusik = "&sk=".$sk2."&be=5|be=5|be=10|be=5|e={$e}|";
			}
			if ( $tttr == 5 )
			{
				$bonusik = "&sk=".$sk2."&be=10|be=10|be=5|e={$e}|";
			}
			if ( $tttr == 6 )
			{
				$bonusik = "&sk=".$sk2."&be=5|be=10|be=5|be=5|e={$e}|";
			}
			if ( $tttr == 7 )
			{
				$bonusik = "&sk=".$sk2."&be=15|be=5|be=5|e={$e}|";
			}
			if ( $tttr == 8 )
			{
				$bonusik = "&sk=".$sk2."&be=5|be=15|be=5|e={$e}|";
			}
		}
		$bonus_win1 = $bonus_win;
		$bonus_win2 = $g_jp2 + $g_bon_123;
		$bonus_win3 = $g_jp2;
		$bonus_win = $bonus_win1 + $bonus_win2;
		if ( 0 < $bonus_win )
		{

				mysql_query ( "update users set cash=cash+'".$bonus_win."' where login='{$l}'" );
				mysql_query ( "update g_set_new_g set g_bank=g_bank-'".$bonus_win1."' where g_name='garage'" );
				mysql_query ( "update g_set_new_g set g_bank=g_bank-'".$bonus_win3."' where g_name='garage'" );


		}

			$stat_txt = "garage_bonus2";


		$winall = $bonus_win;
	}
	if ( 0 < $winall && $startbon1 != 1 && $startbon2 != 1 )
	{
		$winall44 = sprintf( "%01.2f", $winall );

			mysql_query ( "update users set cash=cash+'".$winall44."' where login='{$l}'" );
			mysql_query ( "update g_set_new_g set g_bank=g_bank-'".$winall44."' where g_name='garage'" );

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
		mysql_query ( "update g_set_new_g set g_bank=g_bank+'".$double_win."' where g_name='garage'" );


	$stat_bet = $double_win;
	$dcard1 = $double_card2;
	$double_user_card = rand( 1, 14 );
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

		mysql_query ( "INSERT INTO stat_game VALUES('NULL','".$date."','{$time}','{$l}','{$user_balance}','{$stat_bet}','{$stat_win}','garage_double')" );

	if ( 0 < $double_win )
	{
		$double_card_new = rand( 1, 13 );
		$double_card_new2 = vercard  ( $double_card_new );
		$GLOBALS['_SESSION']['double_card'] = $double_card_new;
		$GLOBALS['_SESSION']['double_card2'] = $double_card_new2;
		$GLOBALS['_SESSION']['double_win'] = $double_win;

			mysql_query ( "update users set cash=cash+'".$double_win."' where login='{$l}'" );
			mysql_query ( "update g_set_new_g set g_bank=g_bank-'".$double_win."' where g_name='garage'" );

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
		$ucard1 = rand( 0, 55 );
	}
	if ( $nado_card == 2 )
	{
		$ucard2 = $double_user_card2;
	}
	else
	{
		$ucard2 = rand( 0, 55 );
	}
	if ( $nado_card == 3 )
	{
		$ucard3 = $double_user_card2;
	}
	else
	{
		$ucard3 = rand( 0, 55 );
	}
	if ( $nado_card == 4 )
	{
		$ucard4 = $double_user_card2;
	}
	else
	{
		$ucard4 = rand( 0, 55 );
	}
	echo "OK|".$dcard1."|{$ucard1}|{$ucard2}|{$ucard3}|{$ucard4}|{$double_win}|{$user_balance}|{$double_card_new2}";
}
?>