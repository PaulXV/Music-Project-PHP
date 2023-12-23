<?php
include 'functions.php';

$idCanzone = $_GET["idCanzone"];
$newTitle = $_GET["title"];
$newBand = $_GET["band"];
$newGenere = $_GET["genere"];
$randomIdBand = "";
$randomIdGenere="";

$rawCanzoni=file_get_contents('canzoni.json');
$recordsCanzoni=json_decode($rawCanzoni);

$rawBand=file_get_contents('band.json');
$recordsBand=json_decode($rawBand, true);

$rawGenere=file_get_contents('genere.json');
$recordsGeneri=json_decode($rawGenere,true);

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
                    if($idB == ""){
                        do{                                     //creazione di un nuovo id  tramite numero random
                            $randomIdBand = rand();
                        }while(existBand($randomIdBand)==true); // mi controlla che l'id non esista gia'

                        //sta cazzo di assegnazione non funziona e non so perché
                        $canzone->idBand = $idB; //modifico il nuovo id al file delle canzoni
                        putBandNewData($randomIdBand, $newBand, $recordsBand);
                    }else{
                        //sta cazzo di assegnazione non funziona e non so perché
                        $canzone->idBand = $idB; //modifico il nuovo id al file delle canzoni
                        putBandNewData($idB, $newBand, $recordsBand);
                    }
                    break;
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
        foreach($recordsGeneri as $genere){
            //se il nome è diverso ma l'id è lo stesso allora modifico
            if($genere["idGenere"]==$canzone->idGenere){
                if($genere["nomeGenere"] != $newGenere){
                    $idGen = getGenereByName($newGenere);
                    if($idGen == ""){
                        do{                                     //creazione di un nuovo id  tramite numero random
                            $randomIdGenere = rand();
                        }while(existGenere($randomIdGenere)==true); // mi controlla che l'id non esista gia'

                        //sta cazzo di assegnazione non funziona e non so perché
                        $canzone->idGenere = $idGen; //modifico il nuovo id al file delle canzoni
                        putGenereNewData($randomIdGenere, $newGenere, $recordsGeneri);
                    }else{
                        //sta cazzo di assegnazione non funziona e non so perché
                        $canzone->idGenere = $idGen; //modifico il nuovo id al file delle canzoni
                        putGenereNewData($idGen, $newGenere,$recordsGeneri);
                    }
                    $rawCanzoni=json_encode($recordsCanzoni);
                    file_put_contents('canzoni.json', $rawCanzoni);
                    break;
                }
            }
        }
        $rawCanzoni=json_encode($recordsCanzoni);
        file_put_contents('canzoni.json', $rawCanzoni);
    }
}

header('Location: index.php');