<?php
include('../conneion.php');

$id = $_POST['id_novedad'];

//OBTENEMOS LOS VALORES DEL PRODUCTO

$valores ="SELECT * FROM tbl_novedades NM INNER JOIN tbl_motivo O ON O.id_motivo=NM.id_motivo INNER JOIN tbl_tipo_novedades T ON NM.id_tipo_novedad=t.id_tipo_novedad INNER JOIN tbl_aprendices A ON NM.id_aprendiz=A.id_aprendiz INNER JOIN tbl_instructores I ON NM.id_instructor=I.id_instructor INNER JOIN tbl_complejo C ON NM.id_complejo=C.id_complejo  WHERE id_novedad = '$id'";
$valores2= $conn->query($valores);
$valores3 = mysqli_fetch_array($valores2);

$datos = array(
				0 => $valores3['primer_nombre1'], 
				1 => $valores3['segundo_nombre2'], 
				2 => $valores3['primer_apellido1'],
				3 => $valores3['segundo_apellido2'],
				4 => $valores3['primer_nombre'], 
				5 => $valores3['segundo_nombre'],
				6 => $valores3['primer_apellido'],
				7 => $valores3['segundo_apellido'],
				8 => $valores3['descripcion_tipo_novedad'],
				9 => $valores3['descripcion_motivo'],
				10 => $valores3['id_instructor'],
				11 => $valores3['id_aprendiz'],
				12 => $valores3['id_complejo'],
				13 => $valores3['id_tipo_novedad'],
				14 => $valores3['id_motivo'],
				);
echo json_encode($datos);
?>