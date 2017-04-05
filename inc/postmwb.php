<?php
 echo '<div class="r">Posting To MWB : </div><br/><div class="menu"><form id="post_form" method="post" action="http://www.mywapblog.com/id/post.php?"><input type="hidden" name="PHPSESSID" value=""/><center><input id="post_title" class="mwb-text" name="title" type="text" value="('.$size.') Download Lagu '.$name.' Mp3" size="0"/><br/></center>

<center><textarea id="post_body" class="mwb-textarea" name="body" cols="19" rows="3">Download Lagu <b><span style="text-decoration:underline;">'.$name.'.mp3</span></b> secara gratis untuk Anda. Perlu di ingat! ini semua hanya review saja, jangan lupa beli CD Originalnya, dan aktifkan juga NSP atau RBT <b><span style="text-decoration:underline;">'.$name.'.mp3</span></b> di ponsel Anda, biar Mereka tetap semangat untuk terus berkarya.
<br>
<center><a href="http://facebook.com/wapindo.net"></p><img src="'.$thumb.'" widh="200" heigth="140"></center></img></a><br/><table> <tbody> <tr> <td width="30%">Judul</td> <td>:</td> <td>'.$name.'.mp3</td></tr><tr> <td width="30%">Genre</td><td>:</td><td><a href="http://wapindo.net/music?genre='.$genre.'">'.$genre.'</a></td></tr> 
<tr> <td width="30%">Audio bit Rate</td><td>:</td> <td>112000</td>
</tr> <tr> <td width="30%">Ukuran</td> <td>:</td> <td>'.$size.' </td></tr> <tr> <td width="30%">Durasi</td> <td>:</td> <td>'.$duration.'</td></tr> <tr> <td width="30%">Audio Summary</td> <td>:</td> <td> mp3, 44100 Hz, stereo, s16p, 112 kb/s</td> </tr>
<tr><td width="30%">Source</td> <td>:</td> <td> <a href=http://www.soundcloud.com">http://www.SoundCloud.Com</a>,
<a href="http://wapindo.net">http://wapindo.net</a></td></tr>
 </tbody> </table> <br>
<center><a style="background:#3071a9;padding:5px;margin:5px;color:#fff;font-weight:bold;border:1px solid #606060;text-align:center;" title="'.$name.'" href="http://wapindo.net/download/'.$_GET['id'].'/'.$_GET['permalink'].'.html">Download Lagu ('.$size.')</a></center>

<p>Terima kasih.!! Anda telah mengunjungi halaman <span style="text-decoration:underline;"><b>Download Lagu '.$name.'.mp3 ('.$size.').</b></span><br>Kunjungi terus blog ini untuk mendapatkan update terbaru.!! </textarea>

<center>
<input class="mwb-button" type="submit" class="nav" name="preview" value="Post"/></form></div></center></div>';
?>