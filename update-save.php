<?php

    $idCanzone = $_GET["idCanzone"];
    $newTitle = $_GET["title"];
    $newBand = $_GET["band"];
    $newGenere = $_GET["genere"];
    $randomIdBand = "";
    $randomIdGenere="";

    $rawCanzoni=file_get_contents('canzoni.json');
    $recordsCanzoni=json_decode($rawCanzoni,true);

    $rawBand=file_get_contents('band.json');
    $recordsBand=json_decode($rawBand, true);

    $rawGenere=file_get_contents('genere.json');
    $recordsGeneri=json_decode($rawGenere,true);

    foreach($recordsCanzoni as $canzone){
        if ($canzone['idCanzone']==$idCanzone){
            $canzone['titolo'] = $newTitle;

            /*
              controllo se è cambiato il nome della band
              se il nome è cambiato controllo che non ci sia già
              se c'è già prendo l'id
              se non c'è do alla nuova band un nuovo id
            */
            foreach($recordsBand as $band){
                //se il nome è diverso ma l'id è lo stesso allora modifico
                if($band["idBand"] == $canzone["idBand"]){
                    if($band["nomeBand"] != $newBand){
                        $idB = getBand($newBand, $recordsBand);
                        if($idB == ""){
                            do{                                     //creazione di un nuovo id  tramite numero random
                                $randomIdBand = rand();
                            }while(existBand($randomIdBand)==true); // mi controlla che l'id non esista gia'
                            $canzone["idBand"] = $idB; //modifico il nuovo id al file delle canzoni
                            putBandNewData($randomIdBand, $newBand);
                        }else{
                            $canzone["idBand"] = $idB; //modifico il nuovo id al file delle canzoni
                            putBandNewData($idB, $newBand);
                        }
                        break;
                    }
                }
            }

            /*
              controllo se è cambiato il genere
              se il genere è cambiato controllo che non ci sia già
              se c'è già prendo l'id
              se non c'è do al nuovo genere un nuovo id
            */
            foreach($recordsGeneri as $genere){
                //se il nome è diverso ma l'id è lo stesso allora modifico
                if($genere["idGenere"]==$canzone["idGenere"]){
                    if($genere["nomeGenere"] != $newGenere){
                        $idGen = getGenere($newGenere, $recordsGeneri);
                        if($idGen == ""){
                            do{                                     //creazione di un nuovo id  tramite numero random
                                $randomIdGenere = rand();
                            }while(existGenere($randomIdGenere)==true); // mi controlla che l'id non esista gia'
                            $canzone["idGenere"] = $idGen; //modifico il nuovo id al file delle canzoni
                            putGenereNewData($randomIdGenere, $newGenere);
                        }else{
                            $canzone["idGenere"] = $idGen; //modifico il nuovo id al file delle canzoni
                            putGenereNewData($idGen, $newGenere);
                        }
                        break;
                    }
                }
            }
        }
    }

    $rawCanzoni=json_encode($recordsCanzoni);
    file_put_contents('canzoni.json', $rawCanzoni);

    header('Location: index.php');
?>

<!-- funzioni -->
<?php
function existBand($band){
    $raw=file_get_contents('band.json');
    $records=json_decode($raw);
    foreach($records as $record){
        if($band == $record->idBand) {
            return true;
        }
    }
    return false;
}

function existGenere($genere){
    $raw=file_get_contents('genere.json');
    $records=json_decode($raw);
    foreach($records as $record){
        if($genere == $record->idGenere){
            return true;
        }
    }
    return false;
}

function getBand($band, $recordsBand){
    $id = "";
    foreach($recordsBand as $record){
        if($band == $record["nomeBand"]){
            $id = $record["idBand"];
        }
    }
    return $id;
}

function getGenere($genere, $recordsGenere){
    $id = "";
    foreach($recordsGenere as $record){
        if($genere == $record["nomeGenere"]){
            $id = $record["idGenere"];
        }
    }
    return $id;
}

function putBandNewData($id, $artist){
    //aggiunta della nuova band al file con il nuovo id e il nuovo nome
    $file = fopen('band.json', 'r');
    $contents = fread($file, filesize('band.json'));
    $addTo = substr($contents, 0, -1).',{"idBand":"'.$id.'", "nomeBand":"'.$artist.'"}]';
    fclose($file);

    $file = fopen('band.json', 'w');
    fwrite($file, $addTo);
    fclose($file);
}

function putGenereNewData($id, $genere){
    //aggiunta del nuovo genere al file con il nuovo id e il nuovo nome
    $file = fopen('genere.json', 'r');
    $content = fread($file, filesize('genere.json'));
    $addTo = substr($content, 0, -1).',{"idGenere":"'.$id.'", "nomeGenere":"'.$genere.'"}]';
    fclose($file);

    $file = fopen('genere.json', 'w');
    fwrite($file, $addTo);
    fclose($file);
}

?>