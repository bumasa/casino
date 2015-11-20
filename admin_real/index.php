<? include "header.php";


$strok=mysql_query("SELECT * FROM users");
$strokinbase = mysql_num_rows($strok);

$strok=mysql_query("SELECT * FROM users WHERE date='$date'");
$strokinbase2 = mysql_num_rows($strok);

$aaa="0";
$strok=mysql_query("SELECT * FROM stat_pay ");
while($row=mysql_fetch_array($strok))
{
$aaa=$aaa+$row[3];
}

$aa="0";
$strok=mysql_query("SELECT * FROM stat_pay WHERE data='$data' ");
while($row=mysql_fetch_array($strok))
{
$aa=$aa+$row[3];
}

$bbb="0";
$strok=mysql_query("SELECT * FROM stat_pay ");
while($row=mysql_fetch_array($strok))
{
$bbb=$bbb+$row[4];
}

$bb="0";
$strok=mysql_query("SELECT * FROM stat_pay WHERE data='$data' ");
while($row=mysql_fetch_array($strok))
{
$bb=$bb+$row[4];
}
?>


<table border=0 cellspacing=0 cellpadding=0 width="60%">
<tr>

<td>
<?
echo "<h4><font color=#7C87C2>Общая статистика за $date</font></h4>";
echo "
Всего игроков: $strokinbase<BR>
За сегодня новых: $strokinbase2<BR>
<br>
Всего зачисленно: $aaa руб.<BR>
Сегодня зачисленно : $aa руб.<BR>
<br>
Всего заказано : $bbb руб.<br>
Сегодня заказано : $bb руб. <br>
<br><br>
";
?>
</td>




<td align="left" valign="top">
<h4><font color=#7C87C2>Настройка игр</font></h4>
<?
$dirname="gm";
$dir = opendir($dirname);
while (($file = readdir($dir)) !== false) 
{
      if($file != "." && $file != "..") 

      {
$file2= str_replace (".php", "", $file);
echo "<li><a href=".$dirname."/".$file.">".$file2."</a><br></li>";

      }
}
?> 
</td>

</tr>
</table>

<? include "footer.php"; ?>