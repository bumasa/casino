<? include ("header.php"); ?>

<td width="2px"><img src="image/spacer.gif" width="2px" height=1></td><td valign="top" width="100%" style=" margin:0; padding:0 4 10 4px; "><div style="margin:0; padding:0; "><img src="image/spacer.gif" width="300px" height=1></div> 
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" style="background-color:#000000; border:1px solid #6E2500; padding:1px; ">
	
	<table width="100%" style="height:100%; border:1px solid #2E2E2E;  " border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td valign="top">
<div style="padding-left:10px; padding-top:5px; padding-bottom:10px; padding-right:10px">
      <center><font class="option" color="#FFFFFF"><b>ГЕНЕРАТОР ИГРОВОГО КОДА</b></font></center><br>

<font class="content">


			
			<div class="leftNavHdr1" align="center">Код сгенерирован</div><br>
			<div class="nav" align="center"><? include ("gen/generir.php"); ?></div>
								<br /><br />
		</div> 
		
<?

$PHP_SELF = $HTTP_SERVER_VARS['PHP_SELF'];

$action = $HTTP_POST_VARS['action'];

if ($action == "generate") {

// Get Form Data
$name = htmlentities($HTTP_POST_VARS['frmName'], ENT_QUOTES);
$expiryDay = $HTTP_POST_VARS['expiryDay'];
$expiryMonth = $HTTP_POST_VARS['expiryMonth'];
$expiryYear = $HTTP_POST_VARS['expiryYear'];
$expiry = mktime(23, 59, 59, $expiryMonth, $expiryDay, $expiryYear);

// Include The Code Generator API & Run It
	
include('generate_api.php');
$licCode = phpunlock_generate($name,$expiry,"4fk494k3asdfasdf920k334","dierk4dasdfasdfidk3i232","94kdkeifasdfk2i2k23d","dikeowl3adfasd92kdowi");

// Print Out The Results

printResults();

}

else {printForm();}



function printForm() {

global $PHP_SELF;

echo "<html>\n";
echo "<head>\n";
echo "<title>Генератор</title>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">\n";
echo "</head>\n";
echo "\n";
echo "<body>\n";
echo "<font class=\"content\">Каждая игра запускается и работает используя свой, неповторимый код.
 Таким образом никто не в состоянии повлиять на игровой процесс.<br>Как работает: При запуске игры данные передаются на генератор случайного кода. 
Генерируется код и запускается игровой процесс. При выходе из игры код скидывается. При запуске новой игры генерируется новый случайный код. 
Как примерно эта система работает вы можете проверить в форме ниже. Введите любое значение в поле. Это может быть любой набор символов. 
Нажмите кнопку Сгенерировать код. Удачной Вам игры.</font>\n";
echo "<p>&nbsp;</p>\n";
echo "<form name=\"form1\" method=\"post\" action=\"$PHP_SELF\">\n";
echo " <input name=\"action\" type=\"hidden\" value=\"generate\">\n";
echo "  <div align=\"center\">\n";
echo "    <table border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"0\">\n";
echo "      <tr>\n";
echo "        <td width=\"200\"><div align=\"right\"><strong><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">\n";
echo "           Введите значение:</font></strong></div></td>\n";
echo "        <td> <input name=\"frmName\" type=\"text\" id=\"frmName\" size=\"40\"> </td>\n";
echo "      </tr>\n";
echo "      <tr>\n";
echo "      <tr>\n";
echo "        <td><div align=\"right\"><strong><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Дата генерации:\n";
echo "            </font></strong></div></td>\n";
echo "        <td>";
DateSelector("expiry");
echo "</td>\n";
echo "      </tr>\n";
echo "    </table>\n";
echo "    <p>\n";
echo "      <input type=\"submit\" name=\"Submit\" value=\"Сгенерировать код\">\n";
echo "    </p>\n";
echo "  </div>\n";
echo "</form>\n";
echo "</body>\n";
echo "</html>";


}


function printResults() {

global $name, $domain, $database, $expiry, $licCode;

if ($domain == "") {$domain = "Не введено";}
if ($name == "") {$name = "Не введено";}
if ($database == "") {$database = "Не введено";}

$expiryDate = date("M d, Y", $expiry);

echo "<html>\n";
echo "<head>\n";
echo "<title>Сгенерировано!</title>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">\n";
echo "</head>\n";
echo "\n";
echo "<body>\n";
echo "<p>&nbsp;</p>\n";
echo "<p align=\"center\"><font color=\"#FF0000\" size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><strong>Код сгенерирован!</strong></font></p>\n";
echo "<table border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"2\" bgcolor=\"#000000\">\n";
echo "  <tr>\n";
echo "    <td bgcolor=\"#f5F5F5\"><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><strong>$licCode</strong></font></td>\n";
echo "  </tr>\n";
echo "</table>\n";
echo "<p align=\"center\">\n";
echo "  <input type=\"submit\" name=\"Submit\" value=\"Код\">\n";
echo "</p>\n";
echo "<table border=\"0\" align=\"center\" cellpadding=\"5\" cellspacing=\"0\">\n";
echo "  <tr>\n";
echo "    <td width=\"100\"><strong><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Значение:</font></strong></td>\n";
echo "    <td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">$name\n";
echo "      </font></td>\n";
echo "  </tr>\n";
echo "  <tr>\n";
echo "  <tr>\n";
echo "    <td><strong><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">Дата генерации:\n";
echo "      </font></strong></td>\n";
echo "    <td><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">$expiryDate</font></td>\n";
echo "  </tr>\n";
echo "</table>\n";
echo "</body>\n";
echo "</html>";



}


function DateSelector($inName, $useDate=0) { 

//create array so we can name months 

$monthName = array(1=> "Янв",  "Февр",  "Март", "Апр",  "Май",  "Июнь",  "Июль",  "Авг", "Сент",  "Окт",  "Нояб",  "Декабрь"); 

//if date invalid or not supplied, use current time 

if($useDate == 0) { 
	
$useDate = Time(); 

} 

// make month selector 

print("<select name=" . $inName .  "Month>\n"); 

for($currentMonth = 1; $currentMonth <= 12; $currentMonth++) { 
	
print("<option value=\""); 
print(intval($currentMonth)); 
print("\""); 
if (intval(date( "m", $useDate))==$currentMonth) { 
	
print(" selected"); 

} 

print(">" . $monthName[$currentMonth] .  "\n"); 

} 
        
print("</select>"); 


// make day selector 

print("<select name=" . $inName .  "Day>\n"); 
for($currentDay=1; $currentDay <= 31; $currentDay++) { 

print("<option value=\"$currentDay\""); 

if(intval(date( "d", $useDate))==$currentDay) { 
	
print(" selected"); 

} 

print(">$currentDay\n"); 

} 
        
print("</select>"); 


// make year selector 

print("<select name=" . $inName .  "Year>\n"); 

$startYear = date( "Y", $useDate); 

for($currentYear = $startYear; $currentYear <= 2038;$currentYear++) { 
	
print("<option value=\"$currentYear\""); 

if(date( "Y", $useDate)==$currentYear) { 
	
print(" selected"); 

} 
print(">$currentYear\n"); 

} 

print("</select>"); 

} 


?>


</font></ul></div></div>		
		</td>
	  </tr>
	</table>

	
	</td>
  </tr>
</table>
		
<? include ("footer.php"); ?>