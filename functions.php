<?php

function setRecordsCanzoni($recordsCanzoni){
    $rawCanzoni=json_encode($recordsCanzoni);
    file_put_contents('canzoni.json', $rawCanzoni);
}

function getRecordsCanzoniAssociative(){
    $raw=file_get_contents('../canzoni.json');
    return json_decode($raw, true);
}

function getRecordsCanzoni(){
    $raw=file_get_contents('canzoni.json');
    return json_decode($raw);
}

function getRecordsBandAssociative(){
    $raw=file_get_contents('../band.json');
    return json_decode($raw, true);
}

function getRecordsBand(){
    $raw=file_get_contents('band.json');
    return json_decode($raw);
}

function getRecordsGeneriAssociative(){
    $raw=file_get_contents('../genere.json');
    return json_decode($raw, true);
}

function getRecordsGeneri(){
    $raw=file_get_contents('genere.json');
    return json_decode($raw);
}
function existSong($song){
    $records=getRecordsCanzoni();
    foreach($records as $record){
        if($song == $record->idCanzone) {
            return true;
        }
    }
    return false;
}
function existBand($band){
    $records=getRecordsBand();
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
    $genere = explode("-", $genere);
    $gen = "";
    foreach($records as $record){
        foreach ($genere as $rec2){
            if($rec2 == $record->idGenere){
                $gen = $gen.($record->nomeGenere).", ";
            }
        }

    }
    return substr($gen, 0, -2);
}

function getBandByName($band){
    $raw=file_get_contents('../band.json');
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
    $raw=file_get_contents('../genere.json');
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

function getAllGeneri($canzone){
    $allGen = explode("-", $canzone);
    $arrayGeneri = array();
    foreach ($allGen as $idSingolo){
        $arrayGeneri[] = $idSingolo;
    }
    return $arrayGeneri;
}

function checkIfHasGenere($arrayGeneri, $genere){
    $numGeneri = count($arrayGeneri);
    $hasGen = 0;
    foreach ($arrayGeneri as $gen){
        if($gen == $genere)
            $hasGen ++;
    }
    return ($numGeneri==$hasGen);
}