<? include "header.php"; ?>
<center><h4><font color=#7C87C2>���������� �� ���������</font></h4></center>
<table border style="BORDER-COLLAPSE: collapse" cellspacing=0 cellpadding=3>
<tr><td class=text1><b>�������</b></td><td class=text1><b>������ �������</b></td><td class=text1><b>���������</b></td><td class=text1><b>��������</b></td></tr>
<?
$result=mysql_query("select * from users ORDER BY `login`");
while($row=mysql_fetch_array($result))
{

$strok=mysql_query("SELECT * FROM partner WHERE pus='$row[1]'");
$userp = mysql_num_rows($strok);

echo "
<tr><td class=text1>$row[1]</td><td class=text1><a href=stat_par.php?user=$row[1]>$userp</a></td><td class=text1>$row[10]</td><td class=text1><a href=part.php?user=$row[1]&sen=2&pcash=$row[10]>���������</a></td></tr>
";
}
?>
</table>

<?
if ($sen=="2"){
$date=date("d.m.y");
$time=date("H:i:s");
$sqls="INSERT INTO stat_pay VALUES('$user','$date','$time','$pcash (p)','0.00')";
mysql_query($sqls);
mysql_query("update users set cash=cash+'$pcash' where login='$user'");
mysql_query("update users set pcash='0.00' where login='$user'");

echo "<script> alert('������ ���������� �� ������� ����!'); document.location.href='part.php'; </script>";
}



include "footer.php"; ?>

