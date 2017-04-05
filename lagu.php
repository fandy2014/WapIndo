<?php
include'inc/func.php';
if(!empty($_GET['genre'])){
$title='Kumpulan MP3 '.queryencode($_GET['genre']).' - WapIndo.Net';
}elseif(!empty($_GET['q'])){
$title='Download Lagu '.queryencode($_GET['q']).' Gratis Terbaru - WapIndo.Net';
}else{
$title='WapIndo.Net - Gudang Download Mp3 Terbaru Gratis';
}
include'inc/music_head.php';
if(!empty($_GET['genre'])){
$genrer=str_replace(' ',',',strtolower($_GET['genre']));
$genrer=str_replace('_',',',$genrer);
$genrer=str_replace('-',',',$genrer);
}else{
$q=queryencode($_GET['q']);
$artist = array('a7x','Dangdut Terbaru','dangdut koplo','Rita sugiarto Pallapa','koplo','monata','live monata','caca handika Pallapa','Reggae','Koplo Terbaru','armada','Mansur S Pallapa','wali band','galau band','goyang morena','ungu','band indie','Terhalang Dinding kaca','Koplo Monata','setia band','ada band','geisha','Reggae','Dmasiv','D Bagindas','souqy','lesty kejora','evi tamala Pallapa','nike ardila','Seventeen','Endank Soekamti','gigi','bondan','jupe','pallapa','adista band','dadali band','lagu madura','last child','Slank','Iwan Fals');
$no = rand(0,count($artist));
$keyword = $artist[$no];

$q = $q ? $q : $keyword;
}
if(!empty($_GET['page'])){
$noPage=$_GET['page'];
$page=($noPage-1)*20;
}else{
$noPage='1';
$page='0';
}
if(!empty($_GET['genre'])){
$json=json_decode(ngegrab('http://api.soundcloud.com/tracks.json?genres='.$genrer.'&limit=10&offset='.$page.'&offset=0&client_id=eb53016cc88f842d6403d381e7f356f6'));
}else{
$json=json_decode(ngegrab('http://api.soundcloud.com/tracks.json?q='.str_replace(' ','-',$q).'&limit=10&offset='.$page.'&client_id=eb53016cc88f842d6403d381e7f356f6'));
}
echo'<h1 class="biru"><b> Free Download '.$q.' MP3 </b></h1><div class="menu"> <table width="100%" class="otable"><tbody>';

if (!empty($json[0]->title)){
foreach($json as $list){
$id=$list->id;
$permalink=$list->permalink;
if(!empty($list->genre)){
$genre=$list->genre;
}else{
$genre='Unknown';
}
$name=strip_tags($list->title);
$size=format_size(getfilesize(getlinkdl($id)));
$duration=format_time($list->duration/1000);
if($song=$list->artwork_url) {
$thumb = $song;
}
else {
$thumb = '/img/thumb.png';
}
echo'<tr><td valign="middle" width="78px"><img src="'.$thumb.'" title="Download Mp3 '.$name.'" width="78px" height="78px" class="thumcircle">
</td><td> <a href="http://www.wapindo.net/v/'.$id.'/'.$permalink.'.html"> '.$name.'.mp3</a><br />
<span class="label">'.$duration.'</span> <span class="label">'.$genre.'</span><br /> <span class="labels"><a href="http://click.union.ucweb.com/index.php?service=RedirectService&pub=fuquan@waptrick0&offer_id=com.9appsindo.tracking.apk">DOWNLOAD</a></span></td>
</tr>';}
echo '</tbody></table></div><div class="vagination" align="center">';
if(!empty($_GET['genre'])){
if ($noPage > 1) {echo'<a href="/genre/'.strtolower($_GET['genre']).'/page/'.($noPage-1).'.html">&laquo; Previous</a> - ';}
if (!empty($json[9])) {echo'<span><a href="/genre/'.strtolower($_GET['genre']).'/page/'.($noPage+1).'.html">Next &raquo;</a></span> ';}
}else{
if ($noPage > 1) {echo'<span><a href="/mp3/'.querydecode($q).'/page-'.($noPage-1).'.html">&laquo; Previous</a></span> - ';}
if (!empty($json[9])) {echo'<span><a href="/mp3/'.querydecode($q).'/page-'.($noPage+1).'.html">Next Page &raquo;</a></span></div>';}
}
include'last.php';
}else{echo'<div class="post-meta"><font color="red">Maaf File Lagu yg Anda Cari Tidak Ditemukan
</font></div>';}
include'inc/foot.php';
?>