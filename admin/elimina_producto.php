<?php
include('../conneion.php');

$id = $_POST['id_novedad'];

//ELIMINAMOS EL PRODUCTO

$sql="DELETE FROM tbl_novedades WHERE id_novedad = '$id'";
$registro3 =$conn->query($sql);

//ACTUALIZAMOS LOS REGISTROS Y LOS OBTENEMOS

$registro ="SELECT * FROM tbl_novedades ORDER BY id_novedad ASC";
$registro3 =$conn->query($registro);

//CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX
  
echo '<table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="300">tipo de novedad</th>
                <th width="200">Instructor</th>
                <th width="150">Aprendiz</th>
                <th width="150">complejo</th>
                <th width="150">Motivo</th>
                <th width="50">Opciones</th>
            </tr>';
    while($registro2 = mysqli_fetch_array($registro3)){
        echo '<tr>
                <td>'.$registro2['id_instructor'].'</td>
                <td>'.$registro2['id_aprendiz'].'</td>
                <td>'.$registro2['id_tipo_novedad'].'</td>
                <td>'.$registro2['id_complejo'].'</td>
                <td>'.$registro2['id_motivo'].'</td>
                <td><a href="javascript:editarProducto('.$registro2['id_novedad'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro2['id_novedad'].');" class="glyphicon glyphicon-remove-circle"></a></td>
                </tr>';
    }
echo '</table>';

?>