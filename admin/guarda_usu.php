<?php 
	
	require('../conneion.php');
	
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];
	$id_tipo_usuario=$_POST['id_tipo_usuario'];

	if (isset($usuario)) {
		# code...

	
	  $query="INSERT INTO tbl_usuarios (usuario, password, id_tipo_usuario) VALUES ('$usuario','$password','$id_tipo_usuario')";
	
	   $resultado=$conn->query($query);
	}
	else{
		header("location:registroUsuario.php");

	}
?>
<html>
	<head>
		<title>Guardar usuario</title>
		<link href='http://fonts.googleapis.com/css?family=Oleo+Script:700' rel='stylesheet' type='text/css'>
		<script type="text/javascript">
   
         alert("usuario guardado");

         </script>	
		<link rel="stylesheet" type="text/css" href="styles/screen.css" />
	</head>
	<body>
		<center>	
         <?php if($resultado>0){
               
               
				header("location:registroUsuario.php");

		   }else{
				header("location:registroUsuario.php");	
				} ?>	
		</center>
	</body>
	</html>	
	