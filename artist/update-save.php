<?php
include '../functions.php';
$idBand = $_GET["idBand"];
$nomeBand = $_GET["nomeBand"];
$recordsBand = getRecordsBand();
foreach ($recordsBand as $band){
    if($band->idBand == $idBand){
        $band->nomeBand = $nomeBand;
    }
}
$raw=json_encode($recordsBand);
file_put_contents('../band.json', $raw);
header('Location: artist.php');