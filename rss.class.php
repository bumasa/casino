<?php
/*   CRss версия 1.0 от 02.01.2007
*    класс для создания каналов новостей RSS
*    http://www.caseclub.ru
*    используйте без ограничений
*/
class CRss
{
 var $Title;          // заголовок канала
 var $Link;           // ссылка на главную страницу
 var $Copyright;      // копирайт
 var $Description;    // описание канала
 var $LastBuildDate;  // дата последнего документа (по умолчанию текущая)
 var $Language;        // язык
 var $PubDate;        // дата публикации
 var $ManagingEditor;  // E-mail редактора
 var $WebMaster;      // E-mail webmaster
 var $Category;       // категория

 var $Query;          // содержимое запроса
 var $Connect;           // для соединения с базой данных
 var $Result;         // для хранения результата

 function Translate($text)    // кодируем для вывода
 {
    $trans = array("<" => "&lt;", ">" => "&gt;",'"' => "&quot;","&" => "&amp;");
    $text=strtr($text,$trans);
    $array=explode("<br>",$text);
    $count=count($array);
    return $text;
 }

 function PrintHeader()   // печать заголовка
 {
      header("Content-Type: application/xml ");   // сразу говорим, что это формат XML
      $End="?";
      $Date=date("r");   // дата в формате Mon, 25 Dec 2006 10:23:37 +0400
      print "<$End";
      print "xml version=\"1.0\" encoding=\"windows-1251\" $End> \r\n";
      print "<rss version=\"2.0\">\r\n";
      print "   <channel>\r\n";
      print "       <title>$this->Title</title>\r\n";
      print "       <category>$this->Category</category>\r\n";
      print "       <link>$this->Link</link>\r\n";
      print "       <copyright>$this->Copyright</copyright>\r\n";
      print "       <description>$this->Description</description>\r\n";
      print "       <lastBuildDate>$this->LastBuildDate</lastBuildDate>\r\n";
      print "       <language>$this->Language</language>\r\n";
      print "       <pubDate>$this->PubDate</pubDate>\r\n";
      print "       <docs>http://blogs.law.harvard.edu/tech/rss</docs>\r\n";
      print "       <managingEditor>$this->ManagingEditor</managingEditor>\r\n";
      print "       <webMaster>$this->WebMaster</webMaster>\r\n";
}
 function PrintBody($Title,$Link,$Description,$Category,$PubDate)   // печать тела
{
      $Description = $this->Translate($Description);
      print "              <item>\r\n";
      print "                <title>".$Title."</title>\r\n";
      print "                 <link>".$Link."</link>\r\n";
      print "                 <description><![CDATA[".$Description."]]></description>\r\n";
      print "                 <category>".$Category."</category>\r\n";
      print "                 <pubDate>".$PubDate."</pubDate>\r\n";
      print "                 <guid>".$Link."#".$PubDate."</guid>\r\n";
      print "              </item>\r\n";
}
 function PrintFooter()   // печать заголовка
 {
    print "   </channel>\r\n";
    print "</rss>\r\n";
 }


}
?>
