<?php

function friendly_size($size,$round=2){
$sizes=array(' Byts',' Kb',' Mb',' Gb',' Tb');
$total=count($sizes)-1;
for($i=0;$size>1024 && $i<$total;$i++){
$size/=1024;
}
return round($size,$round).$sizes[$i];
}

$default_mp3_directory =  "./musik/";
$default_filename_prefix = ".mp3";
$default_songname_prefix = "[www.wapindo.net]";
$default_comment = "http://wapindo.net";
$default_artist = "www.wapindo.net";
$default_album = "www.wapindo.net";
$default_year = date("Y");
$default_genre = "www.wapindo.net";

if(isset($_POST['submit'])){
$mp3_filepath = $_POST['mp3_filepath'];
$mp3_filename = $_POST['mp3_filename'];
$mp3_songname = $_POST['mp3_songname'];
$mp3_comment = $_POST['mp3_comment'];
$mp3_artist = $_POST['mp3_artist'];
$mp3_album = $_POST['mp3_album'];
$mp3_year = $_POST['mp3_year'];
$mp3_genre = $_POST['mp3_genre'];
if(filter_var($mp3_filepath,FILTER_VALIDATE_URL)){
if($mp3_filename!=""){
$mp3_filename = str_replace(DIRECTORY_SEPARATOR,"-X-",$mp3_filename);
echo"<title>Download $mp3_songname</title>
<link rel='stylesheet' href='css/fandy.css' type='text/css'/><link rel='shortcut icon' href='/favicon.ico'/></head>
<body>
<div id='pink'><div class='title'><h1><font size='3'><a href='/'><font color='black'>wapindo.net</font></a></h1><span>Mobile Download Lagu Mp3 Gratis TerUpdate.</span></div></div>";
$sname = $default_mp3_directory.$mp3_filename;
if(copy($mp3_filepath,$sname)){
$size = friendly_size(filesize($sname));
echo"<div class='menu'><center><b>".basename($sname)."</b>
<br/>Ukuran : </b>$size</b></br><center><a href='$sname'><input type='button' class='pink' value='Download' title='Download ".basename($sname)."'/></a> - <a href='http://click.union.ucweb.com/index.php?service=RedirectService&pub=buxin@wapunduh&offer_id=com.UCMobile.intl'><input type='button' class='pink' value='UC Browser' title=Fast Download ".basename($sname)."'/></a><br/>PEMBERITAHUAN : Jika anda kesulitan mendownload saya sarankan anda menggunakan browser seperti <a href='http://click.union.ucweb.com/index.php?service=RedirectService&pub=buxin@wapunduh&offer_id=com.UCMobile.intl'>UCbrowser</a> atau Opera Mini. Jika menggunakan browser bawa'an handphone anda seperti Chrome maka otomatis lagu akan Play sendiri,, silahkan download aplikasi ucbrowser <a href='http://click.union.ucweb.com/index.php?service=RedirectService&pub=buxin@wapunduh&offer_id=com.UCMobile.intl'>Disini</a><br/><br/>&copy; <a href='/index.html'> 2015 wapindo.net</center>";

$mp3_tagformat = 'UTF-8';

require_once('getid3/getid3.php');
$mp3_handler = new getID3;
$mp3_handler->setOption(array('encoding'=>$mp3_tagformat));
require_once('getid3/write.php');
$mp3_writter = new getid3_writetags;
$mp3_writter->filename       = $sname;
$mp3_writter->tagformats     = array('id3v1', 'id3v2.3');
$mp3_writter->overwrite_tags = true;
$mp3_writter->tag_encoding   = $mp3_tagformat;
$mp3_writter->remove_other_tags = true;


$mp3_data['title'][]   = $mp3_songname;
$mp3_data['artist'][]  = $mp3_artist;
$mp3_data['album'][]   = $mp3_album;
$mp3_data['year'][]    = $mp3_year;
$mp3_data['genre'][]   = $mp3_genre;
$mp3_data['comment'][] = $mp3_comment;



                       // Modified By Asad Contact mixbd.com@gmail.com    
        if (empty($picture)) {
          $picture = 'img/wapindo-cover.jpg';
          $picturecaption = 'No picture available';
        }
       
        // Get the filename and path
        $albumcover = $picture;
       
        // Open the picture file and read set up the ID3 structures
        if ($fd = @fopen($albumcover, 'rb')) {
          $APICdata = fread($fd, filesize($albumcover));
          fclose ($fd);
          list($APIC_width, $APIC_height, $APIC_imageTypeID) = GetImageSize($albumcover);
          $mp3_data['attached_picture'][0]['data']            = $APICdata;
          $mp3_data['attached_picture'][0]['picturetypeid']   = 0x03;                 // 'Cover (front)'   
          $mp3_data['attached_picture'][0]['description']     = $picturecaption;
          $mp3_data['attached_picture'][0]['mime']            = 'image/jpeg';
        }
        else {
          echo "Cannot open $albumcover <br />";
        }
               





$mp3_writter->tag_data = $mp3_data;

if($mp3_writter->WriteTags()) {
echo"<br />";
}
else{
echo"<br />Failed to write tags!<br>".implode("<br /><br />",$mp3_writter->errors);
}
}
else{echo"<br />Saat ini file download sedang dalam perbaikan.. Silahkan kembali kehalaman download sebelumnya dan gunakan link download server I II atau III agar kalian bisa mendownload file mp3nya.";}
}
else{echo"<br />Empty filename.";}
}
else{echo"<br />Invalid FilePath.";}
}
else{
?>
<?php
}
?>