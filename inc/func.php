<?php

$clientid = array('eb53016cc88f842d6403d381e7f356f6');
$ganti=array_rand($clientid);
$mantap=$clientid[$ganti];

error_reporting(0);

function ngegrab($url){
ini_set("user_agent","Mozilla/5.0 (Linux; Android 5.0; ae-ae; SAMSUNG SM-G900F/G900FXXU1BNL9 Build/LRX21T)");
$grab = @fopen($url, 'r');
$contents = "";
if ($grab) {
while (!feof($grab)) {
$contents.= fread($grab, 8192);
}
fclose($grab);
}
return $contents;
}

function format_size($size){$filesizename=array(" Bytes"," KB"," MB"," GB"," TB"," PB"," EB"," ZB"," YB");
return $size ? round($size/pow(1024,($i=floor(log($size,1024)))),2).$filesizename[$i] : '4.5MB';}
function querydecode($q){$q=preg_replace("/[^A-Za-z0-9[:space:]]/","$1",strip_tags(ucwords(strtolower($q))));
$q=str_replace(' ','-',$q);
return $q;
}
function queryencode($q){
$q=str_replace('-',' ',strip_tags($q));
$q=ucwords($q);
return $q;


}
function getlinkdl($id){$grab=json_decode(ngegrab('http://api.soundcloud.com/tracks/'.$id.'/streams?client_id=bb3a64cd418a8e342ac926f059846d0d'));
$link=$grab->http_mp3_128_url;
return $link;
}
function getfilesize($url) {$data=get_headers($url, true);
if (isset($data['Content-Length']))
return (int)$data['Content-Length'];}

function potong($content,$start,$end){
if($content && $start && $end) {
$r = explode($start, $content);
if (isset($r[1])){
$r = explode($end, $r[1]);
return $r[0];}
return '';}}

function format_time($t,$f=':'){
if($t < 3600){
return sprintf("%02d%s%02d", floor($t/60)%60, $f, $t%60);
}else{
return sprintf("%02d%s%02d%s%02d", floor($t/3600), $f, ($t/60)%60, $f, $t%60);
}
}
function clearspace($q){
$qu=str_replace(" ","+", $q);
$qu=str_replace("-","+", $qu);
$qu=str_replace("_","+", $qu);
return $qu;
}
$ad=array('ReaL RapE VideO','DesI BhabI Rape','KaTrina SaLman','MusLim GirL 3Gp','Doctor Vs Nurse','DownLoad Videos','Katrina BluFilm','SchooL GirL 3Gp','Sunny Leaon 3Gp','3Gp Porn Videos','Download Videos','Young Wife 3Gp','Play This Video','Priya Rai FuckD','Doctor vs Nurse','Pooja ki chudai','Indian A Videos','Katina-Ohh-FuCk','School Girl.3gp','Full Hot Videos','H.D Mp4 Videos','Free 3Gp Videos','Free 2014 Games','Full Mp3 Songs','Full Mp4 Videos','Download Videos','Best Java Games','New 2014 Games','Video Downloads','Free Java Games','Mp3,Games,Theme','Full 3Gp Videos');
shuffle($ad);
?>