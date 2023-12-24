<?php
include '../functions.php';
$idGenere = $_GET["idGenere"];
$newGenere = $_GET["nomeGenere"];
$recordsGenere = getRecordsGeneriAssociative();
putGenereNewData($idGenere, $newGenere, $recordsGenere);
header('Location: genere.php');