<? 
include "header.php"; 
$date=date("d.m.y");

// ������� ��� �������� email (���� �������� ������� ������ email ����� ����� ������)
function checkEmail($email){
return ereg( "^[^@  ]+@([a-zA-Z0-9\-]+\.)+([a-zA-Z0-9\-]{2}|net|com|gov|mil|org|edu|int|biz|by|ru|uk)\$",$email);
}

function checkEmail2($email2){
$base=@file("mail_addr_uns.ini"); 
$cnt=sizeof($base);
$err=0;
$am=0;
  while ($am < $cnt) {
  $masvet=$base[$am];
  if ($masvet == $email2."\n"){$err=1; }
  $am++;
  }
return $err;
}

include "mail_set.ini";
?>
<center>

<div align="center">
<h4><font color=#7C87C2>�������� ��������</font></h4>


<TABLE cellSpacing=0 cellPadding=4 width=60% align=center border=0>
<TBODY>
<form name="form" method="post" action="" onSubmit="return formCheck(this)">
<tr><td colspan="2"><b>���</b> :<br><input name="fromname" type="text" value="<?echo $fromname; ?>" size="25"></td></tr>
<tr><td colspan="2"><b>Email</b> :<br><input name="frommail" type="text" value="<?echo $frommail; ?>" size="25"></td></tr>
<tr><td colspan="2"><b>����</b> :<br><input name="subject" type="text" value="<?echo $subject; ?>" size="25"></td></tr>
<tr><td colspan="2"><b>������ :</b><SELECT name=format><OPTION value=TEXT selected>TEXT</OPTION><OPTION value=HTML>HTML</OPTION></SELECT> </td></tr>
<tr><td colspan="2"><b>�����</b> :<br><textarea name="news" cols="70" rows="17"></textarea></td></tr>
<tr><td colspan="2"><input type="hidden" name="send" value="1"><input type="submit" name="submit" value="���������"></td></tr>
</form>
</TBODY>
</TABLE>
</div>



<?
if ($send=="1"){
// ����� ����� ������ � ����
$fname  = "mail_msg.ini";
$fp = fopen ($fname, "w+");
fwrite ($fp, $news."\n");
fclose ($fp);

// ����� ��������� ������ � ����
$fr=fopen("mail_set.ini","w+");
fwrite($fr, '<'."?\n");
fwrite($fr, '$frommail="'.$frommail.'";'."\n");
fwrite($fr, '$fromname="'.$fromname.'";'."\n");
fwrite($fr, '$subject="'.$subject.'";'."\n");
fwrite($fr, '$format="'.$format.'";'."\n");
fwrite($fr, '?'.'>');
fclose($fr);


// ������� ���� email (������ ����� �� ���� ������, �������� �������� � ����� � ����)

$fname  = "mail_addr.ini";
$fp = fopen ($fname, "w+");
fwrite ($fp, "");
fclose ($fp);
$resultm=mysql_query("select * from users ORDER BY `id`");
while($rowm=mysql_fetch_array($resultm))
{
$chma=checkEmail($rowm['email']);
$chma2=checkEmail2($rowm['email']);
 if ($chma==true && $chma2<>1){
$fp = fopen ($fname, "a+");
fwrite ($fp, $rowm['email']."\n");
fclose ($fp);
 }
}


// ��������� � �������� �������� �� 500 �����
echo "<script> document.location.href='mail_send.php'; </script>";
}



include "footer.php"; 
?>