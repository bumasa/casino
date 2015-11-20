<?php
error_reporting( 0 );
session_start( );
$l = $_SESSION['l'];
do
{
    if ( isset( $l ) )
        break;
    header( "Location: ../../index.php" );
    exit( );
} while( 0 );
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
$result = mysql_query( "select * from users where login='".$l."'" );
$row = mysql_fetch_array( $result );
$balance = floor( $row[3] );
echo "\r\n<root>\r\n<status>ok</status>\r\n<md5_random_key></md5_random_key>\r\n<new_game>0</new_game>\r\n<credits>".$balance."</credits>\r\n<credits_real></credits_real>\r\n<credits_demo></credits_demo>\r\n</root>\r\n";
echo "\r\n";
?>