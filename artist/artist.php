<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My artists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
<div class="container">
    <h1>Artisti o gruppi</h1>
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
        $records=getRecordsBand();
        foreach($records as $band){
            echo '<tr>';
            $urlUpdate="update.php?idBand=".$band->idBand."&nomeBand=".$band->nomeBand;
            echo '<td><a href="'.$urlUpdate.'">'.$band->nomeBand.'</a></td>';
            echo '<td>'.getNumeroBrani($band->idBand).'</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
    <a href="add.php" class="btn btn-success">Aggiungi un nuovo artista o gruppo</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>