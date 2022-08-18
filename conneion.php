
<?php 

$conn = new mysqli("localhost","root","","control_deaprendiz");
//chekearconeccion
if (mysqli_connect_errno()) {
	printf("Error de conexion :%s\n",mysqli_connect_error());
	exit();
	# code...
}



?>