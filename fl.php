<html>
<head>

<? /*
// -----------------------------------------
// +   Автор скрипта: VCP                  +
// +   E-mail автора: vcp_da@obukhov.net   +
// +   URL автора: http://vcp.lafox.com.ua +
//  ----------------------------------------
*/ ?>

<? include ('config.inc.php'); ?>
<meta http-equiv="content-type" content="text/html; charset=windows-1251">
<? echo"<title>$title</title>"; ?>
<meta name="author" content="VCP">
<meta name="generator" content="VCP_Editor">
</head>
<body bgcolor="white" text="black" link="blue" vlink="purple" alink="red">
<FORM ENCTYPE="multipart/form-data" ACTION="<?php echo"$PHP_SELF"; ?>" METHOD="POST">
<table border="1" cellspacing="0" width="353" bordercolordark="white" bordercolorlight="black">
    <tr>
        <td width="343">
         <table width="353" cellpadding="0" cellspacing="0" border="1" bordercolor="white" bordercolordark="white" bordercolorlight="white">
<tr>
<td width="128" height="24" bgcolor="#F7F7F7">
<p><font size="2" face="Verdana" color="#CC0000">Выбор файла:</font></p>
</td>
<td width="225" height="24" bgcolor="#F7F7F7">
<font size="2" face="Verdana">&nbsp;<INPUT NAME="File" TYPE="file" style="font-family:Verdana; font-size:11; color:rgb(0,0,102); border-style:groove;" onMouseOver="style.color='#FF6600'" onMouseOut="style.color='#000066'"></font>
</td>
</tr>
<tr>
<td width="128" bgcolor="#F7F7F7">
<p><font face="Verdana" size="2" color="#CC0000">URL(ссылка):</font></p>
</td>
<td width="225" bgcolor="#F7F7F7">
<font size="2" face="Verdana" color="#CC0000">&nbsp;<input type="text" name="url" value="http://" style="font-family:Verdana; font-size:11; color:rgb(0,0,102); border-style:groove;" onMouseOver="style.color='#FF6600'" onMouseOut="style.color='#000066'"></font>
</td>
</tr>
<tr>
<td width="128" bgcolor="#F7F7F7">
<p><font size="2" face="Verdana" color="#CC0000">Alt (Подсказка):</font></p>
</td>
<td width="225" bgcolor="#F7F7F7">
<p>&nbsp;<input type="text" name="alt" style="font-family:Verdana; font-size:11; color:rgb(0,0,102); border-style:groove;" onMouseOver="style.color='#FF6600'" onMouseOut="style.color='#000066'"></p>
</td>
</tr>
<tr>
<td width="128" bgcolor="#F7F7F7">
<p><font size="2" face="Verdana" color="#CC0000">Действие:</font></p>
</td>
<td width="225" bgcolor="#F7F7F7">
<font size="2" face="Verdana">&nbsp;<INPUT TYPE="submit" VALUE="Отправить" style="font-family:Verdana; font-size:11; color:rgb(0,0,102); background-color:rgb(212,208,200); border-style:groove;" onMouseOver="style.color='#FF6600'" onMouseOut="style.color='#000066'" ></font>
</td>
</tr>
<tr>
<td width="128" height="23" bgcolor="#F7F7F7">
<p><font size="2" color="#CC0000" face="Verdana">Описание:</font></p>
</td>
<td width="225" height="23" valign="bottom" bgcolor="#F7F7F7">






<font size="2" color="#FF6600" face="Verdana"><?php

/* Код который выводит свойства файла */
	if ($File&& $File !== "none") {



    	if ( $File_type == "image/pjpeg" || $File_type == "image/x-png" || $File_type == "image/gif" || $File_type == "image/jpeg" ) {

/* Этот код запещяет перезапись */
		if (file_exists("$direct/$File_name")):
echo "<b>Такой файл уже существует.</b>";
exit;
endif;

$optdirekt = "$direct/$File_name";
echo "<b>Файл записан!</b><BR>";
echo "Название файла: $File_name<BR>";
echo "Размер файла: $File_size<BR>";
echo "Тип файла: $File_type";

/* Код копирования */
copy ($File, $optdirekt) or die ("No load....");

/* Код добавляющий в базу картинку */
$open=fopen("base.txt","a") or die ("Не удалось добавить в базу код ...");
fwrite($open,"<a href=\"$url\"><img src=\"$optdirekt\" alt=\"$alt\" border=\"0\"></a>\n");
fclose($open);

	}
      else print "<font face=verdana size=2 color=#FF6600><b>Заливаются</b> .jpge | .gif | .png</font\n";

}

?>

</font>
</td>
</tr>
</table>   
</td>
</tr>
</table>
</FORM>
</body>

</html>
