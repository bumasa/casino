<?php

$config=array();
$config['debug']=false;
$config['bets']=array('0' => 0.25, '1' => 0.50, '2' => 1.00, '3' => 5.00);
$config['wins']=array();
$config['wins'][3]=array(0=>0, 1=>0, 2=>5, 3=>20);
$config['wins'][4]=array(0=>0, 1=>0, 2=>2, 3=>10, 4=>40);
$config['wins'][5]=array(0=>0, 1=>0, 2=>1, 3=>5, 4=>20, 5=>100);
$config['wins'][6]=array(0=>0, 1=>0, 2=>1, 3=>2, 4=>8, 5=>50, 6=>1000);
$config['wins'][7]=array(0=>0, 1=>0, 2=>0, 3=>1, 4=>8, 5=>50, 6=>200, 7=>500);
$config['wins'][8]=array(0=>0, 1=>0, 2=>0, 3=>1, 4=>3, 5=>12, 6=>200, 7=>1000, 8=>5000);
$config['wins'][9]=array(0=>0, 1=>0, 2=>0, 3=>1, 4=>2, 5=>8, 6=>50, 7=>250, 8=>2500, 9=>10000);
$config['wins'][10]=array(0=>0, 1=>0, 2=>0, 3=>0, 4=>2, 5=>8, 6=>20, 7=>250, 8=>1000, 9=>5000, 10=>20000);
debug_out ("================\r\nstart\r\n");


function debug_out ($str) {
     global $config;
  if ($config['debug']) {
    $fp=fopen("./m.log", "a");
    fwrite($fp, $str);
    fclose($fp);
  }
}

//Возвращает максимально возможный выигрыш
function winlimit () {
  $q=mysql_query("SELECT proc, bank FROM `game_bank` WHERE name='ttuz'");
  list($proc, $bank)=mysql_fetch_array($q);
  $caswin = $bank/100;
  return round($caswin*$proc);
}

//Добавляет деньги в банк
function bank_add ($summa) {
    mysql_query("UPDATE `game_bank` SET bank=bank+'".$summa."' WHERE name='ttuz'");
}

//Вычитает деньги из банка
function bank_pay ($summa) {
    mysql_query("UPDATE `game_bank` SET bank=bank-'".$summa."' WHERE name='ttuz'");
}


//возвращает баланс в текущей валюте...
function cash_balance($login) {
  $q=mysql_query("SELECT cash FROM `users` WHERE login='".$login."'");
  $row=mysql_fetch_array($q);
  $cash=$row['cash'];
  return $cash;
}

//Прибавляет к счёту пользователя сумму.
function cash_add ($login, $summa) {
    mysql_query("UPDATE `users` SET cash=cash+'".$summa."' WHERE login='".$login."'");
}

//Снимает со счёта пользователя сумму
function cash_pay ($login, $summa) {
    mysql_query("UPDATE `users` SET cash=cash-'".$summa."' WHERE login='".$login."'");
}


function is_in_array ($a, $v) {
  $rezult=false;
  foreach ($a as $value) {
    if ($value==$v) {
       $rezult=true;
       break;
    }
  }

  return $rezult;
}

//Возвращает максимальное значение из множества элементов распиханых в один "прямой" массив
function array_max ($a, $return_key=false) {
  $mv=null;
  $mk=null;
  foreach ($a as $k => $value) 
{
    if ($mv==null) 
{
      $mv=$value;
      $mk=$k;
    } 
elseif ($value>$mv) 
{
      $mv=$value;
      $mk=$k;
    }
  }

  if ($return_key) 
{
    return $mk;
  } else 
{
    return $mv;
  }
}

//Возвращает минимальное значение из множества элементов распиханых в один "прямой" массив
function array_min ($a, $return_key=false) {
  $mv=null;
  $mk=null;
  foreach ($a as $k => $value) {
    if ($mv==null) {
      $mv=$value;
      $mk=$k;
    } elseif ($value<$mv) {
      $mv=$value;
      $mk=$k;
    }
  }

  if ($return_key) {
    return $mk;
  } else {
    return $mv;
  }
}

function array_mathfind ($a, $from, $to=null, $offset=0, $from_end=false) {
  if ($from_and) {
    $a=array_reverse($a, true);
  }

  foreach ($a as $k => $value) {
    if ($offset==0) {
      if ((is_int($value)) OR (is_float($value))) {
        if (($from<=$value) AND (($to>=$value) OR ($to===null))) {
          return $k;
        }
      }
    } else {
      $offset--;
    }
  }
  return false;
}

function array_myshuffle($a) {
  $b=range(0, count($a)-1);
  shuffle($b);
  $rezult=array();
  foreach ($b as $id) {
    $rezult[$id]=$a[$id];
  }
  return $rezult;
}

function generate_randmap() {
  $rezult=array();
  for ($i=0; $i<10; $i++) {
  	 mt_srand();
  	 $a=mt_rand(1, 40);
  	 while(is_in_array ($rezult, $a)) {
  	 	mt_srand();
  	 	$a=mt_rand(1, 40);
  	 }
  	 $rezult[]=$a;
  	 //$rezult[]=mt_rand(1, 40);
  }
  return $rezult;
}

function summ_map ($map, $numbers) 
{
  global $config;
  $c=count($numbers);
  $i=0;
  foreach ($numbers as $number) 
{  
	if (is_in_array ($map, $number))
 {
  	$i++;
  	}
  }
  if (isset($config['wins'][$c][$i])) 
{
    return $config['wins'][$c][$i];
  } 
else 
{
    return null;
  }
}



error_reporting( 0 );
unset($l);
session_start( );
session_register($l);
if ( !isset( $l ) )
{
    header( "Location: ../../login.php" );
    exit( );
}

//**************GAMEMODE*****************************************************************
if ($HTTP_SESSION_VARS['mode']=="true" or !isset($HTTP_SESSION_VARS['mode']))
{
 include ("../../../setup.php");
}

if ($HTTP_SESSION_VARS['mode']=="false")
{
      include ("../../../setup_virtual.php");
}
//****************************************************************************************

debug_out ("POST_ACTION=".$_POST['ACTION']."\r\n");

switch ($_POST['ACTION']) {
   case "ENTER":
   echo "&RESULT=OK&BALANCE=".cash_balance($l);
   break;

   case "EXIT":
   //echo "&RESULT=OK&BALANCE=".cash_balance($l);
   break;

   case "MAKEBET":
   debug_out ("TIME=".time()."\r\n");
   debug_out ("POST_BET=".$_POST['BET']."\r\n");
   debug_out ("POST_NUMBERS=".$_POST['NUMBERS']."\r\n");
   debug_out ("POST_ROUNDS=".$_POST['ROUNDS']."\r\n");
   debug_out ("POST_PLAY=".$_POST['PLAY']."\r\n");
   $allbet=$config['bets'][$_POST['BET']];
   $numbers=explode("|", $_POST['NUMBERS']);
   if ($allbet<=0) 
{
   	 echo "&RESULT=BAD_BET";
   	 die();
   }
   if ($allbet>cash_balance($l)) 
{
   	 echo "&RESULT=LOW_BALANCE";
   	 die();
   }
   if (count($numbers)<3) 
{
    echo "&RESULT=NUMBERS_ISNOTSET";
   }
   cash_pay($l, $allbet);
   bank_add($allbet);

   while (true) 
{
     $map=generate_randmap();
     $win=summ_map ($map, $numbers);
     if (($win!==null) AND ($win*$allbet<winlimit())) 
{
     break;
     }
   }
   $allwin=$win*$allbet;

   mysql_query( "INSERT INTO stat_game VALUES('NULL','".date( "d.m.y" )."','".date( "H:i:s" )."','".$l."','".cash_balance($l)."','".$allbet."','".$allwin."','Stars Keno')" );

   if ($allwin>0) 
{  
     cash_add($l, $allwin);
     bank_pay($allwin);
       	 echo "&RESULT=OK"
   	     ."&NUMBERS=".implode("|", $map)
   	     ."&PAYOUT=".$allwin
   	     ."&BALANCE=".cash_balance($l);
   }
 else 
{
  	 //include( "../../par_prog.php" );
   	 echo "&RESULT=OK"
   	     ."&NUMBERS=".implode("|", $map)
   	     ."&PAYOUT=0"
   	     ."&BALANCE=".cash_balance($l);
   }

   //RESULT
   //BET
   //NUMBERS
   //BALANCE
   //PAYOUT
   //echo "&RESULT=OK&NUMBERS=1|2|3|4|5|6|7|8|9|10&PAYOUT=1";
   break;

   case "MOVE":
   echo "&RESULT=NOT_IMPL_MOVE&BALANCE=".cash_balance($l);
   break;
}


debug_out ("end\r\n================\r\n");


?>