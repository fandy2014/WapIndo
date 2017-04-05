<?
$div = "|#|";
$dat='last.txt';
$fp = fopen($dat, 'r');
$count = fgets($fp);
fclose($fp);
$cari = 'q='.$q;
$cari = str_replace('+', ' ',$cari);
$data = explode($div, $count);
if (in_array($cari, $data)) {
$tulis = implode($div, $data);
}
else {
$data = explode($div, $count);
$tulis = $data[1].''.$div.''.$data[2].''.$div.''.$data[3].''.$div.''.$data[4].''.$div.''.$data[5].''.$div.''.$data[6].''.$div.''.$data[7].''.$div.''.$data[8].''.$div.''.$data[9].''.$div.''.$data[10].''.$div.''.$data[11].''.$div.''.$data[12].''.$div.''.$data[13].''.$div.''.$data[14].''.$div.''.$data[15].''.$div.''.$data[16].''.$div.''.$data[17].''.$div.''.$data[18].''.$div.''.$data[19].''.$div.''.$data[20].''.$div.''.$data[21].''.$div.''.$data[22].''.$div.''.$data[23].''.$div.''.$data[24].''.$div.''.$data[25].''.$div.''.$data[26].''.$div.''.$data[27].''.$div.''.$data[28].''.$div.''.$data[29].''.$div.''.$data[30].''.$div.''.$data[31].''.$div.''.$data[32].''.$div.''.$data[33].''.$div.''.$data[34].''.$div.''.$data[35].''.$div.''.$data[36].''.$div.''.$data[37].''.$div.''.$data[38].''.$div.''.$data[39].''.$div.''.$data[40].''.$div;
$tulis .= $cari;
}
if (!empty($q)){
$masuk=fopen($dat, 'w');
fwrite($masuk,$tulis);
fclose($masuk);
}
$div = '|#|';
$search = 'last.txt';
$fa = fopen($search, 'r');
$b = fgets($fa);
fclose($fa);
echo '<div class="r">Last Search MP3</div><div class="menu">';
$c = explode($div, $b);
foreach(array_reverse($c) as $d){
$lastsearch = explode('q=',$d);
$linklast1 = trim($lastsearch[1]);
$linklast = str_replace(' ', '-', $linklast1);
echo '<a href="/lagu/'.$linklast.'.html">'.substr($lastsearch[1],0,20).'</a>, ';
}
echo '</div>';
?>