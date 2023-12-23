<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My videos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body>
    <div class="container">
    <table class="table table-striped">
          <thead>
        <tr>
          <th scope="col">Titolo</th>
            <th scope="col">Autore</th>
            <th scope="col">Genere</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
            $raw=file_get_contents('canzoni.json');
            $records=json_decode($raw);
            foreach($records as $record){
                echo '<tr>';
                $urlUpdate="update.php?idCanzone=".$record->idCanzone."?idBand=".$record->idBand."?idGenere=".$record->idGenere;
                echo '<td><a href="'.$urlUpdate.'">'.$record->titolo.'</a></td>';
                echo '<td><a href="'.$urlUpdate.'">'.getBand($record->idBand).'</a></td>';
                echo '<td><a href="'.$urlUpdate.'">'.getGenere($record->idGenere).'</a></td>';
                $urlDelete="delete.php?idCanzone=".$record->idCanzone."?idBand=".$record->idBand."?idGenere=".$record->idGenere;
                echo '<td><a href="'.$urlDelete.'"><i class="bi bi-trash-fill"></i></a></td>';
                echo '</tr>';
            }
        ?>
    </table>
    <a href="add.php" class="btn btn-success">Aggiungi una nuova canzone</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

<?php
function getBand($band){
    $raw=file_get_contents('band.json');
    $records=json_decode($raw);
    $nome = "";
    foreach($records as $record){
        if($band === $record->idBand) {
            $nome = $record->nomeBand;
        }
    }
    return $nome;
}

function getGenere($genere){
    $raw=file_get_contents('genere.json');
    $records=json_decode($raw);
    $gen = "";
    foreach($records as $record){
        if($genere === $record->idGenere){
            $gen = $record->nomeGenere;
        }
    }
    return $gen;
}