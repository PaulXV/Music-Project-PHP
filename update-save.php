<?php
include 'functions.php';

$idCanzone = $_GET["idCanzone"];
$newTitle = $_GET["title"];
$newBand = $_GET["band"];

$numGeneri = $_GET["numGeneri"];
$generi = array();
for($cnt=0; $cnt<$numGeneri-1; $cnt++){
    $generi[] = $_GET["genere".$cnt]; //tutti questi generi hanno sicuramente un id perchè sono stati presi dal file
}
/*
 * da implementare questa parte quando vado a modificare il file delle canzoni
$idGeneriDaInserire="";
$idGeneriDaInserire=$idGeneriDaInserire.$generi[$cnt]."-";
$idGeneriDaInserire=substr($idGeneriDaInserire, 0, -1);
*/

$randomIdBand="";
$randomIdGenere="";

$rawCanzoni=file_get_contents('canzoni.json');
$recordsCanzoni=getRecordsCanzoni();

$rawBand=file_get_contents('band.json');
$recordsBand=getRecordsBandAssociative();

$rawGenere=file_get_contents('genere.json');
$recordsGeneri=getRecordsGeneriAssociative();

foreach($recordsCanzoni as $canzone){
    if ($canzone->idCanzone==$idCanzone){
        $canzone->titolo = $newTitle;

        /*
         * controllo se è cambiato il nome della band
         * se il nome è cambiato controllo che non ci sia già
         * se c'è già prendo l'id
         * se non c'è do alla nuova band un nuovo id
        */
        foreach($recordsBand as $band){
            //se il nome è diverso ma l'id è lo stesso allora modifico
            if($band["idBand"] == $canzone->idBand){
                if($band["nomeBand"] != $newBand){
                    $idB = getBandByName($newBand);
                    $canzone->idBand = $idB; //modifico il nuovo id al file delle canzoni
                    break;
                    /* mi fa comodo per la creazione, lascio qui per il momento
                    if($idB == ""){
                        do{                                     //creazione di un nuovo id tramite numero random
                            $randomIdBand = rand();
                        }while(existBand($randomIdBand)==true); // mi controlla che l'id non esista gia'

                        $canzone->idBand = $idB; //modifico il nuovo id al file delle canzoni
                        putBandNewData($randomIdBand, $newBand, $recordsBand);
                    }else{
                        $canzone->idBand = $idB; //modifico il nuovo id al file delle canzoni
                        putBandNewData($idB, $newBand, $recordsBand);
                    }*/
                }
            }
        }
        $rawCanzoni=json_encode($recordsCanzoni);
        file_put_contents('canzoni.json', $rawCanzoni);

        /*
         * controllo se è cambiato il genere
         * se il genere è cambiato controllo che non ci sia già
         * se c'è già prendo l'id
         * se non c'è do al nuovo genere un nuovo id
        */
        $idGen = "";
        foreach($recordsGeneri as $genere){
            //mi controlla se la canzone non ha il genere che è stato messo (o almeno uno su più selezioni)
            if(!checkIfHasGenere(getAllGeneri($canzone->idGenere), $genere["idGenere"])){
                foreach($generi as $el) {
                    if($genere["nomeGenere"] != $el){
                        $idGen = $idGen.getGenereByName($el)."-";
                        /* questa parte mi torna utile per la creazione di un genere, per ora la lascio qui ma la sposto più avanti
                        if($idGen == ""){
                            do{                                         //creazione di un nuovo id tramite numero random
                                $randomIdGenere = rand();
                            }while(existGenere($randomIdGenere)==true); // mi controlla che l'id non esista gia'

                            $canzone->idGenere = $idGen; //modifico il nuovo id al file delle canzoni
                            putGenereNewData($randomIdGenere, $rec2, $recordsGeneri);
                        }else{
                            $canzone->idGenere = $idGen; //modifico il nuovo id al file delle canzoni
                            putGenereNewData($idGen, $newGenere,$recordsGeneri);
                        }
                        */
                    }else{
                        $idGen = $idGen.getGenereByName($genere["nomeGenere"])."-";
                    }
                }
                $idGen = substr($idGen,0,-1);
                $canzone->idGenere = $idGen; //modifico il nuovo id al file delle canzoni
                break;
            }
        }
        $rawCanzoni=json_encode($recordsCanzoni);
        file_put_contents('canzoni.json', $rawCanzoni);
    }
}

header('Location: index.php');