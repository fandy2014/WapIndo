<?php
include 'inc/func.php';
$id=$_GET['id'] ;
$grab=json_decode(ngegrab('http://api.soundcloud.com/tracks/'.$id.'.json?client_id=7747aba01a422cbe041ecb84a6e0ab10'));
$dl=''.getlinkdl($id).'';
$name=$grab->title;
header("Content-Type:audio/mpeg");
header("Content-length:".getfilesize(getlinkdl($id)));
header('Content-Disposition:attachment; filename="'.$name.' (www.wapindo.net).mp3"');
readfile("$dl") ;
header("Content -Transfer-Encoding:binary");
?>