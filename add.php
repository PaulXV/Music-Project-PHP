<?php
    include 'functions.php';
    $idCanzone="";
    do{                                     //creazione di un nuovo id  tramite numero random
        $idCanzone = rand();
    }while(existSong($idCanzone)==true); // mi controlla che l'id non esista gia'
    $recordsBand=getRecordsBandAssociative();
    $recordsGeneri=getRecordsGeneriAssociative();
?>

<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>new song</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body>
    <div class="container">
        <form action="add-save.php" method="get">
            <?php
                echo '<input type="hidden" id="idCanzone" name="idCanzone" value="'.$idCanzone.'"/><br>';
            ?>
            <label for="title">Titolo: </label>
            <input type="text" id="title" name=title value="" required><br>

            <label for="band">Nome artista: </label>
            <select name="band" id="band">
                <?php
                    foreach ($recordsBand as $band){
                        echo '<option value="'.$band["idBand"].'">'.$band["nomeBand"].'</option>';
                    }
                ?>
            </select>
            <br>
            <label for="genere">Seleziona uno o più generi:</label><br>
            <?php
                $cnt=0;
                foreach ($recordsGeneri as $genere){
                    echo '<input type="checkbox" id="'.$genere["idGenere"].'" name="genere'.$cnt.'" value="'.$genere["idGenere"].'"></option>';
                    echo '<label for="'.$genere["nomeGenere"].'">'.$genere["nomeGenere"].'</label><br>';
                    $cnt++;
                }
                echo '<input type="hidden" id="numGeneri" name="numGeneri" value="'.$cnt.'"/><br>';
            ?>

            <input type="submit" value="Salva"/>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>