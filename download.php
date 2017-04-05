<?php
$id = $_GET['v'];
include 'inc/vfunc.php';
$yf=json_decode(ngegrab('https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails,statistics&id='.$id.'&maxResults=1&key=AIzaSyChwZQPnJIeu99pWG_sDFlop35CQc2Yatk'),true);
$name=$yf[items][0][snippet][title];
$tgl=$yf[items][0][snippet][publishedAt];
$date=dateyt($tgl);
$des=$yf[items][0][snippet][description];
$channel=$yf[items][0][snippet][channelTitle];
$viewCount=$yf[items][0][statistics][viewCount];
$likeCount=$yf[items][0][statistics][likeCount];
$durasi =$yf[items][0][contentDetails][duration];
$duration = $durasi;
$duration = str_replace('PT', '', $duration);
$duration = str_replace('H', ' hour ', $duration);
$duration = str_replace('M', ' min ', $duration);
$duration = str_replace('S', ' sec ', $duration);
$kata = ''.$name.''; 
$kate = preg_replace('/[^a-z0-9_\-\.]/i','-',$name);
$kate = str_replace('.', '-', $kate);
$kate = str_replace('---', '-', $kate);
$kate = str_replace('--', '-', $kate);
$value = '4';
if (str_word_count($kata) > $value)
{
//Bila kalimat lebih dari 2 kata
$limit = implode(' ', array_slice(explode(' ', $kata), 0, $value)).'';
$lmit = preg_replace('/[^a-z0-9_\-\.]/i','-',$limit);
$lmit = str_replace('---', '-', $lmit);
$lmit = str_replace('--', '-', $lmit);
$lmit = str_replace(' ', '-', $lmit);
$lmit = str_replace('.', '-', $lmit);
}
else
{
$limit = $kata;
$lmit = str_replace('  ', '-', $limit);
}
$get_video = file_get_contents('http://wapindo.net/video/video.php?videoid='.$id);
$title = 'Download Video '.$name.'  - Download 3GP - MP4 - FLV ('.$duration.') | wapindo.net'; 
include 'inc/video_head.php';
echo '<div class="ngiri"><div class="title_a"> '.$name.'</div><table class="otable" width="100%"><tbody><td width="70%"><a href="/nonton?v='.$id.'"><img width="100%" src="http://i.ytimg.com/vi/'.$id.'/hqdefault.jpg" alt="'.$name.'"/></a><br /><a href="/nonton?v='.$id.'"><div class="dbutton"> Watch Video </div></a>
</td>
<td>';
echo'<img src="/img/view.png" width="18px" /> '.$viewCount.' <br /><img src="/img/like.png" width="18px"> '.$likeCount.' <br /><img src="/img/upload.png" width="18px" /> '.$date.' <br /><img src="/img/duration.png" width="18px" /> '.$duration.'</td></tr></tbody></table><div class="menu">'.$des.'</div>';
echo '<div class="r">Download Video</div><script src="http://admaster.union.ucweb.com/js/union_html5_sdk.js"></script>
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
</a></noscript>
<table width="100%"><tbody><tr><td width="50%">'.$get_video.'</td><td width="50%">
<a href="http://click.union.ucweb.com/index.php?service=RedirectService&pub=fuquan@waptrick0&offer_id=com.9appsindo.tracking.apk"><div class="server2">Download WebM (360p)</div></a>
<a href="http://click.union.ucweb.com/index.php?service=RedirectService&pub=fuquan@waptrick0&offer_id=com.9appsindo.tracking.apk"><div class="server2">Download MP4 (360p)</div></a>
<a href="http://click.union.ucweb.com/index.php?service=RedirectService&pub=fuquan@waptrick0&offer_id=com.9appsindo.tracking.apk"><div class="server2">Download FLV (240p)</div></a>
<a href="http://click.union.ucweb.com/index.php?service=RedirectService&pub=fuquan@waptrick0&offer_id=com.9appsindo.tracking.apk"><div class="server2">Download 3GP (240p)</div></a>
</td></tr></tbody></table><div class="info"><table><tbody><tr><td>Install aplikasi <a href="http://click.union.ucweb.com/index.php?service=RedirectService&pub=fuquan@waptrick0&offer_id=com.9appsindo.tracking.apk">Uc Browser</a> Untuk mendownload 9x lebih cepat</td></tr>
</tbody></table></div></div>
';
include'inc/related.php';
include'inc/foot.php'; ?>