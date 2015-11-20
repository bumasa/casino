<? include ("header.php"); ?>
<td width="2px"><img src="image/spacer.gif" width="2px" height=1></td><td valign="top" width="100%" style=" margin:0; padding:0 4 10 4px; "><div style="margin:0; padding:0; "><img src="image/spacer.gif" width="300px" height=1></div> 
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="left" valign="top" style="background-color:#000000; border:1px solid #6E2500; padding:1px; ">
<table width="100%" style="height:100%; border:1px solid #2E2E2E;  " border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top">
<div style="padding-left:10px; padding-top:5px; padding-bottom:10px; padding-right:10px">
<center><font class="option" color="#FFFFFF"><b>ИСТОРИЯ ПЛАТЕЖЕЙ</b></font></center>
<br>


<center>

<table border style="BORDER-COLLAPSE: collapse" cellspacing=0 cellpadding=3>
<tr><td class=text1><b>Дата</b></td><td class=text1><b>Время</b></td><td class=text1><b>Пополнил</b></td><td class=text1><b>Снял</b></td></tr>
<?
$result=mysql_query("select * from stat_pay WHERE user ='$l' ");
while($row=mysql_fetch_array($result))
{
echo "
<tr><td class=text1>$row[1]</td><td class=text1>$row[2]</td><td class=text1>$row[3]</td><td class=text1>$row[4]</td></tr>
";
}
?>
</table></center>

</div>		
</td>
</tr>
</table>
</td>
</tr>
</table>

<br> 

<table width="100%"  border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="left" valign="top" style="background-color:#000000; border:1px solid #6E2500; padding:1px; ">
<table width="100%" style="height:100%; border:1px solid #2E2E2E;  " border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top">
<div style="padding-left:10px; padding-top:5px; padding-bottom:10px; padding-right:10px">
<center><font class="option" color="#FFFFFF"><b>ПРИМЕЧАНИЕ</b></font></center>
<br>
<div style="padding-left:20px; padding-top:0px"><ul style="margin:0; padding:0; line-height:11px">

<li>(a) - Операция совершенна администрацией.</li>
<li>(p) - Партнерское вознаграждение.</li>

</ul></div>
</div>		
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>



<? include ("footer.php"); ?>