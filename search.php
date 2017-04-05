<?php
if(!empty($_GET['q'])){
if($_GET['type']=='music'){
$b = str_replace(" ","-",$_GET['q']);
$b = strtolower($b);
$url='/music?q='.$b.'';
}elseif($_GET['type']=='video'){
$mx = str_replace(" ","-",$_GET['q']);
$mx = strtolower($mx);
$url='/search/'.$mx.'';
}elseif($_GET['type']=='image'){
$url='/image/?q='.$_GET['q'].'';
}else{
$url='/'; }}
header('location:'.$url.''); ?>