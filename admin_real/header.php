<?
include "../setup.php";
include("auth.php");
$date=date("d.m.y");
$data=date("d.m.y");
?>


<html>
<head>
<title>Админка</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="text.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#ffffff" text="#000000">

<div align="center">
<table width="100%" cellspacing="0" cellpadding="0" bgcolor="#000000" border="0"><tr><td>
<table width="100%" cellspacing="1" cellpadding="0" border="0">
<tr>
<td>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
<td bgcolor="#F8F8FF" align="left" valign="middle" width="99%">
<?
$strok=mysql_query("SELECT * FROM users");
$strokinbase = mysql_num_rows($strok);
$strok=mysql_query("SELECT * FROM zakaz WHERE 1 AND flag=1");
$strokinbase2 = mysql_num_rows($strok);
$resultg=mysql_query("select * from game_bank where name='ttuz'");
$rog=mysql_fetch_array($resultg);
?>
Всего игроков: <? echo $strokinbase; ?><br>
Новых заказов: <? echo $strokinbase2; ?><br>
В банке казино: <? echo $rog[1]; ?> руб.

</td>
<td bgcolor="#FF7F50" class="header" width="468" height="60" align="right" valign="middle">
  <div align="center"><b>admin real</b>
    
  </div></td>
</tr>
</table>

</td>
</tr>
</table>
</td></tr>
</table>

<br />

<table width="100%" cellspacing="0" cellpadding="2" border="0">
<tr>
<td width="170" valign="top" style="padding-left: 0px">

<table width="100%" cellspacing="0" cellpadding="0" bgcolor="#000000" border="0"><tr><td>
<table width="100%" cellspacing="1" cellpadding="2" border="0">
<tr>
<td bgcolor="F8F8FF">
<center>Навигация</center>
<a href=index.php>Главная</a><br>
<a href=?event=exit>Выход</a><br>
<center>Игроки\Партнеры</center>
<a href=userlist.php>Список игроков</a><br>
<a href=part.php>Список партнеров</a><br>
<center>Финансы</center>
<a href=zakazlist.php>Заказы на выплату</a><br>
<a href=userpay.php>Изм. баланс игроку</a><br>
<center>Насторйки</center>
<a href=config.php>Настройка Казино</a><br>
<a href=bank.php>Параметры Банка</a><br>
<center>Новости</center>
<a href=news.php>Редактор новостей</a><br>
<a href=sendnews.php>Рассылка новостей</a><br>

</td>
</tr></table></td></tr></table><br>


</td>

<td valign="top" style="padding-right: 0px;">

<table width="100%" cellspacing="0" cellpadding="0" bgcolor="#000000" border="0"><tr><td>
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
<td bgcolor="ffffff">
