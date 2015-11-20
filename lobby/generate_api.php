<?


function phpunlock_generate($name,$domain,$database,$expiryDate,$privatePassword1,$privatePassword2,$privatePassword3,$privatePassword4) {
	
if ($domain == "") {$domain = "не введено";}
if ($name == "") {$name = "не введено";}
if ($database == "") {$database = "не введено";}
if ($expiryDate == "") {$expiryDate = "2145830399";}

// Get Current Time

$currentTime = time();
$currentDate = getdate();

// Build The Data Structure For The Code

$codeStructure .= trim(strtoupper($name));
$codeStructure .= "\\\.//";
$codeStructure .= "$privatePassword1";
$codeStructure .= "\\\.//";
$codeStructure .= trim(strtoupper($domain));
$codeStructure .= "\\\.//";
$codeStructure .= "$privatePassword2";
$codeStructure .= "\\\.//";
$codeStructure .= trim(strtoupper($database));
$codeStructure .= "\\\.//";
$codeStructure .= "$privatePassword3";
$codeStructure .= "\\\.//";
$codeStructure .= trim(strtoupper($database));
$codeStructure .= "\\\.//";
$codeStructure .= "$privatePassword4";

// Encrypt The Code

$encodedData=strtr(substr(strtoupper(strrev(md5(strrev(base64_encode(bin2hex($codeStructure)))))),0,20),"NnOoPpQqRrSsTtUuVvWwXxYyZzAaBbCcDdEeFfGgHhIiJjKkLlMm","AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz");
$encodedDate=strtr(substr(strtoupper(strrev(md5(strrev(base64_encode(bin2hex($expiryDate)))))),0,15),"NnOoPpQqRrSsTtUuVvWwXxYyZzAaBbCcDdEeFfGgHhIiJjKkLlMm","AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz");

// Combine The Date and Data Strings

$encodedCode = $encodedData . $encodedDate;

// Format The Time Stamp (Padding To 15 Characters)

$dateLength = strlen($expiryDate);
$appendLength = 14 - $dateLength;
$reversedDate = strrev($expiryDate);
$dateHack = substr($expiryDate,0,$appendLength);
$expiryDate = $expiryDate . "A" . $dateHack;
$expiryDate = strrev(strtr($expiryDate,"5678901234","0123456789"));

// Combine The Master Code With The Timestamp

$count = 0; 
while($count < strlen($encodedCode)){ 
$encodedCharacters[] = substr($encodedCode,$count,1); 
$count++; 
} 

$count = 0; 
while($count < strlen($expiryDate)){ 
$timeCharacters[] = substr($expiryDate,$count,1); 
$count++; 
} 

$count = 0;
$timeCount = 0;

foreach ($encodedCharacters as $char) {

$combinedCode .= $char;
if ($timeCount <= 15) {
$combinedCode .= $timeCharacters[$count];
}
$count++;	
$timeCount++;	

}


$encodedCharacters = array();
$count = 0; 
while($count < strlen($combinedCode)){ 
$encodedCharacters[] = substr($combinedCode,$count,1); 
$count++; 
} 

$count = 0;
$dashcount = 0;
foreach ($encodedCharacters as $char) {
$count++;
if ($count == 5 and $dashcount != 9) {
$finalCode .= $char;
$finalCode .= "-";
$dashcount++;
$count = 0;
}
else {
$finalCode .= $char;
}
	
}

return $finalCode;

}

?>