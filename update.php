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
$videoId=$_GET['videoId'];
$raw=file_get_contents('video.json');
$records=json_decode($raw,true);
$title="";
foreach($records as $record){
  if ($record['id']==$videoId){
    $title=$record['title'];
  }
}
?>


<form action="update-save.php">

  <input type="hidden" id="videoId" name=videoId value='<?php echo $videoId; ?>'>
  <label for="title">Titolo</label>
    <input type="text" id="title" name=title value="<?php echo $title; ?>">
<button>Salva</button>
</form>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>