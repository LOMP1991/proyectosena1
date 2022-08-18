<?php
include('../conneion.php');
$id = $_POST['id_novedad'];
$id_usuario = $_POST['id_usuario_novedad'];
$proceso = $_POST['pro'];
$id_instructor = $_POST['id_instructor'];
$id_aprendiz = $_POST['id_aprendiz'];
$id_tipo_novedad = $_POST['id_tipo_novedad'];
$descripcion_tipo_novedad = $_POST['descripcion_tipo_novedad'];
$id_motivo = $_POST['id_motivo'];
$descripcion_motivo = $_POST['descripcion_motivo'];
$id_complejo = $_POST['id_complejo'];

//VERIFICAMOS EL PROCESO

switch($proceso){
	case 'Registro':   
       // conectar la base da datos 
$db = 'control_deaprendiz'; 
       $host = 'localhost'; 
     $user = 'root'; 
     $pass = ''; 
     $conn = new PDO("mysql:dbname=".$db.";host=".$host,$user, $pass); 
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// iniciar transacción 
     $conn->beginTransaction();
      try {
          
       $sql = 'INSERT INTO tbl_motivo (descripcion_motivo) VALUES (:descripcion_motivo)'; 
       $result = $conn->prepare($sql); 
       $result->bindValue(':descripcion_motivo', $descripcion_motivo, PDO::PARAM_STR); 
       $result->execute(); 
       $lasstId = $conn->lastInsertId();

       // tabla 2 
       $sql = 'INSERT INTO tbl_tipo_novedades (descripcion_tipo_novedad) VALUES (:descripcion_tipo_novedad)'; 
       $result = $conn->prepare($sql); 
       $result->bindValue(':descripcion_tipo_novedad', $descripcion_tipo_novedad, PDO::PARAM_STR); 
       $result->execute();
       $lastId = $conn->lastInsertId();
        // tabla 3 
       $sql = 'INSERT INTO tbl_novedades (id_motivo,id_tipo_novedad,id_instructor,id_aprendiz,id_complejo,id_usuario_novedad) VALUES (:id_motivo, :id_tipo_novedad ,:id_instructor,:id_aprendiz,:id_complejo,:id_usuario_novedad )'; 
       $result = $conn->prepare($sql); 
       $result->bindValue(':id_motivo', $lasstId, PDO::PARAM_INT); 
       $result->bindValue(':id_tipo_novedad', $lastId, PDO::PARAM_INT);
        $result->bindValue(':id_instructor', $id_instructor, PDO::PARAM_INT);
         $result->bindValue(':id_aprendiz', $id_aprendiz, PDO::PARAM_INT);
          $result->bindValue(':id_complejo', $id_complejo, PDO::PARAM_INT);
       $result->bindValue(':id_usuario_novedad', $id_usuario, PDO::PARAM_STR); 
       $result->execute();
       $conn->commit();
         echo 'Datos insertados'; 
       } catch (PDOException $e) { 
        // si ocurre un error hacemos rollback para anular todos los insert 
       $conn->rollback(); 
       echo $e->getMessage();; 
      } 

	break;
	
	case 'Editar Novedad':
		$sql="UPDATE tbl_novedades SET id_instructor = '$id_instructor', id_aprendiz= '$id_aprendiz', id_tipo_novedad = '$id_tipo_novedad', id_motivo = '$id_motivo' id_usuario_novedad = '$id_usuario' WHERE id_novedad = '$id'";
        $sql ="UPDATE tbl_tipo_novedades ,tbl_motivo SET descripcion_tipo_novedad = '$descripcion_tipo_novedad', descripcion_motivo ='$descripcion_motivo' WHERE `tbl_tipo_novedades`.`id_tipo_novedad` ='$id_tipo_novedad' AND `tbl_motivo`.`id_motivo` ='$id_motivo'";
        $agregado1=$conn->query($sql);
	break;
}

?>