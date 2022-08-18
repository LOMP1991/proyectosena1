<?php 
//Controlando el inicio de la sesión
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();
$nameU = $objses->get('usuario');
$idUse = $objses->get('id_usuario');
$user = isset($nameU) ? $nameU : null ;

if($user == ''){
    header('Location: http://localhost:8080/proyectosena/index.php?error=2');
}
//conectamos a la base de datos
require'../class/database.php';
$objData = new Database();
$sth1 = $objData->prepare('SELECT * FROM  tbl_Admincontroller WHERE id_usuario = :id_usuario');
$sth1->bindParam(':id_usuario', $idUse);
$sth1->execute();
$result1 = $sth1->fetchAll();
include('../conneion.php');
$id_aprendiz = $_POST['id_aprendiz'];

$valores4 ="SELECT  * FROM tbl_aprendices,tbl_complejo WHERE id_aprendiz='$id_aprendiz' AND id_complejo=id_complejo";
$valores5= $conn->query($valores4);




$valores6 = mysqli_fetch_array($valores5);


$datos = array(
				0 => $valores6['primer_nombre1'], 
			    1 => $valores6['segundo_nombre2'], 
				2 => $valores6['primer_apellido1'],
				3 => $valores6['segundo_apellido2'],
				4 => $valores6['id_complejo'],
				);
echo json_encode($datos);
?>
