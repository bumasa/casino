<?
error_reporting(0);
include ("../setup_virtual.php");
$resultg=mysql_query("select * from seting ");
$rog=mysql_fetch_array($resultg);
$Users = array($rog[0] => $rog[1]);
session_start();
session_register("SESSION");
if (! isset($SESSION)) {
$SESSION = array();
}
if($event=='exit') {
unset ($SESSION["password"]);
unset ($SESSION["username"]);
}
if($enter) { 
$SESSION["username"] = $user;
$SESSION["password"] = $passw;
} 
$username = $SESSION["username"];
$password = $SESSION["password"];
$dd = array_search($password, $Users);
?>

<style type=text/css>
input { FONT-FAMILY: MS Sans Serif; FONT-SIZE: 10px; }
select { FONT-FAMILY: MS Sans Serif; FONT-SIZE: 10px; }
a:hover { color: #86869B }
a:visited { color: navy }
a { color: navy }
a:active { color: #ff0000 }
body { FONT-FAMILY: Times New Roman; FONT-SIZE: 13pt; COLOR: #1F1F1F; }
</style>

<? if (empty($password) or $dd !== $username) { ?>
<center>
<form action="<?=$PHP_SELF?>" method="post"><br><br><br><br><br><br>
<h3 style="color:green">Вход для администратора</h3>
<table align="center" border="0">
	<tr>
		<td align="center" colspan="2"><b></td>
	</tr>
	<tr>
		<td align="right">Логин:</td>
		<td><input type="text" name="user" size="22"></td>
	</tr>
	<tr>
		<td align="right">Пароль:</td>
		<td><input type="password" name="passw" size="22"></td>
	</tr>
	<tr>
		<td align="right"></td>
		<td><input type="submit" value="Войти" name="enter">

</td>
</tr>
<tr>
<td align="right" colspan="2">
</td>
</tr>
</table>
</form>
<? 
die(); 
} 
?>