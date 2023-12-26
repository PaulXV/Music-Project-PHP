<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My artist - update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
<div class="container">
    <form method="get" action="update-save.php">
        <label for="nomeBand">Nome dell'artista: </label><br>
        <?php
        $idBand = $_GET["idBand"];
        $name = $_GET["nomeBand"];
        echo '<input type="text" name="nomeBand" id="nomeBand" value="'.$name.'" required><br>';
        echo '<input type="hidden" name="idBand" id="idBand" value="'.$idBand.'"><br>';
        ?>
        <a href="artist.php" class="btn btn-primary">Ritorna alla lista</a>
        <input type="submit" value="Salva" class="btn btn-success">
        <?php
            echo '<a href="remove-save.php?idBand='.$idBand.'" class="btn btn-danger">Rimuovi questo artista</a>';
        ?>


    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>