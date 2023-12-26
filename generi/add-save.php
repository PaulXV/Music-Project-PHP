<?php
include '../functions.php';
$idGenere = $_GET["idGenere"];
$newGenere = $_GET["nomeGenere"];
$recordsGenere = getRecordsGeneriAssociative();
$recordsGenere[]=['idGenere'=> "<?php $idGenere", 'nomeGenere'=>$newGenere];
$raw=json_encode($recordsGenere);
file_put_contents('../genere.json',$raw);
header('Location: genere.php');