<?php

 include ("header.php");
 include("../country.php");

function xss_sanitization(&$var){
if(is_array($var)) array_walk($var, 'xss_sanitization');
else $var = htmlspecialchars($var, ENT_QUOTES);
}

foreach(array('_SERVER', '_GET', '_POST', '_COOKIE', '_REQUEST') as $v){
if(!empty(${$v})) array_walk(${$v}, 'xss_sanitization');
}

?>

<td width="2px"><img src="image/spacer.gif" width="2px" height=1></td><td valign="top" width="100%" style=" margin:0; padding:0 4 10 4px; "><div style="margin:0; padding:0; "><img src="image/spacer.gif" width="300px" height=1></div>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="left" valign="top" style="background-color:#000000; border:1px solid #6E2500; padding:1px; ">
<table width="100%" style="height:100%; border:1px solid #2E2E2E;  " border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top">
<div style="padding-left:10px; padding-top:5px; padding-bottom:10px; padding-right:10px">
<center><font class="option" color="#FFFFFF"><b>ВАШИ ДАННЫЕ</b></font></center>
<br>


<table border="0" align="center" cellpadding="0" cellspacing="0">
<FORM action=config.php method=post>
<TR><td height=20>Номер счета: </td><TD><b><? echo $row[0] ?></b></TD></TR>
<TR><td height=20>Логин:</td><TD><? echo $row[1] ?></TD></TR>
<TR><td height=20>E-mail:</td><TD><? echo $row[6] ?></td></TR>
<TR><td height=20>Имя:</td><TD><? echo $row[7] ?></TD></TR>
<TR><td height=20>Фамилия:</td><TD><? echo $row[8] ?></TD></TR>
<TR><td height=20>Регистрация:</td><TD><? echo $row[9] ?></TD></TR>
<TR><td height=20>Город:</td><TD><? echo $row[12] ?></TD></TR>
<TR><td height=20>Страна:</td><TD><? echo $countries[$row[11]] ?></TD></TR>
<TR><td height=20>Родился:</td><TD><? echo $row[14] ?></TD></TR>
<TR><td height=20>Пароль:</td><TD><INPUT maxlength=15  size=20 name=cpass style=" border: 1px solid rgb(0,0,0)" value= <? echo $row[2] ?>  ></TD></TR>
<TR><TD height=50><INPUT type=hidden value=1 name=send> <INPUT type=submit value="Сохранить"></TD></TR>
</FORM>
</table>

</div>
</td>
</tr>
</table>
</td>
</tr>
</table>

<?
if ($send=="1"){
mysql_query("UPDATE users set pass='".htmlspecialchars(htmlentities(addslashes($cpass)))."',name='".htmlspecialchars(htmlentities(addslashes($cname)))."',fam='".htmlspecialchars(htmlentities(addslashes($cfam)))."' where login='".htmlspecialchars(htmlentities(addslashes($l)))."'");
echo "<script> alert('Настройки сохранены!'); document.location.href='config.php';</script>";
}
include ("footer.php");
?>