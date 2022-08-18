<?php 
include('../conneion.php');
$proceso1 = $_POST['registroApre'];
$primer_nombre1 = $_POST['primer_nombre1'];
$segundo_nombre2 = $_POST['segundo_nombre2'];
$primer_apellido1 = $_POST['primer_apellido1'];
$segundo_apellido2 = $_POST['segundo_apellido2'];
$celular_aprendiz = $_POST['celular_aprendiz'];
$correo_aprendiz = $_POST['correo_aprendiz'];
$id_ficha = $_POST['id_ficha'];
$id_formacion = $_POST['id_formacion'];

		$sql="INSERT INTO tbl_aprendices ( primer_nombre1, segundo_nombre2, primer_apellido1, segundo_apellido2,celular_aprendiz, correo_aprendiz, id_ficha, id_formacion) VALUES ('$primer_nombre1','$segundo_nombre2','$primer_apellido1','$segundo_apellido2','$celular_aprendiz','$correo_aprendiz','$id_ficha','$id_formacion')";
            $resultado=$conn->query($sql);
     

           if($resultado>0){ 
				header('Location: registroAprendiz.php');
				}else{ 
					header('Location: registroAprendiz.php');
			}
?>

