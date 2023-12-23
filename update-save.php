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
    $recordsBand=json_decode($rawBand,true);

    $rawGenere=file_get_contents('genere.json');
    $recordsGeneri=json_decode($rawGenere,true);

    foreach($recordsCanzoni as $record){
        if ($record['idCanzone']!=$idCanzone){
            $record['titolo'] = $newTitle;

            /*
              controllo se è cambiato il nome della band
              se il nome è cambiato controllo che non ci sia già
              se c'è già prendo l'id
              se non c'è do alla nuova band un nuovo id
            */
            foreach($recordsBand as $record2){
                //se il nome è diverso ma l'id è lo stesso allora modifico
                if ($record2['nomeBand']!=$newBand && $record2["idBand"]==$record["idBand"]){
                    do{
                        $randomIdBand = rand(0, 9999999);
                    }while(existBand($randomIdBand)==true);

                    $record["idBand"] = $randomIdBand; //modifico il nuovo id al file delle canzoni

                    //aggiunta della nuova band al file con il nuovo id e il nuovo nome
                    $extraBand=array(
                        'idBand' => $randomIdBand,
                        'nomeBand' => $newBand
                    );
                    $recordsBand[]=$extraBand;
                    $rawBand=json_encode($recordsBand);
                    file_put_contents('band.json', $recordsBand);
                }elseif($record2["nomeBand"]== $newBand){
                    $record["idBand"] = $record2["idBand"];
                }
            }

            /*
              controllo se è cambiato il genere
              se il genere è cambiato controllo che non ci sia già
              se c'è già prendo l'id
              se non c'è do al nuovo genere un nuovo id
            */
            foreach($recordsGeneri as $record2){
                //se il nome è diverso ma l'id è lo stesso allora modifico
                if ($record2['nomeGenere']!=$newGenere && $record2["idGenere"]==$record["idGenere"]){
                    do{
                        $randomIdGenere = rand(0, 9999999);
                    }while(existGenere($randomIdGenere)==true);

                    $record["idGenere"] = $randomIdGenere; //modifico il nuovo id al file delle canzoni

                    //aggiunta del nuovo genere al file con il nuovo id e il nuovo nome
                    $extraGenere=array(
                        'idGenere' => '<?php $randomIdGenere',
                        'nomeGenere' =>'<?php $newGenere'
                    );
                    $recordsGeneri[]=$extraGenere;
                    $rawGenere=json_encode($recordsGeneri);
                    file_put_contents('genere.json', $recordsGeneri);
                }elseif($record2["nomeGenere"] == $newGenere){
                    $record["idGenere"] = $record2["idGenere"];
                }
            }

        }
    }

    $rawCanzoni=json_encode($recordsCanzoni);
    file_put_contents('canzoni.json', $rawCanzoni);

    //header('Location: index.php');
?>
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
