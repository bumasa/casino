<?
include ("header.php");
include ("setup.php");
include ("setup_virtual.php");
?>


<td width="2px"><img src="image/spacer.gif" width="2px" height=1></td><td valign="top" width="100%" style=" margin:0; padding:0 4 10 4px; "><div style="margin:0; padding:0; "><img src="image/spacer.gif" width="300px" height=1></div>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="left" valign="top" style="background-color:#000000; border:1px solid #6E2500; padding:1px; ">
<table width="100%" style="height:100%; border:1px solid #2E2E2E;  " border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top">
<div style="padding-left:10px; padding-top:5px; padding-bottom:10px; padding-right:0px">
<center><font class="option" color="#FFFFFF"><b>Активация аккаунта в интернет казино <? echo $con[4]; ?></b></font></center>
<br><br>
<center>
<?
echo "";
if (isset($_GET['code']) && preg_match('/^[A-Fa-f0-9]{32}$/',$_GET['code'])) {
$user_sql_query = mysql_query("SELECT id FROM users WHERE check_mail = '0' and MD5(CONCAT(login,pass,'".date("z")."'))= '".$_GET['code']."' limit 0, 1", $full_base);
if (mysql_num_rows($user_sql_query) == 1) {
$user_array=mysql_fetch_array($user_sql_query);
mysql_query("UPDATE users SET check_mail=1 WHERE id = '".$user_array['id']."'", $full_base);
mysql_query("UPDATE users SET check_mail=1 WHERE id = '".$user_array['id']."'", $fun_base);
echo "<font class=option color=#FFFFFF>Аккаунт успешно активирован!</font>";
} else {
echo "<font class=option color=#FFFFFF>Неверный код, или аккаунт уже был активирован!</font>";
}
} else {
echo "<font class=option color=#FFFFFF>Не правильно переданный параметр!</font>";
}
?>
</center>
</div>
</td>
</tr>
</table>
</td>
</tr>
</table>

<?
include ("footer.php");
?>