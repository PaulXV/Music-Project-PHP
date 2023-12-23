<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My videos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body>
    <div class="container">

    <?php
        $idCanzone=$_GET['idCanzone'];
        $rawCanzoni=file_get_contents('canzoni.json');
        $recordsCanzoni=json_decode($rawCanzoni,true);

        $idBand=$_GET['idBand'];
        $rawBand=file_get_contents('band.json');
        $recordsBand=json_decode($rawBand,true);

        $idGenere=$_GET['idGenere'];
        $rawGeneri=file_get_contents('genere.json');
        $recordsGeneri=json_decode($rawGeneri,true);

        $title="";
        $nomeBand="";
        $nomeGenere="";

        foreach($recordsCanzoni as $record){
          if($record['idCanzone']==$idCanzone){
              $title=$record['titolo'];
              foreach($recordsBand as $record2){
                  if ($record2['idBand']==$idBand){
                      $nomeBand=$record2['nomeBand'];
                  }
              }
              foreach($recordsGeneri as $record2){
                  if ($record2['idGenere']==$idGenere){
                      $nomeGenere=$record2['nomeGenere'];
                  }
              }
          }
        }
    ?>


<form action="update-save.php">

  <input type="hidden" id="idCanzone" name=idCanzone value='<?php echo $idCanzone; ?>'>
  <label for="title">Titolo</label>
    <input type="text" id="title" name=title value="<?php echo $title; ?>" required><br>
  <label for="band">Nome Band</label>
    <input type="text" id="band" name=band value="<?php echo $nomeBand; ?>" required><br>
    <label for="genere">Nome Genere</label>
    <input type="text" id="genere" name=genere value="<?php echo $nomeGenere; ?>" required><br>
  <input type="submit" value="Salva"/>
</form>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>