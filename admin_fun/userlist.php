<? include "header.php"; ?>

<center><h4><font color=#7C87C2>������ �������</font></h4></center>
<table border style="BORDER-COLLAPSE: collapse" cellspacing=0 cellpadding=3><tr><td class=text1><b>ID</b></td><td class=text1><b>�����</b></td><td class=text1><b>������</b></td><td class=text1><b>������</b></td><td class=text1><b>����</b></td><td class=text1><b>����</b></td><td class=text1><b>���,�������</b></td><td class=text1><b>E-mail</b></td><td class=text1><b>���� �������.</b></td><td class=text1><b>��������</b></td></tr>
<?
$lstcount =100;
$result=mysql_query("select * from users ORDER BY `id`");
while($row=mysql_fetch_array($result))
{
echo "
<tr><td class=text1>$row[0]</td><td class=text1><a href=stat.php?user=$row[1]>$row[1]</a></td><td class=text1>$row[2]</td><td class=text1><a href=userpay.php?logi=$row[1]>$row[3]</a></td><td class=text1>$row[4]</td><td class=text1>$row[5]</td><td class=text1>$row[7] $row[8]</td><td class=text1><a href=mailto:$row[6]>$row[6]</a></td><td class=text1>$row[9]</td><td class=text1><a href=del.php?user=$row[1]>�������</a><br><a href=stat.php?user=$row[1]>����������</a></td></tr>
";
}
?>
</table>

<? include "footer.php"; ?>

