<? include "header.php"; ?>

<center><h4><font color=#7C87C2>История платежей игрока: <? echo $user; ?></font></h4>

<table border style="BORDER-COLLAPSE: collapse" cellspacing=0 cellpadding=3>
<tr><td class=text1><b>Логин</b></td><td class=text1><b>Дата</b></td><td class=text1><b>Время</b></td><td class=text1><b>Приход</b></td><td class=text1><b>Расход</b></td></tr>
<?
$result=mysql_query("select * from stat_pay WHERE user ='$user' ");
while($row=mysql_fetch_array($result))
{
echo "
<tr><td class=text1>$row[0]</td><td class=text1>$row[1]</td><td class=text1>$row[2]</td><td class=text1>$row[3]</td><td class=text1>$row[4]</td></tr>
";
}
?>
</table>
</center>
<? include "footer.php"; ?>