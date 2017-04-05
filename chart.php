<?php
include'inc/func.php';
if (!empty($_GET['q']))
{
$q=$_GET['q'];
header("location: search.php?act=music&q=$q");
}
if (!empty($_GET['genre']))
{
$genre=$_GET['genre'];
header("location: music?genre=$genre");
}
$title = 'Top Songs and Music Videos Chart';
$description = 'Top Songs and Music Video Chart - ';
include'inc/head.php';
echo '<div class="ngiri"><div class="r">Top Songs and Music Videos Chart</div><div class="menu">';
function ipankwap($url){
$ua="Nokia6020/2.0 (04.90) Profile/MIDP-2.0 Cofiguration/CLDC-1.1";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_USERAGENT,$ua);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$exec=curl_exec($ch);
return $exec;
}
$grab = strstr(ipankwap('https://www.apple.com/itunes/charts/songs/'),'class="section chart-grid');
$ipank = explode('</strong>',$grab);
for($i=1; $i<=100; $i++){
$file = cut($ipank[$i],'l=en">','</a>');
$artsi = cut($ipank[$i],'&amp;l=en">','</a></h4>');
$ipk = explode('">',$file);
$jdlnya = cut($ipk[0].'">','alt="','">');
$link=$artsi.'-'.$jdlnya;
$link=str_replace(' ', '-', $link);
$link=strtolower($link);
if(!empty($ipk[0])){
echo '<table width="100%" class="otable"><tr valign="top"><td><b>'.$i.'.</b></td><td width="20%">'.$ipk[0].'"></td><td width="80%"><b>'.$artsi.'</b> - '.$jdlnya.'<br /><a href="/searchmp3/'.$link.'"><span class="label">Music</span></a> <a href="/search/'.$link.'"><span class="labels">Video</span></a></td></tr/></table>';
}}

function cut($content,$start,$end){
if($content && $start && $end) {
$r = explode($start, $content);
if (isset($r[1])){
$r = explode($end, $r[1]);
return $r[0];
}return '';}}
echo '</div></div>
';
include 'inc/foot.php';

?>