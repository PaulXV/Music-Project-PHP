<?php
include '../functions.php';
$idBand = $_GET["idBand"];
$newBand = $_GET["nomeBand"];
$recordsBand = getRecordsBandAssociative();
putBandNewData($idBand, $newBand, $recordsBand);
header('Location: artist.php');