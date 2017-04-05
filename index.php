<?php 
include'inc/func.php';

$title='Wapindo.Net - Gudang Download Mp3 Terbaru Gratis';

include 'inc/head.php';
echo '<div class="ngiri"><div class="r">Top Songs on iTunes</div><div class="menu">';
function ipankwap($url){
$ua="Nokia6020/2.0 (04.90) Profile/MIDP-2.0 Cofiguration/CLDC-1.1";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_USERAGENT,$ua);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$exec=curl_exec($ch);
return $exec;
}
$grab = strstr(ipankwap('https://www.apple.com/id/itunes/charts/songs/'),'class="section chart-grid');
$ipank = explode('</strong>',$grab);
for($i=1; $i<=15; $i++){
$file = cut($ipank[$i],'l=en">','</a>');
$artsi = cut($ipank[$i],'&amp;l=en">','</a></h4>');
$ipk = explode('">',$file);
$jdlnya = cut($ipk[0].'">','alt="','">');
$link=$artsi.'-'.$jdlnya;
$link=str_replace(' ', '-', $link);
$link=strtolower($link);
if(!empty($ipk[0])){
echo '<table width="100%" class="otable"><tbody><tr><td>'.$artsi.' - '.$jdlnya.'<br /><a href="/searchmp3/'.$link.'"><span class="label">Music</span></a> <a href="/search/'.$link.'"><span class="labels">Video</span></a></td></tr></tbody></table>';
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




echo'<div class="ngiri"><div class="r">Welcome to WapIndo.Net</div><div class="file"><center><img src="/img/wapindo.png" width="60%"><br />
WapIndo.Net is just free Music, Video and Image Search Engine for your favorites Music, Video and Image. <br /> We indexing millions of music files from all around the world. and none of the files that uploaded and stored on our server.
<br /><br />
WapIndo.Net is a search engine designed for Legal Entertainment purposes only. <b>Do not download copyrighted material without permission.</b> Please read our <a href="/disclaimer.php" target="_blank">Disclaimer</a>, before you proceed to search and download any files.
<br /><br />
You may support the artists by buying mp3 from the legal source. Just visit our music store to get the legal mp3 files.</center> 
</div><div class="title2"> Category </div><div class="file"><a href="/genre/pop.html"><div class="musikgenre">POP</div></a>
<a href="/genre/rock.html"><div class="musikgenre">Rock</div></a>
<a href="/genre/soundtrack.html"><div class="musikgenre">Soundtrack</div></a>
<a href="/genre/dangdut.html"><div class="musikgenre">Dangdut</div></a>
<a href="/genre/remix.html"><div class="musikgenre">Remix</div></a>
<a href="/genre/reggae.html"><div class="musikgenre">Reggae</div></a>
<a href="/genre/hiphop.html"><div class="musikgenre">Hip Hop</div></a>
<a href="/genre/jazz.html"><div class="musikgenre">Jazz</div></a>
<a href="/genre/cover.html"><div class="musikgenre">Cover </div></a>
<a href="/genre/rnb.html"><div class="musikgenre">R & B</div></a>
<a href="/genre/comedy.html"><div class="musikgenre">Comedy</div></a>
<a href="/genre/folk.html"><div class="musikgenre">Folk</div></a><a href="/genre/dj.html"><div class="musikgenre">Dj</div></a><a href="/genre/mashup.html"><div class="musikgenre">Mash UP</div></a>
<a href="/genre/instrumental.html"><div class="musikgenre">Instrumental</div></a>
<a href="/genre/religi.html"><div class="musikgenre">Religi</div></a>
<a href="/genre/quran.html"><div class="musikgenre">Al-Quran</div></a></div>

</div>';
include 'inc/foot.php'; ?>