<?php
include'inc/func.php';
$id=$_GET['id'];
$grab=json_decode(ngegrab('http://api.soundcloud.com/tracks/'.$id.'.json?client_id=4bc10ddc045d29dc6983d0e15dc101c7'));
$duration=format_time($grab->duration/1000);
if($song=$grab->artwork_url) {
$thumb = $song;
}else {
$thumb = 'http://www.wapindo.net/img/thumb.png';
}
if(!empty($grab->genre)){
$genre=$grab->genre;
}else{
$genre='wapindo.net';
}
$name=$grab->title;
$size=format_size(getfilesize(getlinkdl($id)));
if(!empty($name) && !empty($_GET['id']) && !empty($_GET['permalink'])){
$title='Download Lagu '.$name.' ('.$size.').mp3 - WapIndo.Net';
include'inc/music_head.php';
echo'<div class="ngiri"><h1 class=title_a align=justify><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a href="/" rel="v:url" property="v:title">Home</a></span> &raquo; <span typeof="v:Breadcrumb"><a href="/genre/'.$genre.'.html" rel="v:url" property="v:title">'.$genre.'</a></span> &raquo; <span typeof="v:Breadcrumb"><span class="breadcrumb_last" property="v:title"><a href="/download/'.$_GET['id'].'/'.$_GET['permalink'].'.html">Download Lagu '.$name.'.mp3 ('.$size.') Gratis</a></span></span></span></h1>
<div class="file"><table class="otable"><tbody><tr><td width="110" height="110"> <img src="'.$thumb.'" width="100%" alt="artwork" style="border-radius:35%;"></td><td> 
Lagu <u>'.$name.'</u> ini dapat kamu download di <b>wapindo.net</b> secara gratis. dengan catatan: ini hanya sebagai sebuah review saja. untuk mendapatkan lagu ini secara <b>Legal</b>, belilah CD originalnya dan gunakanlah i-
Ring / RBT / NSPnya atau anda juga bisa membelinya juga di iTunes.
</td></tr>
</tbody></table>
<table class="otable" style="width:100%"><tbody><tbody><tr valign="top"><td width="30%">Name</td><td>:</td><td>'.$name.'.mp3</td></tr>
<tr valign="top"><td width="30%">Genre</td><td>:</td><td><a href="/genre/'.$genre.'.html">'.$genre.'</a></td></tr><tr valign="top"><td width="30%">Duration</td><td>:</td><td>'.$duration.'</td></tr>
<tr valign="top"><td width="30%"> Audio Summary </td> <td> : </td><td> Audio: mp3, 44100 Hz, stereo, s16p, 128 kb/s </td></tr>
<tr valign="top"><td width="30%">Size</td><td>:</td><td>'.$size.'</td></tr>
<tr valign="top"><td width="30%">Bitrate</td><td>:</td><td>128 kbps</td></tr>
<tr valign="top"><td width="30%"> Source</td><td> : </td><td> soundcloud </td></tr></tbody></table></div>';
$permexp=explode('-',$grab->permalink);
echo'<div class="file">Tag: ';
foreach($permexp as $perma){
echo'<a href="/lagu/'.$perma.'.html">'.ucfirst($perma).'</a>, ';
}
echo'</div>';
echo'<div class="file"><center><form method="post" action="/wapindo.php" enctype="multipart/form-data">
<input type="hidden" class="input" name="mp3_filepath" value="http://'.$_SERVER['HTTP_HOST'].'/musikmp3/'.$id.'.mp3" />
<input type="hidden" class="input" name="mp3_filename" value="'.$name.' (wapindo.net).mp3" />
<input type="hidden" class="input" name="mp3_songname" value="'.$name.' (wapindo.net)" />
<input type="hidden" class="input" name="mp3_comment" value="wapindo.net Gudangnya Musik dan Video" />
<input type="hidden" class="input" name="mp3_artist" value="wapindo.net" />
<input type="hidden" class="input" name="mp3_album" value="wapindo.net" />
<input type="hidden" class="input" name="mp3_year" value="2015" />
<input type="hidden" class="input" name="mp3_genre" value="'.$genre.'" />
<input type="submit" name="submit" class="dbutton" align="center" style="vertical-align:middl­e;width:250;" value=" Download ( '.$size.' )"/></form><a href="/musikmp3/'.$id.'.mp3" rel="nofollow" style="padding:7px ;text-align:center;background:#ff0000;color:#fff;text-shadow:0 1px #2b9;font-size:12px;font-weight:bold;"><b>Link I ( '.$size.' )</b></a> - <a href="/mp3.php?id='.$id.'" rel="nofollow" style="padding:7px ;text-align:center;background:#FFA500;color:#fff;text-shadow:0 1px #2b9;font-size:12px;font-weight:bold;"><b>Link II ( '.$size.' )</b></a></form></br></div></a></div></div><div class="advinfo"> Install aplikasi <a href="http://click.union.ucweb.com/index.php?service=RedirectService&pub=buxin@wapunduh&offer_id=com.UCMobile.intl">Uc Browser</a> untuk mendownload 9x lebih cepat.</div></div>';
$relartist = explode(' ',trim($name));
$relartist = explode(' ',trim($name));
$relartist = str_replace('-','', $relartist);
$jsonr=json_decode(ngegrab('http://api.soundcloud.com/tracks.json?q='.$relartist[0].'&limit=10&offset=0&client_id=4bc10ddc045d29dc6983d0e15dc101c7'));
if (!empty($jsonr[0]->title)){
include'inc/code.php';
echo'<div class="nganan"><div class="title2"> Related Song </div>';
foreach($jsonr as $list){
$idr=$list->id;
$permalinkr=$list->permalink;
$namer=$list->title;
echo'<div class="menu"><a href="/download/'.$idr.'/'.$permalinkr.'.html">'.$namer.'.mp3</a></div></div></div>';}
}
}else{
$title='Not Found';
include'inc/head.php';
echo'<div class="menu">Sorry, file not found.</div>';
}
include'inc/foot.php';
?>