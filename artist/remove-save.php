<?php
include '../functions.php';
$idBand = $_GET["band"];
$recordsBand = getRecordsBandAssociative();
$newRecords = [];
foreach ($recordsBand as $band){
    if($band["idBand"]!= $idBand){
        $newRecords[] = $band;
    }
}
$raw=json_encode($newRecords);
file_put_contents('../band.json', $raw);
header('Location: artist.php');