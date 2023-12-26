<?php
include '../functions.php';
$idGenere = $_GET["idGenere"];
$nomeGenere = $_GET["nomeGenere"];
$recordsGenere = getRecordsGeneri();
foreach ($recordsGenere as $genere){
    if($genere->idBand == $idGenere){
        $genere->nomeBand = $nomeGenere;
    }
}
$raw=json_encode($recordsGenere);
file_put_contents('../genere.json', $raw);
header('Location: genere.php');