<? include "header.php"; ?>

<td width="2px"><img src="image/spacer.gif" width="2px" height=1></td><td valign="top" width="100%" style=" margin:0; padding:0 4 10 4px; "><div style="margin:0; padding:0; "><img src="image/spacer.gif" width="300px" height=1></div> 
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" style="background-color:#000000; border:1px solid #6E2500; padding:1px; ">
	
	<table width="100%" style="height:100%; border:1px solid #2E2E2E;  " border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td valign="top">
<div style="padding-left:10px; padding-top:5px; padding-bottom:10px; padding-right:10px">
      <center><font class="option" color="#FFFFFF"><b>50 текущих выигрыша <? echo $con[4]; ?><? echo $user; ?></b></font></center><br>

<font class="content">
<center>
<table border style="BORDER-COLLAPSE: collapse" cellspacing=0 cellpadding=3>
<tr bgcolor=white valign=top><td><b>№</b></td><td><b>Название игры</b></td><td><b>Дата</b></td><td><b>Время</b></td><td><b>Логин</b></td><td><b>Ставка</b></td><td><b>Выигрыш</b></td></tr>
<?
$lstcount =50;
$nomer=0;
$result=mysql_query("select * from stat_game WHERE win>0 ");
$strokinbase = mysql_num_rows($result);
$lfrom = $strokinbase-1;
$lto = $strokinbase - $lstcount;
for ($i = $lfrom; $i >= $lto; $i--) {
$row=mysql_fetch_array(mysql_query("SELECT * FROM stat_game WHERE win>0 LIMIT $i , $strokinbase"));
$nomer=$nomer+1;
echo "
<tr><td class=text1>$nomer</td><td class=text1>$row[7]</td><td class=text1>$row[1]</td><td class=text1>$row[2]</td><td class=text1>$row[3]</td><td class=text1>$row[5]</td><td class=text1>$row[6]</td></tr>
";
}
?>
</table>
</center>
</font></ul></div></div>		
		</td>
	  </tr>
	</table>

	
	</td>
  </tr>
</table>
<? include "footer.php"; ?>