<?php
/*   CRss ������ 1.0 �� 02.01.2007
*    ����� ��� �������� ������� �������� RSS
*    http://www.caseclub.ru
*    ����������� ��� �����������
*/
class CRss
{
 var $Title;          // ��������� ������
 var $Link;           // ������ �� ������� ��������
 var $Copyright;      // ��������
 var $Description;    // �������� ������
 var $LastBuildDate;  // ���� ���������� ��������� (�� ��������� �������)
 var $Language;        // ����
 var $PubDate;        // ���� ����������
 var $ManagingEditor;  // E-mail ���������
 var $WebMaster;      // E-mail webmaster
 var $Category;       // ���������

 var $Query;          // ���������� �������
 var $Connect;           // ��� ���������� � ����� ������
 var $Result;         // ��� �������� ����������

 function Translate($text)    // �������� ��� ������
 {
    $trans = array("<" => "&lt;", ">" => "&gt;",'"' => "&quot;","&" => "&amp;");
    $text=strtr($text,$trans);
    $array=explode("<br>",$text);
    $count=count($array);
    return $text;
 }

 function PrintHeader()   // ������ ���������
 {
      header("Content-Type: application/xml ");   // ����� �������, ��� ��� ������ XML
      $End="?";
      $Date=date("r");   // ���� � ������� Mon, 25 Dec 2006 10:23:37 +0400
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
 function PrintBody($Title,$Link,$Description,$Category,$PubDate)   // ������ ����
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
 function PrintFooter()   // ������ ���������
 {
    print "   </channel>\r\n";
    print "</rss>\r\n";
 }


}
?>
