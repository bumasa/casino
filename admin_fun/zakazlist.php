<? include ("header.php"); ?>
<center><h4><font color=#7C87C2>������ �������</font></h4><br>

<table border style="BORDER-COLLAPSE: collapse" cellspacing=0 cellpadding=3><tr><td class=text1><b>ID</b></td><td class=text1><b>�����</b></td><td class=text1><b>������</b></td><td class=text1><b>������</b></td><td class=text1><b>���������</b></td><td class=text1><b>��������</b></td><td class=text1><b>��������</b></td></tr>

<?
$result=mysql_query("select * from zakaz");
while($row=mysql_fetch_array($result))
{
if ($row[5]=="1"){ $text="<a href=zakaz_p.php?id=$row[0]><font color=red>��������</font></a>"; }else{$text="�������";}
$sqlr="select * from users where login='$row[1]'";
$resultr=mysql_query($sqlr);
$rowr=mysql_fetch_array($resultr);
echo "
<tr><td class=text1>$row[0]</td><td class=text1>$row[1]</td><td class=text1>$rowr[3]</td><td class=text1>$row[2]</td><td class=text1>$row[3]</td><td class=text1>$row[4] �</td><td class=text1>$text</td></tr>
";

}
?>

</table>
</center>
<? include ("footer.php"); ?>