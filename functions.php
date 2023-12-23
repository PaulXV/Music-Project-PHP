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

function getBandById($band){
    $raw=file_get_contents('band.json');
    $records=json_decode($raw);
    $nome = "";
    foreach($records as $record){
        if($band == $record->idBand) {
            $nome = $record->nomeBand;
        }
    }
    return $nome;
}

function getGenereById($genere){
    $raw=file_get_contents('genere.json');
    $records=json_decode($raw);
    $gen = "";
    foreach($records as $record){
        if($genere == $record->idGenere){
            $gen = $record->nomeGenere;
        }
    }
    return $gen;
}

function getBandByName($band){
    $raw=file_get_contents('band.json');
    $records=json_decode($raw, true);
    $id = "";
    foreach($records as $record){
        if($band == $record["nomeBand"]){
            return $record["idBand"];
        }
    }
    return $id;
}

function getGenereByName($genere){
    $raw=file_get_contents('genere.json');
    $records=json_decode($raw, true);
    $id = "";
    foreach($records as $record){
        if($genere == $record["nomeGenere"]){
            return $record["idGenere"];
        }
    }
    return $id;
}

function putBandNewData($id, $artist, $recordsBand){
    //aggiunta della nuova band al file con il nuovo id e il nuovo nome
    $recordsBand[]=['idBand'=> "<?php $id", 'nomeBand'=>$artist];
    $raw=json_encode($recordsBand);
    file_put_contents('band.json',$raw);
}

function putGenereNewData($id, $genere, $recordsGeneri){
    //aggiunta del nuovo genere al file con il nuovo id e il nuovo nome
    $recordsGeneri[]=['idGenere'=> "<?php $id", 'nomeGenere'=>$genere];
    $raw=json_encode($recordsGeneri);
    file_put_contents('genere.json',$raw);
}
