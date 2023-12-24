<?php
include '../functions.php';
$idGenere = $_GET["genere"];
$recordsGenere = getRecordsGeneriAssociative();
$newRecords = [];
foreach ($recordsGenere as $genere){
    if($genere["idBand"]!= $idGenere){
        $newRecords[] = $genere;
    }
}
$raw=json_encode($newRecords);
file_put_contents('../genere.json', $raw);
header('Location: genere.php');