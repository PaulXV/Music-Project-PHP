<?php
include '../functions.php';
$idBand = $_GET["idBand"];
$newBand = $_GET["nomeBand"];
$recordsBand = getRecordsBandAssociative();
$recordsBand[]=['idBand'=> "<?php $idBand", 'nomeBand'=>$newBand];
$raw=json_encode($recordsBand);
file_put_contents('../band.json',$raw);
header('Location: artist.php');