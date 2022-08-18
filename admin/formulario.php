<?php 
$a = $_POST['a']; 
$b = $_POST['b']; 
$c = $_POST['c']; 
//$d = $_POST['d'];
// conectar la base da datos 
$db = 'pruebaejemploid'; 
$host = 'localhost'; 
$user = 'root'; 
$pass = ''; 
$conn = new PDO("mysql:dbname=".$db.";host=".$host,$user, $pass); 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// iniciar transacción 
$conn->beginTransaction();
try { 
// tabla 1 
$sql = 'INSERT INTO a (descripcion_motivo) VALUES (:descripcion_motivo)'; 
$result = $conn->prepare($sql); 
$result->bindValue(':descripcion_motivo', $a, PDO::PARAM_STR); 
$result->execute(); 
$lastId = $conn->lastInsertId();

// tabla 2 
$sql = 'INSERT INTO b (descripcion_tipo_novedad) VALUES (:descripcion_tipo_novedad)'; 
$result = $conn->prepare($sql); 
$result->bindValue(':descripcion_tipo_novedad', $b, PDO::PARAM_STR); 
$result->execute();
$lastId = $conn->lastInsertId();
// tabla 3 
$sql = 'INSERT INTO tbl_novedades (id_motivo,id_tipo_novedad,nombre) VALUES (:id_motivo, :id_tipo_novedad )'; 
$result = $conn->prepare($sql); 
$result->bindValue(':id_motivo', $lastId, PDO::PARAM_INT); 
$result->bindValue(':id_tipo_novedad', $lastId, PDO::PARAM_INT);
$result->bindValue(':nombre', $c, PDO::PARAM_STR); 
$result->execute();
// tabla 4 
//$sql = 'INSERT INTO d (a_id, value) VALUES (:a_id, :value)'; 
//$result = $conn->prepare($sql); 
//$result->bindValue(':a_id', $lastId, PDO::PARAM_INT); 
//$result->bindValue(':value', $d, PDO::PARAM_STR); 
//$result->execute();
$conn->commit(); 
echo 'Datos insertados'; 
} catch (PDOException $e) { 
// si ocurre un error hacemos rollback para anular todos los insert 
$conn->rollback(); 
echo $e->getMessage();; 
} 

?>