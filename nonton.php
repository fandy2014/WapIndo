<?php
$id = $_GET['v'];
include 'inc/vfunc.php';
$yf=json_decode(ngegrab('https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails,statistics&id='.$id.'&maxResults=1&key=AIzaSyAMKU_nfSfEn9SGxPW4xBt8CoLN9rkLy5s'),true);
$name=$yf[items][0][snippet][title];
$tgl=$yf[items][0][snippet][publishedAt];
$date=dateyt($tgl);
$des=$yf[items][0][snippet][description];
$channel=$yf[items][0][snippet][channelTitle];
$viewCount=$yf[items][0][statistics][viewCount];
$likeCount=$yf[items][0][statistics][likeCount];
$dislikeCount=$yf[items][0][statistics][dislikeCount];
$durasi =$yf[items][0][contentDetails][duration];
$duration = $durasi;
$duration = str_replace('PT', '', $duration);
$duration = str_replace('H', ':', $duration);
$duration = str_replace('M', ':', $duration);
$duration = str_replace('S', '', $duration);
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
$title = 'Streaming Video '.$name.'  - 3GP - MP4 - FLV ('.$duration.') | WapIndo.Net';
include 'inc/video_head.php';
echo '<div class="file"><center><iframe title="YouTube video player" class="youtube-player" type="text/html" width="640" height="390" src="http://www.youtube.com/embed/'.$id.'" frameborder="0" allowfullscreen></iframe>
</center></div></div>';
include'inc/foot.php'; ?>