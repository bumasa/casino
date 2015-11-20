<? include "header.php"; ?>
<center><h4><font color=#7C87C2>История игр игрока: <? echo $user; ?></font></h4>
<table border style="BORDER-COLLAPSE: collapse" cellspacing=0 cellpadding=3>
<tr><td class=text1><b>№</b></td><td class=text1><b>Название игры</b></td><td class=text1><b>Дата</b></td><td class=text1><b>Время</b></td><td class=text1><b>Логин</b></td><td class=text1><b>Баланс</b></td><td class=text1><b>Ставка</b></td><td class=text1><b>Выигрыш</b></td></tr>
<?
$lstcount =100;
$result=mysql_query("select * from stat_game WHERE login ='$user' ");
$strokinbase = mysql_num_rows($result);
If ($lst == "") { $lst = "1"; }
$lfrom = (integer) $lst * $lstcount - $lstcount;
$lto = (integer) $lst * $lstcount;
If ($lto > $strokinbase) { $lto = $strokinbase; }
for ($i = $lfrom; $i < $lto; $i++) {
$row=mysql_fetch_array(mysql_query("SELECT * FROM stat_game WHERE login ='$user' LIMIT $i , $strokinbase"));
echo "
<tr><td class=text1>$row[0]</td><td class=text1>$row[7]</td><td class=text1>$row[1]</td><td class=text1>$row[2]</td><td class=text1>$row[3]</td><td class=text1>$row[4]</td><td class=text1>$row[5]</td><td class=text1>$row[6]</td></tr>
";
}
?>
</table>
<?
for ($c = 1; $c <= ceil ($strokinbase / $lstcount); $c++) {
If ($lst == $c) {
echo "<font size=2><a href='?user=$user&lst=$c'>[$c]</a></font>";
}
Else 
{
echo "<font size=2><a href='?user=$user&lst=$c'>$c</a></font>";
}
If ($c <> ceil($strokinbase / $lstcount)) {
echo " ";
}
}
?>
</center>
<? include "footer.php"; ?>