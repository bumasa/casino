<?php
   // ������ ���������
   include "rss.class.php";           // ��� ���������� �����
   include "setup.php";
   
   function maxsite_str_word($text, $counttext = 5, $sep = ' ') {
    $words = split($sep, $text);
    if ( count($words) > $counttext )
    $text = join($sep, array_slice($words, 0, $counttext));
    if (($pos=strpos($text, "<br>")) == 0) {
    $pos = strpos($text, "<br>", 4);
    }
    if ($pos !== false) {
    return substr($text, 0, $pos);
    } else {
    return $text;
    }
   }
   
   function return_date($date) {
     $date = explode(".", $date);
     return date("r",strtotime($date[0].".".$date[1].".20".$date[2]));
   }

   $Rss = new CRss();

   $Rss->Title="������� ������";
   $Rss->Link="http://azartsoft.co.cc/";
   $Rss->Copyright="� 2009 azartsoft.co.cc";
   $Rss->Description="��������� RSS �������� ������";
   $Rss->Category = "�������� ���� ������";
   $Rss->Language="ru";
   $Rss->ManagingEditor="admin@azartsoft.co.cc";
   $Rss->WebMaster="admin@azartsoft.co.cc";
   $Rss->LastBuildDate=date("r");
   $line = mysql_fetch_row(mysql_query("select data FROM news ORDER by data
desc Limit 0,1"));
   $Rss->LastBuildDate=return_date($line[0]);
   $Rss->PubDate=$Rss->LastBuildDate;
   $Rss->PrintHeader();

   $result=mysql_query("select * from news ORDER BY `id` DESC ", $full_base);
     while ($row = mysql_fetch_array($result))
     {   // ��� ������ ������ �������
               $Title = maxsite_str_word($row['news']);
               $Description = str_replace("<br>", "\r\n",
$row['news']);
               $Link="http://azartsoft.co.cc/";
               $PubDate=return_date($row['data']);
               $Category="������� �����";
               $Rss->PrintBody($Title,$Link,$Description,$Category,$PubDate);
    }
    $Rss->PrintFooter();

?> 