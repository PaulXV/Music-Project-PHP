<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My genere - add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
<div class="container">
    <form method="get" action="add-save.php">
        <label for="nomeGenere">Nome del genere: </label><br>
        <input type="text" id="nomeGenere" name="nomeGenere" required>

        <?php
        include '../functions.php';
        do{                                     //creazione di un nuovo id tramite numero random
            $randomIdGenere = rand();
        }while(existGenere($randomIdGenere)==true); // mi controlla che l'id non esista gia'

        echo '<input type="hidden" id="idGenere" name="idGenere" value="'.$randomIdGenere.'"/></option>';
        ?>
        <br>
        <a href="genere.php" class="btn btn-primary">Torna indietro</a>
        <input type="submit" value="Aggiungi l'artista" class="btn btn-success">
    </form>
<div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
