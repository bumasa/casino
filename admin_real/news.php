<? 
include "header.php"; 
$date=date("d.m.y");
?>
<center>
<h4><font color=#7C87C2>Новости</font></h4>

<table border=0 cellspacing=0 cellpadding=0 width="40%">
<?
$result=mysql_query("select * from news ORDER BY `id` DESC ");
while($row=mysql_fetch_array($result))
{
echo "
<tr>
<td width=\"200\"><b>$row[1]</b>-$row[2]<br><a href=\"?del=1&id=$row[0]\">Удалить</a><br><br></td></tr>
";
}
?>
</table>

<h4><font color=#7C87C2>Добавить новость</font></h4>


<form name="form" method="post" action="" onSubmit="return formCheck(this)">


<table border="0" cellpadding="4" cellspacing="0">
<tr>
<td colspan="2"><table border="0" cellspacing="0" cellpadding="2">
<tr>
<td><b>Дата:</b>&nbsp;</td>
<td><input name="data" type="text" maxlength="16" value=<? echo $date; ?> size="25"></td>
</tr>
</table></td>
</tr>

<tr>
<td colspan="2"><b>Новость:</b><br><br></font>
<textarea name="news" cols="30" rows="5"></textarea></td>
</tr>

<tr>
<td colspan="2">
<input type="hidden" name="send" value="1"><input type="submit" name="submit" value="Сохранить"></td>
</tr>
</table>
</form>
</center>
<?

if ($send=="1"){
$sqls="INSERT INTO news VALUES(NULL,'$data','$news')";
mysql_query($sqls);
echo "<script> alert('Новость Добавленна!'); document.location.href='news.php'; </script>";
}
if ($del=="1"){
mysql_query("DELETE FROM news WHERE id = '$id'");
echo "<script> alert('Новость удалена!'); document.location.href='news.php'; </script>";
}

include "footer.php"; ?>