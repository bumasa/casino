<? 
include ("header.php");
include("country.php");
include("securimage/securimage.php");
session_start();

//// ���������� ------------ 
 
//���������, ��� ���������
//p.s. ��� � �� ���������, ��������� �������� ������, ��� ������� :)
define('REGXP__SITY_WORD',"/^[�-��-�A-Za-z ]{4,15}$/");
define('REGXP__ENG_WORD',"/^[A-Za-z0-9]{4,15}$/");
define('REGXP__NUM_OR_SELECT',"/^[0-9]{1,4}$/");
define('REGXP__RUS_AND_ENG_WORD',"/^[�-��-�A-Za-z]{4,15}$/");
define('REGXP__EMAIL',"/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i");

$countries['start_value'] = "- �������� ������ -";
//c����� �������
$months = array("������", "�������", "�����", "������", "����", "����", "����", "�������", "��������", "�������", "������", "�������");
//-> ��������� �������� ����
$months['start_value'] = "- ������ -";
//SELECT * FROM user WHERE MD5(CONCAT(login,password))='<usermd5>'
//������� ����� �������� �����. (����������)
$fields_map = array();
$fields_map['r_login'] = REGXP__ENG_WORD;
$fields_map['r_pass'] = REGXP__ENG_WORD;
$fields_map['r_pass_test'] = REGXP__ENG_WORD;
$fields_map['r_email'] = REGXP__EMAIL;
$fields_map['r_name'] = REGXP__RUS_AND_ENG_WORD;
$fields_map['r_fam'] = REGXP__RUS_AND_ENG_WORD;
$fields_map['r_country'] = REGXP__NUM_OR_SELECT;
$fields_map['r_city'] = REGXP__SITY_WORD;
$fields_map['r_birthdayd'] = REGXP__NUM_OR_SELECT;
$fields_map['r_birthdaym'] = REGXP__NUM_OR_SELECT;
$fields_map['r_birthdayy'] = REGXP__NUM_OR_SELECT;
$fields_map['r_antispam'] = REGXP__ENG_WORD;
$fields_map['r_rules'] = REGXP__NUM_OR_SELECT;

//������� ����� �������� �����. (������)
//_POST ������� ��������� �� ����! ��� ��� ��������� ����� � ���� �������.
$fields_logic_map = array();
$fields_logic_map['r_pass'] = $_POST['r_pass_test'];
$fields_logic_map['r_pass_test'] = $_POST['r_pass'];
$img = new Securimage();
$fields_logic_map['r_antispam'] = $img->getCode();
$fields_logic_map['r_rules'] = 1;

$unique_fields['r_login'] = "login";
$unique_fields['r_email'] = "email";
//// ������� ------------  

//������ ��� �������������� ��������� �������.
//���������: ������, ������ (������ ��� - http://ru.php.net/manual/ru/function.sprintf.php)
function draw_element($array, $temple) {	 
$return = NULL;
if (isset($array['start_value'])) { $return .= sprintf(str_replace("%d","%s", $temple), '---', $array['start_value']); unset($array['start_value']); }
if (isset($array['numeric']) && is_numeric($array['numeric'][0]) && is_numeric($array['numeric'][1])) {
  for ($n=$array['numeric'][0];$n<=$array['numeric'][1];$n++) {
	$return .= sprintf($temple, $n, $n);
  }
} else {
  foreach ($array as $key => $value) {
    $return .= sprintf($temple, $key, $value);
  }
}
if ($return != NULL) { return $return; }
}

//������ ������ �������� �� ��� :) ��� �������� ��������.
//���������: (array)$vars_map - �� ���� "����������=>���������", (array)$date - ������ �������� DATE (����� �������� POST ��� GET), (array)$vars_logic - �������������� �������� ��� ������
//���������: True ���� ��� ���������� "�������" ��� ������ "�������" ����������, ������ �����������.
function form_check($map, $date, $logic = array(), $unique = array()) {
$done_array = array();
$error_array = array();

foreach ($map as $field => $regxp) {
$error = "null";
if (isset($date[$field]) && preg_match($regxp, $date[$field])) {
  if ((isset($logic[$field]) && $date[$field] == $logic[$field]) || !isset($logic[$field])) {
     if ((isset($unique[$field]) && �heck_field_by_mysql($unique[$field], $date[$field]) == false) || !isset($unique[$field])) {
         $done_array[] = $field;
     } else { 
		 $error = "unique";  
	 }
  } else { 
	  $error = "logic"; 
  }
} else { 
 $error = "filter"; 
}
if ($error != "null") {
//����� ���� ������ �� ����������, �� ���� ���� �� �� ������ :)
$error_array[$error][] = $field;
}
}

if (($count=count($done_array)) == count($map) && $count != 0) {
return true;
} else {
return $done_array;
}
}

function �heck_field_by_mysql($name, $value) {
if (mysql_num_rows(mysql_query("select $name from users where $name='".strtolower(mysql_escape_string($value))."'"))>0) {
return true;
} else {
return false;
}
}

//// �������� ��� ------------  
//������ ��� ����������� ����� ���� � ��������� ���������.
if (is_array(($done_array=form_check($fields_map, $_POST, $fields_logic_map, $unique_fields))) == true) {
?>
<td width="2px"><img src="image/spacer.gif" width="2px" height=1></td><td valign="top" width="100%" style=" margin:0; padding:0 4 10 4px; "><div style="margin:0; padding:0; "><img src="image/spacer.gif" width="300px" height=1></div>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="left" valign="top" style="background-color:#000000; border:1px solid #6E2500; padding:1px; ">
<table width="100%" style="height:100%; border:1px solid #2E2E2E;  " border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top">
<div style="padding-left:10px; padding-top:5px; padding-bottom:10px; padding-right:0px">
<center><font class="option" color="#FFFFFF"><b>����������� � �������� ������ <? echo $con[4]; ?></b></font></center>


<TABLE class=regform cellSpacing=0 cellPadding=3 align=center border=0>
   <TBODY>
    <TR>
    <TD colSpan=3><center> 
     
     <?    
      if (count($done_array)>0) { 
        echo "<br><br><FONT class=option1 color=FFFFFF>��������� ���� ���� ���������� � ��������! <br><br>���� ����� � e-mail ����� ������ ����� ���������� ��������.<br><br>";
      } else {
        echo "<br><br><FONT class=option1 color=FFFFFF>��� ���� ����������� ��� ����������!</FONT><br><br></center>";
      }
     ?>
    </TD></TR>
    <FORM name=form action=reg.php method=post>
    <TR>
    <TD align=right>�����:&nbsp;&nbsp;</TD>
    <TD><?=in_array("r_login",$done_array)?"<INPUT type=hidden name=r_login value=".$_POST['r_login'].">".$_POST['r_login']."":"<INPUT name=r_login style=\"border: 1px solid rgb(0,0,0)\">";?></TD>
    <TD>&nbsp;&nbsp;&nbsp;&nbsp;</TD></TR>
    <TR>
    <TD align=right>������� ������:&nbsp;&nbsp;</TD>
    <TD><?=in_array("r_pass",$done_array)?"<INPUT type=hidden name=r_pass value=".$_POST['r_pass'].">- c���� -":"<INPUT name=r_pass type=password style=\" border: 1px solid rgb(0,0,0)\">"?></TD>
    <TD></TD></TR>
	<TD align=right>��������� ������:&nbsp;&nbsp;</TD>
    <TD><?=in_array("r_pass_test",$done_array)?"<INPUT type=hidden name=r_pass_test value=".$_POST['r_pass_test'].">- c���� -":"<INPUT name=r_pass_test type=password style=\" border: 1px solid rgb(0,0,0)\">"?></TD>
    <TD></TD></TR>
    <TR>
    <TD align=right>E-mail:&nbsp;&nbsp;</TD>
    <TD><?=in_array("r_email",$done_array)?"<INPUT type=hidden name=r_email value=".$_POST['r_email'].">".$_POST['r_email']."":"<INPUT name=r_email style=\" border: 1px solid rgb(0,0,0)\">"?></TD>
    <TD>&nbsp;</TD></TR>
    <TR>
    <TD align=right>���:&nbsp;&nbsp;</TD>
    <TD><?=in_array("r_name",$done_array)?"<INPUT type=hidden name=r_name value=".$_POST['r_name'].">".$_POST['r_name']."":"<INPUT name=r_name style=\" border: 1px solid rgb(0,0,0)\">"?></TD>
    <TD></TD></TR>
    <TR>
    <TD align=right>�������:&nbsp;&nbsp;</TD>
    <TD><?=in_array("r_fam",$done_array)?"<INPUT type=hidden name=r_fam value=".$_POST['r_fam'].">".$_POST['r_fam']."":"<INPUT name=r_fam style=\" border: 1px solid rgb(0,0,0)\">"?></TD>
    <TD></TD></TR>
    <TR>
    <TD align=right>������:&nbsp;&nbsp;</TD>
    <TD>
     <?=in_array("r_country",$done_array)?"<INPUT type=hidden name=r_country value=".$_POST['r_country'].">".$countries[$_POST['r_country']]."":"<select name=r_country style=\" border: 1px solid black\">".draw_element($countries, "<option value=\"%d\">%s</option>")."</select>"?>
	</TD>
    <TR>
    <TD align=right>�����:&nbsp;&nbsp;</TD>
    <TD><?=in_array("r_city",$done_array)?"<INPUT type=hidden name=r_city value=\"".$_POST['r_city']."\">".$_POST['r_city']."":"<INPUT name=r_city style=\" border: 1px solid rgb(0,0,0)\">"?></TD>
    <TD></TD></TR>
    <TR>
    <TD align=right>���� ��������:&nbsp;&nbsp;</TD>
    <TD>

	<?=in_array("r_birthdayd",$done_array)?"<INPUT type=hidden name=r_birthdayd value=".$_POST['r_birthdayd'].">".$_POST['r_birthdayd']."":"<select name=r_birthdayd>
    ".draw_element(array('start_value'=>'---','numeric'=>array(1,31)), "<option value=\"%d\">%s</option>")."</select>"?>
	
	<?=in_array("r_birthdaym",$done_array)?"<INPUT type=hidden name=r_birthdaym value=".$_POST['r_birthdaym'].">".$months[$_POST['r_birthdaym']]."":"<select name=r_birthdaym>
      ".draw_element($months, "<option value=\"%d\">%s</option>")."
	</select>"?>

	<?=in_array("r_birthdayy",$done_array)?"<INPUT type=hidden name=r_birthdayy value=".$_POST['r_birthdayy'].">".$_POST['r_birthdayy']."":"<select name=r_birthdayy>
     ".draw_element(array('start_value'=>'-����-','numeric'=>array((date('Y')-70),(date('Y')-18))), "<option value=\"%d\">%s</option>")."</select>"?>
	</TD>
    <TD></TD>
	</TR>

  
    <TR>
    <TD align=right>��� � ��������:&nbsp;&nbsp;</TD>
    <TD>
    <img src="/securimage/securimage_show.php?sid=<?php echo md5(uniqid(time())); ?>" id="image" align="absmiddle" />
    <br><INPUT name=r_antispam size=25 type=text value="" onfocus="if(this.value=='������� ����� � ��������'){this.value=''};" onblur="if(this.value==''){this.value='������� ����� � ��������'};"> <a href="#" onclick="document.getElementById('image').src = '/securimage/securimage_show.php?sid=' + Math.random(); return false">������</a>


</TD></TD></TR>
    <TR>
    <TD colSpan=3 align=center><?=in_array("r_rules",$done_array)?"<INPUT type=hidden name=r_rules value=".$_POST['r_rules']."><INPUT type=checkbox checked disabled>":"<INPUT type=\"checkbox\" value=\"1\" name=r_rules>"?> � ��������� ���������� � ��������</TD></TR>
    <TR>
    <TD colSpan=3 align=center><INPUT type=submit value="���������" name=submit></TD></TR>
    <TR>
    <TD colSpan=3>&nbsp;</TD></TR>
    <TR>
    <TD colSpan=3>
    <TD>&nbsp;</TD></TR></FORM></TBODY></TABLE></FORM>

</div>
</td>
</tr>
</table>
</td>
</tr>
</table>



<?
} else {
include ("setup_virtual.php");
include ("setup.php");
//���� ����� ����� ��� ���� ���� ($_POST['var']) ��������, �� ������ �� ������� ������� ���� � �����! :)
//������ �� ������������.
$pus=$HTTP_COOKIE_VARS["par"];
if (preg_match(REGXP__RUS_AND_ENG_WORD, $pus)) {
$rowru=mysql_fetch_array(mysql_query("select * from users where login='$pus'"));
if ($pus==$rowru[1])
{
$partner_sql = "INSERT INTO partner VALUES('$pus','".$_POST['r_login']."','$date','0.00')";
mysql_query($partner_sql, $full_base);
mysql_query($partner_sql, $fun_base);
}
}

mysql_query("INSERT INTO users VALUES(NULL,'".$_POST['r_login']."','".$_POST['r_pass']."','0.50','0.00','0.00','".$_POST['r_email']."','".$_POST['r_name']."','".$_POST['r_fam']."',
'$date', '0.00', ".$_POST['r_country'].", '".$_POST['r_city']."', 0, '".$_POST['r_birthdayy']."-".$_POST['r_birthdaym']."-".$_POST['r_birthdayd']."')", $full_base);

mysql_query("INSERT INTO users VALUES(NULL,'".$_POST['r_login']."','".$_POST['r_pass']."','1000','0.00','0.00','".$_POST['r_email']."','".$_POST['r_name']."','".$_POST['r_fam']."',
'$date','0.00', ".$_POST['r_country'].", '".$_POST['r_city']."', 0, '".$_POST['r_birthdayy']."-".$_POST['r_birthdaym']."-".$_POST['r_birthdayd']."')", $fun_base);

include("mail/reg.php");
mail($_POST['r_email'], $reg_reg_mail_subject, $reg_reg_mail, "Content-Type: text/plain; charset=Windows-1251\nFrom: $con[2]\n");
$con=mysql_fetch_array(mysql_query("select * from seting"));
if ($con['regmail']=="yes"){
include("mail/newreg.php");
mail($con['adm_email'], $reg_reg_mail_subject, $reg_reg_mail, "Content-Type: text/plain; charset=Windows-1251\nFrom: ".$con['adm_email']."\n");
}
unset($pus);
session_destroy();
?>
<td width="2px"><img src="image/spacer.gif" width="2px" height=1></td><td valign="top" width="100%" style=" margin:0; padding:0 4 10 4px; "><div style="margin:0; padding:0; "><img src="image/spacer.gif" width="300px" height=1></div>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" style="background-color:#000000; border:1px solid #6E2500; padding:1px; ">

	<table width="100%" style="height:100%; border:1px solid #2E2E2E;  " border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td valign="top">
<div style="padding-left:10px; padding-top:5px; padding-bottom:10px; padding-right:10px">
      <center><font class="option" color="#FFFFFF"><b>�� ���������������� � �������� ������ <? echo $con[4]; ?></b></font></center><br>

<font class="content">

��� ������ ���� ��� ���������� ����������� ���� e-mail �����. ������ ��� �������������, � ��� �� ��� ���� ���������� ����������� �� e-mail ������� �� ����� ��� �����������.
<br><br>
 ��������! ��������� �������� ������� ����� �������� ������ � ����� � ����� "����" ��� "������������". ���� �� �� �������� ������ � �����������, ��������� - ��� �� ��� � ����� �� ������.
<br><br>
� �������� ������������� ��������-������ <? echo $con[4]; ?>

</font></div>
		</td>
	  </tr>
	</table>


	</td>
  </tr>
</table>
<?
}
include ("footer.php");
?>