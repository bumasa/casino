<? include "header.php"; ?>
<center>
<h4><font color=#7C87C2>Статистика игрока: <? echo $user; ?><br><br></font></h4>

<table border=0 width="70%">



<tr><td class=text1>
<?
// Меню игр 
$result=mysql_query("select * from menu_stat");
while($row=mysql_fetch_array($result))
{
echo "$row[0]$user$row[1]";
}
?>
</td>
<td class=text1>
<a href=stat_game.php?user=<? echo $user; ?>>Статистика по играм.</a><br><br>
<a href=stat_pay.php?user=<? echo $user; ?>>Список платежей / выплат.</a><br><br>
<a href=stat_par.php?user=<? echo $user; ?>>Статистика партнерки.</a><br><br>
</td></tr>

</table>
</center>
<? include "footer.php"; ?>