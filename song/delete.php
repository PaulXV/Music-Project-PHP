<?php
include '../functions.php';
$idCanzone=$_GET['idCanzone'];
$records=getRecordsCanzoniAssociative();
$listaNuova=[];
foreach($records as $record){
	if ($record['idCanzone']!=$idCanzone){
		$listaNuova[]=$record;
	}
}
$raw=json_encode($listaNuova);
file_put_contents('../canzoni.json', $raw);
header('Location: ../index.php');