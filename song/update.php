<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My song</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body>
    <div class="container">

    <?php
        include '../functions.php';
        $idCanzone=$_GET['idCanzone'];
        $recordsCanzoni=getRecordsCanzoniAssociative();

        $idBand=$_GET['idBand'];
        $recordsBand=getRecordsBandAssociative();

        $idGenere=$_GET['idGenere'];
        $recordsGeneri=getRecordsGeneriAssociative();

        $title="";
        foreach($recordsCanzoni as $record){
          if($record['idCanzone']==$idCanzone){
              $title=$record['titolo'];
          }
        }
    ?>


<form action="update-save.php" method="get">

    <?php
        echo '<input type="hidden" id="idCanzone" name=idCanzone value='.$idCanzone.'></option>';
    ?>

    <label for="title">Titolo</label>
    <?php
        echo '<input type="text" id="title" name=title value="'.$title.'" required><br>';
    ?>

    <label for="band">Nome artista: </label>
    <select name="band" id="band">
    <?php
        foreach ($recordsBand as $band){
            echo '<option value="'.$band["nomeBand"].'">'.$band["nomeBand"].'</option>';
        }
    ?>
    </select>
    <br>
    <label for="genere">Seleziona uno o più generi:</label><br>
    <?php
        $cnt=0;
        foreach ($recordsGeneri as $genere){
            echo '<input type="checkbox" id="'.$genere["idGenere"].'" name="genere'.$cnt.'" value="'.$genere["nomeGenere"].'"></option>';
            echo '<label for="'.$genere["nomeGenere"].'">'.$genere["nomeGenere"].'</label><br>';
            $cnt++;
        }
    ?>
  <input type="submit" value="Salva"/>
</form>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>