<? include ("header.php"); 
$strok=mysql_query("SELECT * FROM partner WHERE pus='$l'");
$userp = mysql_num_rows($strok);
?>

<td width="2px"><img src="image/spacer.gif" width="2px" height=1></td><td valign="top" width="100%" style=" margin:0; padding:0 4 10 4px; "><div style="margin:0; padding:0; "><img src="image/spacer.gif" width="300px" height=1></div> 
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="left" valign="top" style="background-color:#000000; border:1px solid #6E2500; padding:1px; ">
<table width="100%" style="height:100%; border:1px solid #2E2E2E;  " border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top">
<div style="padding-left:10px; padding-top:5px; padding-bottom:10px; padding-right:10px">
<center><font class="option" color="#FFFFFF"><b>ПАРТНЁРСКАЯ ПРОГРАММА</b></font></center>
<br>
<center>
<b>Универсальная ссылка:</b><br><br>
&lt;a href="<? echo $conf[3]; ?>?pus=<? echo $l; ?>">Интернет казино WMCASINO&lt;/a&gt;
<br><br>Её вы можете рекламировать любым способом (см.правила)<br><br><br></center>

<center><b>Баннеры</b>
<br><br>
100x100<br>
<A href="<? echo $conf[3] ?>/?pus=<? echo $l; ?>">
<IMG height=100 alt="Интернет казино <? echo $conf[4] ?>" src="../baner/100_1.gif" width=100 border=0></A>
<BR>
<TEXTAREA rows=4 cols=50>&lt;a href="<? echo $conf[3] ?>?pus=<? echo $l; ?>"&gt;&lt;img src="<? echo $conf[3] ?>/baner/100_1.gif" alt="Интернет казино <? echo $conf[4] ?>" width="100" height="100" border="0"&gt;&lt;/a&gt;</TEXTAREA>
<BR><BR><BR>

468x60<br>
<A href="<? echo $conf[3] ?>/?pus=<? echo $l; ?>">
<IMG height=60 alt="Интернет казино <? echo $conf[4] ?>" src="../baner/468_1.gif" width=468 border=0></A>
<BR>
<TEXTAREA rows=4 cols=50>&lt;a href="<? echo $conf[3] ?>?pus=<? echo $l; ?>"&gt;&lt;img src="<? echo $conf[3] ?>/baner/468_1.gif" alt="Интернет казино <? echo $conf[4] ?>" width="468" height="60" border="0"&gt;&lt;/a&gt;</TEXTAREA>
<BR><BR><BR>

468x60<br>
<A href="<? echo $conf[3] ?>/?pus=<? echo $l; ?>">
<IMG height=60 alt="Интернет казино <? echo $conf[4] ?>" src="../baner/468_2.PNG" width=468 border=0></A>
<BR>
<TEXTAREA rows=4 cols=50>&lt;a href="<? echo $conf[3] ?>?pus=<? echo $l; ?>"&gt;&lt;img src="<? echo $conf[3] ?>/baner/468_2.PNG" alt="Интернет казино <? echo $conf[4] ?>" width="468" height="60" border="0"&gt;&lt;/a&gt;</TEXTAREA>
<BR><BR><BR>



468x60<br>
<A href="<? echo $conf[3] ?>/?pus=<? echo $l; ?>">
<IMG height=60 alt="Интернет казино <? echo $conf[4] ?>" src="../baner/468_60_3.gif" width=468 border=0></A>
<BR>
<TEXTAREA rows=4 cols=50>&lt;a href="<? echo $conf[3] ?>?pus=<? echo $l; ?>"&gt;&lt;img src="<? echo $conf[3] ?>/baner/468_60_3.gif" alt="Интернет казино <? echo $conf[4] ?>" width="468" height="60" border="0"&gt;&lt;/a&gt;</TEXTAREA>
<BR><BR><BR>



</center>

</div>		
</td>
</tr>
</table>
</td>
</tr>
</table>

<? include ("footer.php"); ?>