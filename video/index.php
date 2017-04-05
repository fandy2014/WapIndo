<?php
include '../inc/vfunc.php';
if($_GET['q']){
$q = $_GET['q'];
} else {
$a = array("Naruto", "Boboiboy", "On The Spot", "Video Lucu", "Film Hollywood", "Ceramah", "Keajaiban", "Film Horror", "Film Bioskop", "Ftv sctv", "Film Bollywood", "Game", "Sports", "Gokil", "Info", "News", "Allah", "Terbaru");
$b = count($a)-1;
$q = $a[rand(0,$b)];
}
$title ='Video Search Engine - WapIndo.Net';
include '../inc/video_head.php';
if(!empty($_GET['q'])){echo'<div class="r">
Search Result for: 
<strong>'.$q.'</strong></div>
<div class="file"><table class="otable"><tbody>';}
else{echo'<div class="r">
Search Result for : 
<strong>'.$q.'</strong></div>
<div class="file"><table class="otable"><tbody>';}
$qu=$q;
$qu=str_replace(" ","+", $qu);
$qu=str_replace("-","+", $qu);
$qu=str_replace("_","+", $qu); if(strlen($_GET['page']) >1){$yesPage=$_GET['page'];}
else{$yesPage='';}
$grab=ngegrab('https://www.googleapis.com/youtube/v3/search?key=AIzaSyChwZQPnJIeu99pWG_sDFlop35CQc2Yatk&part=snippet&order=relevance&maxResults=10&q='.$qu.'&pageToken='.$yesPage.'&type=video');
$json = json_decode($grab);
$nextpage=$json->nextPageToken;
$prevpage=$json->prevPageToken;
foreach ($json->items as $sam){
$link= $sam->id->videoId;
$yf=json_decode(ngegrab('https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails,statistics&id='.$link.'&maxResults=1&key=AIzaSyChwZQPnJIeu99pWG_sDFlop35CQc2Yatk'),true);
$viewCount=$yf[items][0][statistics][viewCount];
$durasi =$yf[items][0][contentDetails][duration];
$duration = $durasi;
$duration = str_replace('PT', '', $duration);
$duration = str_replace('H', ':', $duration);
$duration = str_replace('M', ':', $duration);
$duration = str_replace('S', '', $duration);
$name= $sam->snippet->title;
$desc = $sam->snippet->description;
$chtitle = $sam->snippet->channelTitle;
$chid = $sam->snippet->channelId;
$date = dateyt($sam->snippet->publishedAt);

echo '<tr><td style="width:95px"><a href="/watch?v='.$link.'"><img alt="'.$name.'" src="http://img.youtube.com/vi/'.$link.'/default.jpg" width="100%"></a></td><td><a href="/watch?v='.$link.'"> '.$name.' </a><br /><span class="label"> '.$viewCount.' x </span> <span class="labels">'.$duration.'</span> <span class="label"> '.$date.'  </span><br />'.substr($desc,0,120).'...</td></tr>';

}

echo'</tbody></table>
</div>
<div class="vagination" align="center">';
if (strlen($prevpage)>1){if (strlen($_GET['q'])>1){echo'<a href="/video/?q='.$q.'&page='.$prevpage.'" class="page_item">&laquo; Prev</a> ';}else {echo'<a href="/video/?q='.$q.'&page='.$prevpage.'" class="page_item">&laquo; Prev</a> ';}}
if (strlen($nextpage)>1){if (strlen($_GET['q'])>1){echo'<a href="/video/?q='.$q.'&page='.$nextpage.'" class="page_item">Next &raquo;</a> ';}else{
echo' <a href="/video/?q='.$q.'&page='.$nextpage.'" class="page_item">Next &raquo;</a></div>';}}
include '../inc/foot.php';
?>