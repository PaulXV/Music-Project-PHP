<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My artist - add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
<div class="container">
    <form method="get" action="add-save.php">
        <label for="nomeBand">Nome dell'artista: </label><br>
        <input type="text" id="nomeBand" name="nomeBand" required>

        <?php
        include '../functions.php';
        do{                                     //creazione di un nuovo id tramite numero random
            $randomIdBand = rand();
        }while(existBand($randomIdBand)==true); // mi controlla che l'id non esista gia'

        echo '<input type="hidden" id="idBand" name="idBand" value="'.$randomIdBand.'"/></option>';
        ?>
        <br>
        <a href="artist.php" class="btn btn-primary">Torna indietro</a>
        <input type="submit" value="Aggiungi l'artista" class="btn btn-success">
    </form>
<div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
