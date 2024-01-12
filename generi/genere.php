<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My generi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header id="headerTop">
    <nav>
        <a href="#"><img src="../651758.png" alt="" height="30" width="30"></a>
        <a href="../index.php">Brani</a>
        <a href="https://brugnola.bearzi.info/musica/artist/artist.php">Artisti o gruppi</a>
        <a href="#">Generi</a>
    </nav>
</header>
<div class="container">
    <h1>Generi</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Numero di Brani</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        include '../functions.php';
        $records=getRecordsGeneri();
        foreach($records as $genere){
            echo '<tr>';
            $urlUpdate="update.php?idGenere=".$genere->idGenere."&nomeGenere=".$genere->nomeGenere;
            echo '<td><a href="'.$urlUpdate.'">'.$genere->nomeGenere.'</a></td>';
            echo '<td>'.getNumeroGeneri($genere->idGenere).'</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
    <a href="add.php" class="btn btn-success">Aggiungi un nuovo genere</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>