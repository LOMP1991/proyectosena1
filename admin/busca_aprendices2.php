<?php
include('../conneion.php');
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
$sth1 = $objData->prepare('SELECT * FROM  tbl_instructores WHERE id_usuario = :id_usuario');
$sth1->bindParam(':id_usuario', $idUse);
$sth1->execute();
$result1 = $sth1->fetchAll();
$dato = $_POST['dato'];

//EJECUTAMOS LA CONSULTA DE BUSQUEDA

$registro ="SELECT * FROM tbl_aprendices tf INNER JOIN tbl_fichas t ON t.id_ficha = tf.id_ficha INNER JOIN tbl_formacion f ON tf.id_formacion = f.id_formacion  where primer_nombre1  LIKE '%$dato%' OR tipo_documento LIKE '%$dato%' ORDER BY id_aprendiz  ASC";
$registro3 = $conn->query($registro);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX

echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="300">ID</th>
                <th width="200">Primer nombre</th>
                <th width="200">Segundo nombre</th>
                <th width="150">Primer Apellido</th>
                <th width="150">Segundo apellido</th>
                <th width="150">ficha</th>
                <th width="150">formacion</th>
                <th width="50">Opciones</th>
            </tr>';
if(mysqli_num_rows($registro3)>0){
	while($registro2 = mysqli_fetch_assoc($registro3)){
		echo '<tr>
		        <td>'.$registro2['id_aprendiz'].'</td>
				<td>'.$registro2['primer_nombre1'].'</td>
				<td>'.$registro2['segundo_nombre2'].'</td>
				<td>'.$registro2['primer_apellido1'].'</td>
				<td> '.$registro2['segundo_apellido2'].'</td>
				<td> '.$registro2['numero_ficha'].'</td>
				<td> '.$registro2['descripcion_formacion'].'</td>
			    <td><a href="agregarnovedadAprendiz.php?id='.$registro2['id_aprendiz'].'" class="glyphicon glyphicon-edit"></a></td>
			    </tr>';
	}
}else{
	echo '<tr>
				<td colspan="6">No se encontraron resultados</td>
			</tr>';
}
echo '</table>';
?>

