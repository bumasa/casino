<? include ("header.php"); ?>
<center><h4><font color=7C87C2>Выплата выигрышей</font></h4><br>
<table border=0 cellspacing=0 cellpadding=3 >
<?
$result=mysql_query("select * from zakaz where id='$id'");
$row=mysql_fetch_array($result)
?>

<tr><td class=text1><b>Номер заказа :</b></td><td class=text1><b><? echo $row[0] ?></b></td></tr>
<tr><td class=text1><b>Логин :</b></td><td class=text1><b><? echo $row[1] ?></b></td></tr>
<tr><td class=text1><b>Платежная система :</b></td><td class=text1><b><? echo $row[2] ?></b></td></tr>
<tr><td class=text1><b>Счет (Кошелек) :</b></td><td class=text1><b><? echo $row[3] ?></b></td></tr>
<tr><td class=text1><b>Сумма заказа :</b></td><td class=text1><b><? echo $row[4] ?> Руб.</b></td></tr>

<tr><td class=text1><br>
<a href='wmk:payto?Purse=<? echo $row[3]; ?>&Amount=<? echo $row[4]; ?>&Desc=Перевод из казино&BringToFront=Y'>Зачислить на WMR кошелек</a>
<br>Перед оплатой убедитесь,<br> что игрок ввел Рублевый кошелек</td></tr>

<tr><td class=text1><br>

<td class=text1>Для перевода на Yandex <br>переведите сумму на счет <br>и нажмите  <a href='zakaz_p.php?id=<? echo $row[0]; ?>&oplata=ok'>Подтвердить</a>
</td>
</td></tr>



<tr><td class=text1>
<a href='zakaz_p.php?id=<? echo $row[0]; ?>&oplata=ok'><b>Подтвердить</b></a>
</td></tr>

</table><hr>
Внимание !!!  после перевода денег ОБЯЗАТЕЛЬНО подтвердите перевод, во избежания повторных оплат!!!
</center>


<?
if ($oplata=="ok"){
mysql_query("update zakaz set flag='0' where id='$id'");
echo "<script> alert('Счет обработан успешно!'); document.location.href='zakazlist.php'; </script>";
}
include ("footer.php"); 
?>