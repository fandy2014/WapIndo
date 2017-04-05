<?php
echo '<div class="nganan"><div class="title2">Video Terkait</div><table class="otable"><tbody>';
$grab=ngegrab('https://www.googleapis.com/youtube/v3/search?key=AIzaSyDbI87PjTbqjt6vB6CdtUJ20p0JgN3xPDo&part=snippet&maxResults=8&relatedToVideoId='.$_GET['v'].'&type=video');
$json = json_decode($grab);
foreach($json->items as $hasil) {$name = $hasil->snippet->title;
$link = $hasil->id->videoId;
$yf=json_decode(ngegrab('https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails,statistics&id='.$link.'&maxResults=1&key=AIzaSyDbI87PjTbqjt6vB6CdtUJ20p0JgN3xPDo'),true);
$durasi =$yf[items][0][contentDetails][duration];
$duration = $durasi;
$duration = str_replace('PT', '', $duration);
$duration = str_replace('H', ' Hour ', $duration);
$duration = str_replace('M', ' min ', $duration);
$duration = str_replace('S', ' sec ', $duration);
$tgl = $hasil->snippet->publishedAt;
$date = dateyt($tgl);
$des = $hasil->snippet->description;
$chid = $hasil->snippet->channelId;
echo '<tr><td><a href="/video?v='.$link.'"><img src="http://img.youtube.com/vi/'.$link.'/default.jpg" width="120"></a></td>
<td>
<a href="/watch?v='.$link.'"> '.$name.' </a><br>('.$duration.') '.$date.'</td></tr>';}
echo '</tbody></table></div></div></div>';?>