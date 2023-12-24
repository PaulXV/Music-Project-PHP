<?php
include 'functions.php';

$idCanzone = $_GET["idCanzone"];
$newTitle = $_GET["title"]; //avrai il titolo della nuova canzone
$newBand = $_GET["band"]; //avrai l'id della band che già esiste perché arriva da una selection che prende i dati dal file

$numGeneri = $_GET["numGeneri"];
$generi = array();
$idGeneriDaInserire="";
for($cnt=0; $cnt<$numGeneri-1; $cnt++){
    $generi[] = $_GET["genere".$cnt]; //tutti questi generi hanno sicuramente un id perchè sono stati presi dal file
    $idGeneriDaInserire = $idGeneriDaInserire.$generi[$cnt]."-";
}
$idGeneriDaInserire=substr($idGeneriDaInserire, 0, -1);

$recordsCanzoni=getRecordsCanzoniAssociative();
$recordsCanzoni[] = ["idCanzone"=>$idCanzone, "titolo"=>$newTitle, "idBand"=>$newBand, "idGenere"=> $idGeneriDaInserire];
setRecordsCanzoni($recordsCanzoni);

header('Location: index.php');