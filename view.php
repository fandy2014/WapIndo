<?php
include'inc/func.php';
$id=$_GET['id'];
$grab=json_decode(ngegrab('http://api.soundcloud.com/tracks/'.$id.'.json?client_id=eb53016cc88f842d6403d381e7f356f6'));
$duration=format_time($grab->duration/1000);
if($song=$grab->artwork_url) {
$thumb = $song;
}else {
$thumb = 'http://wapindo.net/img/wapindo-cover.jpg';
}
if(!empty($grab->genre)){
$genre=$grab->genre;
}else{
$genre='www.wapindo.net';
}
$name=strip_tags($grab->title);
$description=$grab->description;
$download = 'https://api.soundcloud.com/tracks/'.$id.'/stream?client_id=eb53016cc88f842d6403d381e7f356f6';
$size=format_size(getfilesize(getlinkdl($id)));
if(!empty($name) && !empty($_GET['id']) && !empty($_GET['permalink'])){
$title='Download Lagu '.$name.'.mp3 - WapIndo.Net';
include'inc/music_head.php';
echo'<div class="ngiri"><h1 class=title_a align=justify><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a href="/" rel="v:url" property="v:title">Home</a></span> » <span typeof="v:Breadcrumb"><a href="/genre/'.$genre.'.html" rel="v:url" property="v:title">'.$genre.'</a></span> » <span typeof="v:Breadcrumb"><span class="breadcrumb_last" property="v:title"><a href="/download/'.$_GET['id'].'/'.$_GET['permalink'].'.html">Download Lagu '.$name.'.mp3 ('.$size.') Gratis</a></span></span></span></h1>
<div class="file"><table class="otable"><tbody><tr><td width="110" height="110"> <img src="'.$thumb.'" width="100%" alt="artwork" style="border-radius:35%;"></td><td> '.$description.' 
Lagu <u>'.$name.'</u> ini dapat kamu download di <b>WapIndo.Net</b> secara gratis. dengan catatan: ini hanya sebagai sebuah review saja. untuk mendapatkan lagu ini secara <b>Legal</b>, belilah CD originalnya dan gunakanlah i-
Ring / RBT / NSPnya atau anda juga bisa membelinya juga di iTunes.
</td></tr>
</tbody></table><br></br>
<table class="otable" style="width:100%"><tbody><tbody><tr valign="top"><td width="30%">Name</td><td>:</td><td>'.$name.'.mp3</td></tr>
<tr valign="top"><td width="30%">Genre</td><td>:</td><td><a href="/genre/'.$genre.'.html">'.$genre.'</a></td></tr><tr valign="top"><td width="30%">Duration</td><td>:</td><td>'.$duration.'</td></tr>
<tr valign="top"><td width="30%"> Audio Summary </td> <td> : </td><td> Audio: mp3, 44100 Hz, stereo, s16p, 128 kb/s </td></tr>
<tr valign="top"><td width="30%">Bitrate</td><td>:</td><td>128 kbps</td></tr>
<tr valign="top"><td width="30%"> Source</td><td> : </td><td> soundcloud </td></tr></tbody></table></div>';
$permexp=explode('-',$grab->permalink);
echo'<div class="file">Tag: ';
foreach($permexp as $perma){
echo'<a href="/lagu/'.$perma.'.html">'.ucfirst($perma).'</a>, ';
}
echo'</div>';
echo'<div class="file"><center><script src="http://admaster.union.ucweb.com/js/union_html5_sdk.js"></script>
<script>
     try{ 
        Umobi.AdView({
            pub:"buxin@mp3mp4",
            format_type:Umobi.AdFormatType.BANNER
        });
     }catch(e){}
</script>
<noscript><?php $tm= uniqid(); ?>
<a href="http://click.union.ucweb.com/?pub=buxin@mp3mp4&tm=<?php echo $tm ?>">
    <img src="http://slot.union.ucweb.com/?pub=buxin@mp3mp4&format_type=img&tm=<?php echo $tm ?>"/>
</a></noscript>[<a href="http://click.union.ucweb.com/index.php?service=RedirectService&pub=fuquan@waptrick0&offer_id=com.9appsindo.tracking.apk">DOWNLOAD</a>]<a href="http://click.union.ucweb.com/index.php?service=RedirectService&pub=buxin@wapunduh&offer_id=com.UCMobile.intl" title="'.$name.'">
<div class="dbutton" align="center"><img src="/dwnld.png" style="vertical-align:middle;width:18px;" name="mp3"><b>Download Server I (Via Uc Browser)</b> </div></a>
<a href="'.$download.'" title="'.$name.'">
<div class="dbutton" align="center"><img src="/dwnld.png" style="vertical-align:middle;width:18px;" name="mp3"><b>Download Server II (Via Soundcloud)</b> </div></a><div class="advinfo"> Install aplikasi <a href="http://click.union.ucweb.com/index.php?service=RedirectService&pub=buxin@wapunduh&offer_id=com.UCMobile.intl">Uc Browser</a> untuk mendownload lagu <i>"'.$name.'.mp3"</i> 9x lebih cepat.</div>
</div></div>';
$relartist = explode(' ',trim($name));
$relartist = explode(' ',trim($name));
$relartist = str_replace('-','', $relartist);
$jsonr=json_decode(ngegrab('http://api.soundcloud.com/tracks.json?q='.$relartist[0].'&limit=15&offset=0&client_id=eb53016cc88f842d6403d381e7f356f6'));
if (!empty($jsonr[0]->title)){
echo'<div class="nganan"><div class="title2"> Related Song </div>';
foreach($jsonr as $list){
$idr=$list->id;
$permalinkr=$list->permalink;
$namer=$list->title;
echo'<div class="menu"><a href="/download/'.$idr.'/'.$permalinkr.'.html">'.$namer.'.mp3</a></div>';}
echo'</div></div>';
}
}else{
$title='Not Found';
include'inc/music_head.php';
echo'<div class="menu">Sorry, file not found.</div>';
}
include'inc/foot.php';
?>