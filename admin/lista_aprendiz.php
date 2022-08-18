<?php
  //conectamos a la base de datos
require'../class/database.php';
$objData = new Database();
$sth1 = $objData->prepare('SELECT * FROM  tbl_Admincontroller WHERE id_usuario = :id_usuario');
$sth1->bindParam(':id_usuario', $idUse);
$sth1->execute();
$result1 = $sth1->fetchAll();
	include('../conneion.php');
	
	$query="SELECT id_aprendiz,primer_nombre1,segundo_nombre2,primer_apellido1,segundo_apellido2,numero_ficha,descripcion_formacion FROM tbl_aprendices tf INNER JOIN tbl_fichas t ON t.id_ficha = tf.id_ficha INNER JOIN tbl_formacion f ON tf.id_formacion = f.id_formacion ";
	
	$resultado=$conn->query($query);
	
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>Usuarios</title>
		<link href='http://fonts.googleapis.com/css?family=Oleo+Script:700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="styles/screen.css" />

	</head>
	<body>
		<DIV align="center">
		<center><h1>Usuarios</h1></center>
		
		<a href="nuevo.php">Nuevo usuario</a>
		<input type="text" />
		<input type="submit" name="buscar" placeholder="elemplo buscar juan" value="buscar"/>
		
		<p></p>
		
		<table border=1 width="80%">
			<thead>
				<tr>
					<td><b>Usuario</b></td>
					<td><b>Email</b></td>
					<td></td>
					<td></td>
				</tr>
				<tbody>
					<?php while($row=$resultado->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $row['primer_nombre1'];?>
							</td>
							<td>
								<?php echo $row['segundo_nombre2'];?>
							</td>
							<td>
								<a href="modificar.php?id=<?php echo $row['id_aprendiz'];?>">Modificar</a>
							</td>
							<td>
								<a href="eliminar.php?id=<?php echo $row['id'];?>">Eliminar</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</DIV>
		</body>
	</html>	
	
