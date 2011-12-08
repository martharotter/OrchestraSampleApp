<?php
//get the q parameter from URL
$q=$_GET["q"];

//find out which feed was selected
if($q=="Orchestra")
  {
  $xml=("http://blog.orchestra.io/rss");
  }
elseif($q=="Intercom")
  {
  $xml=("http://feeds.feedburner.com/contrast/blog?format=xml");
  }
elseif($q=="Vigill")
  {
  $xml=("http://vigill.tumblr.com/rss");
  }
elseif($q=="Lokofoto")
  {
  $xml=("http://blog.lokofoto.com/rss");
  }
elseif($q=="Exordo")
  {
  $xml=("http://blog.exordo.com/feed/");
  }
elseif($q=="Allmoto")
  {
  $xml=("http://www.allmoto-online.com/site/blog/feed/rss/");
  }
elseif($q=="OnePageCRM")
  {
  $xml=("http://www.onepagecrm.com/happy-selling-blog/feed/rss/");
  }
elseif($q=="TeamworkPM")
  {
  $xml=("http://engineroom.teamworkpm.net/rss.xml");
  }
  

$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get elements from "<channel>"
$channel=$xmlDoc->getElementsByTagName('channel')->item(0);
$channel_title = $channel->getElementsByTagName('title')
->item(0)->childNodes->item(0)->nodeValue;
$channel_link = $channel->getElementsByTagName('link')
->item(0)->childNodes->item(0)->nodeValue;
$channel_desc = $channel->getElementsByTagName('description')
->item(0)->childNodes->item(0)->nodeValue;

//output elements from "<channel>"
echo("<p><a href='" . $channel_link
  . "'>" . $channel_title . "</a>");
echo("<br />");
echo($channel_desc . "</p>");

//get and output "<item>" elements
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i<=2; $i++)
  {
  $item_title=$x->item($i)->getElementsByTagName('title')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_link=$x->item($i)->getElementsByTagName('link')
  ->item(0)->childNodes->item(0)->nodeValue;
  $item_desc=$x->item($i)->getElementsByTagName('description')
  ->item(0)->childNodes->item(0)->nodeValue;

  echo ("<p><a href='" . $item_link
  . "'>" . $item_title . "</a>");
  echo ("<br />");
  echo ($item_desc . "</p>");
  }
?>