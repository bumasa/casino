<? include "header.php"; ?>

<center><h4><font color=#7C87C2>���� ��� ������ �����: <? echo $user; ?></font></h4>

<table border style="BORDER-COLLAPSE: collapse" cellspacing=0 cellpadding=3>
<tr><td class=text1><b>���� ������</b></td><td class=text1><b>����</b></td><td class=text1><b>������� �������</b></td></tr>
<?
$result=mysql_query("select * from partner WHERE pus ='$user' ");
while($row=mysql_fetch_array($result))
{
echo "
<tr><td class=text1>$row[1]</td><td class=text1>$row[2]</td><td class=text1>$row[3]</td></tr>
";
}
?>
</table>
</center>
<? include "footer.php"; ?>