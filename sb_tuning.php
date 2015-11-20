<?php


define('HASH_DELTA', 561389);  //нужно изменить
define('HASH_FIELDNAME', 'hf');

class TProtectCode{

var $hashcode;
var $hashvalue;
var $hashfield;
var $msg = 'TUNING'; 	// text to display

	function GetCode($hmin=1000, $hmax=9999, $fieldname=HASH_FIELDNAME){
		$this->hashcode = rand($hmin, $hmax);
		$this->hashvalue = md5($this->hashcode + HASH_DELTA);
		$this->hashfield = '<input type=hidden name="'.$fieldname.'" value="'.$this->hashvalue.'">';
		//проявляем фантазию
		$this->msg = $this->hashcode; //simple
		//пример кода со сложением
		$s1 = rand(1, min(9, $this->hashcode - 1));
		$this->msg = (string)($this->hashcode - $s1).'+'.(string)$s1.'=';
	}

	function CheckCode($code, $hash){
		return ($hash == md5($code + HASH_DELTA));
	}

}

?>