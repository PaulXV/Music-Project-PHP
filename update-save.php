<?php

    $videoId = $_GET["videoId"];
    $newTitle = $_GET["title"];
    $raw=file_get_contents('video.json');
    $records=json_decode($raw,true);

    foreach($records as $record){
        if ($record['id']!=$videoId){
            $record['title'] = $newTitle;
        }
    }

    $raw=json_encode($records);
    file_put_contents('video.json', $raw);

    header('Location: index.php');

?>