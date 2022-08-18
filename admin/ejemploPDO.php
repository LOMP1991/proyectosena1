<?php

include('../conneion.php');
$gsent=$conn->prepare("SELECT primer_nombre1,segundo_nombre2,primer_apellido1 FROM tbl_aprendices");
$gsent->execute();

$resultado = $gsent->fetch(PDO::FETCH_COLUMN);
var_dump($resultado);
?>