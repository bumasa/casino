<? include ("header.php"); ?>
<center><h4><font color=7C87C2>������� ���������</font></h4><br>
<table border=0 cellspacing=0 cellpadding=3 >
<?
$result=mysql_query("select * from zakaz where id='$id'");
$row=mysql_fetch_array($result)
?>

<tr><td class=text1><b>����� ������ :</b></td><td class=text1><b><? echo $row[0] ?></b></td></tr>
<tr><td class=text1><b>����� :</b></td><td class=text1><b><? echo $row[1] ?></b></td></tr>
<tr><td class=text1><b>��������� ������� :</b></td><td class=text1><b><? echo $row[2] ?></b></td></tr>
<tr><td class=text1><b>���� (�������) :</b></td><td class=text1><b><? echo $row[3] ?></b></td></tr>
<tr><td class=text1><b>����� ������ :</b></td><td class=text1><b><? echo $row[4] ?> ���.</b></td></tr>

<tr><td class=text1><br>
<a href='wmk:payto?Purse=<? echo $row[3]; ?>&Amount=<? echo $row[4]; ?>&Desc=������� �� ������&BringToFront=Y'>��������� �� WMR �������</a>
<br>����� ������� ���������,<br> ��� ����� ���� �������� �������</td></tr>

<tr><td class=text1><br>

<td class=text1>��� �������� �� Yandex <br>���������� ����� �� ���� <br>� �������  <a href='zakaz_p.php?id=<? echo $row[0]; ?>&oplata=ok'>�����������</a>
</td>
</td></tr>



<tr><td class=text1>
<a href='zakaz_p.php?id=<? echo $row[0]; ?>&oplata=ok'><b>�����������</b></a>
</td></tr>

</table><hr>
�������� !!!  ����� �������� ����� ����������� ����������� �������, �� ��������� ��������� �����!!!
</center>


<?
if ($oplata=="ok"){
mysql_query("update zakaz set flag='0' where id='$id'");
echo "<script> alert('���� ��������� �������!'); document.location.href='zakazlist.php'; </script>";
}
include ("footer.php"); 
?>