<?php
$idVideo=$_GET['videoId'];
$titolo=$_GET['title'];

$raw=file_get_contents('video.json');
$records=json_decode($raw,true);

// niente $riga->title
// true $riga['title']

$records[]=['id'=> $idVideo, 'title'=>$titolo];

$raw=json_encode($records);
file_put_contents('video.json',$raw);

header('Location: index.php');