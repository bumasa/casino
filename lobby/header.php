<?
Error_Reporting(E_ALL & ~E_NOTICE);
unset($l);
session_start();
session_register($l);
if(!isset($l)){
header("Location: login.php");
exit;
}
if ($st == "exit"){
unset($l);
session_destroy();
echo "<script language=\"JavaScript\">location.href=\"../index.php\";</script>";
}
include ("../setup.php");
include ("../fun.php");

$row=mysql_fetch_array(mysql_query("select * from users where login='$l'"));
$conf=mysql_fetch_array(mysql_query("select * from seting"));

?>

<html>
<head>
<title>Интернет-казино с играми на виртуальные и реальные деньги</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1251">
<META HTTP-EQUIV="EXPIRES" CONTENT="0">
<META NAME="RESOURCE-TYPE" CONTENT="DOCUMENT">
<META NAME="DISTRIBUTION" CONTENT="GLOBAL">
<META NAME="AUTHOR" CONTENT="azartsoft.co.cc">
<META NAME="COPYRIGHT" CONTENT="Copyright (c)  www.azartsoft.co.cc">
<META NAME="KEYWORDS" CONTENT="казино, интернет-казино, азартные игры, рулетка, игра покер онлайн, виртуальное казино, онлайн, фишка, игровые автоматы, игровые слоты, играть на webmoney, играть на фишки, fun, casino">
<META NAME="DESCRIPTION" CONTENT="Азартные игры на webmoney">
<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
<META NAME="REVISIT-AFTER" CONTENT="1 DAYS">
<META NAME="RATING" CONTENT="GENERAL">
<META NAME="GENERATOR" CONTENT="azartsoft.co.cc - Copyright http://azartsoft.co.cc">
<LINK REL="StyleSheet" HREF="../image/style.css" TYPE="text/css">
</head>

<body bgcolor="#505050" text="#000000" link="#363636" vlink="#363636" alink="#d5ae83"><table border="0" cellspacing="0" cellpadding="0" style=" width:766px; " align="center">
  <tr>
    <td>
	
	<table width="100%" style="height:100%;  " border="0" cellspacing="0" cellpadding="0">	 
	  <tr>
		<td height="295" valign="top">

		
		<table width="100%" style="height:100%;  " border="0" cellspacing="0" cellpadding="0">
		  <tr>
			<td width="100%" valign="top">
			<table cellspacing="0" cellpadding="0" style="width:100%; height:100%;">
			  <tr>
              <center>
<OBJECT 
codeBase=http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0 
classid=clsid:D27CDB6E-AE6D-11cf-96B8-444553540000 width="766" height="295">
<param name="bgcolor" value="#000000">
<param name="scale" value="ExactFit">
<param name="movie" value="flash/headerV81.swf">
<embed src="flash/headerV81.swf" width="766" height="295" bgcolor="#000000" border="0" scale="ExactFit" 
type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
</OBJECT>
</CENTER>
				
			  </tr>
			</table>			
			</td>
		  </tr>

		</table>
		
		</td>
	  </tr>	  
	</table>
	
    </td>
  </tr> 
<? include ("left.php");?>
