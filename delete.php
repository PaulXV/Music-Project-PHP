<?php
$videoId=$_GET['videoId'];
$raw=file_get_contents('video.json');
$records=json_decode($raw,true);
$listaNuova=[];
foreach($records as $record){
	if ($record['id']!=$videoId){
		$listaNuova[]=$record;
	}
}
$raw=json_encode($listaNuova);
file_put_contents('video.json', $raw);
header('Location: index.php');