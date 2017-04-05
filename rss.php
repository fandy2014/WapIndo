<?php
$div = "|#|";
$dat='last.txt';
$date = date('D, d M Y (h:i)');
$fp = fopen($dat, 'r');
$count = fgets($fp);
fclose($fp);
$cari = 'q='.$q;
$cari = str_replace('+', ' ',$cari);
$data = explode($div, $count);
if (in_array($cari, $data))
{
$tulis = implode($div, $data);
}
else
{
$data = explode($div, $count);
$tulis = $data[1].''.$div.''.$data[2].''.$div.''.$data[3].''.$div.''.$data[4].''.$div.''.$data[5].''.$div.''.$data[6].''.$div.''.$data[7].''.$div.''.$data[8].''.$div.''.$data[9].''.$div.''.$data[10].''.$div;
$tulis .= $cari;
}
if (!empty($q)){
$masuk=fopen($dat, 'w');
fwrite($masuk,$tulis);
fclose($masuk);
}
$div = '|#|';
$search = 'last.txt';
$fa = fopen($search, 'r');
$b = fgets($fa);
fclose($fa);
$host=$_SERVER['HTTP_HOST'];
  Header("Content-Type: application/xml; charset=UTF-8");
  echo '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
        <channel>
        <title>LAGUMP3 RSSFEED</title>        <atom:link href="http://'.$host.'/rss.xml" rel="self" type="application/rss+xml" />
        <link>http://'.$host.'</link>
        <description>Gratis Download Lagu Terbaru for Smartphone and Mobile Phone, mp3 Google, Google.Co.Id, Google.Com</description>
        <language>id-ID</language>
    <generator>Sugeng Apriyadi</generator>
        ';
  $c = explode($div, $b);
foreach(array_reverse($c) as $d){
$lastsearch = explode('q=',$d);
$title = trim($lastsearch[1]);
$link = str_replace(' ', '-', $title);
  echo "<item>";
  echo "<title>$title</title>";
  echo "<link>http://$host/lagu/$link.html</link>";
  echo "<guid>http://$host/lagu/$link.html</guid>";
  echo "<description>Download Gratis Lagu $title Dengan Kualitas HD</description>";
  echo "<pubDate>$date</pubDate>";
  echo "</item>";
}
echo "</channel></rss>";
?>