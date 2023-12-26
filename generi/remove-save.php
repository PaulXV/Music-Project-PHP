<?php
include '../functions.php';
$idGenere = $_GET["idGenere"];
$recordsGenere = getRecordsGeneriAssociative();
$newRecords = [];
foreach ($recordsGenere as $genere){
    if($genere["idGenere"] != $idGenere){
        $newRecords[] = $genere;
    }
}
$raw=json_encode($newRecords);
file_put_contents('../genere.json', $raw);
header('Location: genere.php');