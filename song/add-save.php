<?php
include '../functions.php';

$idCanzone = $_GET["idCanzone"];
$newTitle = $_GET["title"]; //avrai il titolo della nuova canzone
$newBand = $_GET["band"]; //avrai l'id della band che già esiste perché arriva da una selection che prende i dati dal file

$idGeneriDaInserire="";
$recordsGeneri=getRecordsGeneriAssociative();
for($cnt=0; $cnt<count($recordsGeneri); $cnt++) {
    foreach ($recordsGeneri as $genere) {
        $nomeGenere = $_GET["genere".$cnt];
        if ($nomeGenere == $genere["nomeGenere"]) {
            $idGeneriDaInserire = $idGeneriDaInserire.getGenereByName($genere["nomeGenere"])."-";
            break;
        }
    }
}
$idGeneriDaInserire=substr($idGeneriDaInserire, 0, -1);

$recordsCanzoni=getRecordsCanzoniAssociative();
$recordsCanzoni[] = ["idCanzone"=>$idCanzone, "titolo"=>$newTitle, "idBand"=>$newBand, "idGenere"=> $idGeneriDaInserire];
$rawCanzoni=json_encode($recordsCanzoni);
file_put_contents('../canzoni.json', $rawCanzoni);

header('Location: ../index.php');