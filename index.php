<? include ("header.php");?>

<td width="2px"><img src="image/spacer.gif" width="2px" height=1></td><td valign="top" width="100%" style=" margin:0; padding:0 4 10 4px; "><div style="margin:0; padding:0; "><img src="image/spacer.gif" width="300px" height=1></div> 
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" style="background-color:#000000; border:1px solid #6E2500; padding:1px; ">
	
	<table width="100%" style="height:100%; border:1px solid #2E2E2E;  " border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td valign="top">
<div style="padding-left:10px; padding-top:5px; padding-bottom:10px; padding-right:10px">
      <center><font class="option" color="#FFFFFF"><b>����� ���������� � �������� ������ <? echo $con[4]; ?></b></font></center><br>

<font class="content">
<div style="padding-left:20px; padding-top:0px"><ul style="margin:0; padding:0; line-height:11px">
<li>� ��� �� ������ ������ ��� �� �������� ������ <font class="option1">WMR</font>, ��� � �� ����������� <font class="option1">FUN</font> �����,  ����������� ������ �� 20 ������.</li>
<li>� ����� ������ ������� ������ ������ ����������� <font class="option1">�����</font> �� �������� ������� ����, � ����� ���� ������� �������� <font class="option1">1000 FUN �����</font> ���������!</li>
<li>��� ���� ������ ����� �������� ������� ���������, ����� ���: <a href="/lobby/game/zorro/">�����</a>, <a href="/lobby/game/resident/">RESIDENT</a>, <a href="/lobby/game/secretadm/">SECRET ADMIRER</a> � ��.</li>
<li>������ ���� �������������� �������� <font class="option1">MD5 FairPlay</font> (������� ����), ������ ������� ������� �������� �� ��������� ���� �� �����, ��� ������� ������ �� ����� �����.</li>
<li>����� �������� ������� ���� ������������� ������ � �������� � ������� �������<li>
<li>����� ������ ������, ��� ����� ������ <a href="reg.php">������������������</a>.</li>
<li>�� ����� ��������� � ������������� �������������� ��</li>
<li>� ����� ������ ���� �������� � ������� �� ������� <font class="option1">������������</font> �� ����� ��������� �� <font class="option1"><? procent(); ?>%</font></li>


</font></ul></div></div>		
		</td>
	  </tr>
	</table>

	
	</td>
  </tr>
</table>



<table width="100%"  border="0" cellpadding="0" cellspacing="0" style="margin-top:5px; margin-bottom:10px; ">
  <tr>
    <td width="100%" height="24" align="left" valign="middle" style="background:url(image/px_block.gif) top repeat-x; border-top:1px solid #6E2500; border-left:1px solid #6E2500; border-right:1px solid #6E2500; padding:1px; ">
	<table cellspacing="0" cellpadding="0" width="100%" height="100%" style="border:1px solid #2E2E2E;">
	  <tr>
		<td><div style="padding-left:18px; padding-top:0px; color: #FFFFFF; font-size:10px; font-weight:bold;">����� ����</div></td>

	  </tr>
	</table>	
	</td>
  </tr>
  <tr>
    <td valign="top" style="background-color:#101010; border-bottom:1px solid #6E2500; border-left:1px solid #6E2500; border-right:1px solid #6E2500; padding:1px; ">
      <table cellspacing="0" cellpadding="0" width="100%" height="100%" style="border:1px solid #2E2E2E;">
		  <tr>
			<td><div style="padding-left:0px; padding-top:0px; padding-bottom:0px">

<div style="text-align: center;"><a
 href="games.php"><img
 style="width: 433px; height: 324px;" alt="����� �����"
 title="����������" src="image/reelthunder.jpg"></a></div>


</font>
          
          

    </div></td>		  
	 </tr>
	  </table>
	  </td>
  </tr>  
</table>







<table width="100%"  border="0" cellpadding="0" cellspacing="0" style="margin-top:5px; margin-bottom:10px; ">
  <tr>
    <td width="100%" height="24" align="left" valign="middle" style="background:url(image/px_block.gif) top repeat-x; border-top:1px solid #6E2500; border-left:1px solid #6E2500; border-right:1px solid #6E2500; padding:1px; ">
	<table cellspacing="0" cellpadding="0" width="100%" height="100%" style="border:1px solid #2E2E2E;">
	  <tr>
		<td><div style="padding-left:18px; padding-top:0px; color: #FFFFFF; font-size:10px; font-weight:bold;">������� ������</div></td>

	  </tr>
	</table>	
	</td>
  </tr>
  <tr>
    <td valign="top" style="background-color:#101010; border-bottom:1px solid #6E2500; border-left:1px solid #6E2500; border-right:1px solid #6E2500; padding:1px; ">
      <table cellspacing="0" cellpadding="0" width="100%" height="100%" style="border:1px solid #2E2E2E;">
		  <tr>
			<td><div style="padding-left:10px; padding-top:0px; padding-bottom:10px"><br>

            <?
$result=mysql_query("select * from news ORDER BY `id` DESC ");
while($row=mysql_fetch_array($result))
{
echo "
<b>$row[data]</b>-$row[news]<br><br>
";
}
?>

</font>
          
          

    </div></td>		  
	 </tr>
	  </table>
	  </td>
  </tr>  
</table>

</td>

<? include ("footer.php");?>
