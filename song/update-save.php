<?php
include '../functions.php';
$rawCanzoni=file_get_contents('../canzoni.json');
$recordsCanzoni=getRecordsCanzoni();

$rawBand=file_get_contents('../band.json');
$recordsBand=getRecordsBandAssociative();

$rawGenere=file_get_contents('../genere.json');
$recordsGeneri=getRecordsGeneriAssociative();

$idCanzone = $_GET["idCanzone"];
$newTitle = $_GET["title"];
$newBand = $_GET["band"]; //ti ritorna il nome della band
$generi = array();
for($cnt=0; $cnt<count($recordsGeneri); $cnt++) {
    foreach ($recordsGeneri as $genere) {
        if (getGenereByName($_GET["genere".$cnt]) == $genere["idGenere"]) {
            $generi[] = $genere["nomeGenere"];
        }
    }
}

foreach($recordsCanzoni as $canzone){
    if ($canzone->idCanzone==$idCanzone){
        $canzone->titolo = $newTitle;

        //controllo se è cambiato il nome della band
        $idB = "";
        foreach($recordsBand as $band){
            //se il nome è diverso ma l'id è lo stesso allora modifico
            if($band["idBand"] == $canzone->idBand){
                if($band["nomeBand"] != $newBand){
                    $idB = getBandByName($newBand);
                    $canzone->idBand = $idB; //modifico il nuovo id al file delle canzoni
                    $rawCanzoni=json_encode($recordsCanzoni);
                    file_put_contents('../canzoni.json', $rawCanzoni);
                    break;
                }
            }
        }

        //controllo se è cambiato il genere
        $idGen = "";
        foreach($recordsGeneri as $genere){
            //mi controlla se la canzone non ha il genere che è stato messo (o almeno uno su più selezioni)
            if(!checkIfHasGenere(getAllGeneri($canzone->idGenere), $genere["idGenere"])){
                foreach($generi as $el) {
                    if($genere["nomeGenere"] != $el){
                        $idGen = $idGen.getGenereByName($el)."-";
                    }else{
                        $idGen = $idGen.getGenereByName($genere["nomeGenere"])."-";
                    }
                }
                $idGen = substr($idGen,0,-1);
                $canzone->idGenere = $idGen; //modifico il nuovo id al file delle canzoni
                $rawCanzoni=json_encode($recordsCanzoni);
                file_put_contents('../canzoni.json', $rawCanzoni);
                break;
            }
        }
    }
}
$rawCanzoni=json_encode($recordsCanzoni);
file_put_contents('../canzoni.json', $rawCanzoni);
header('Location: ../index.php');