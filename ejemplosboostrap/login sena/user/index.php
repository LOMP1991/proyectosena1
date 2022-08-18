<?php
//Controlando el inicio de la sesión
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();


$nameU = $objses->get('usuario');
$idUse = $objses->get('id_usuario');

$user = isset($nameU) ? $nameU : null ;

if($user == ''){
	header('Location: http://localhost:8080/proyectosena/ejemplosboostrap/login%20sena/users/index.php?error=2');
}

?>
<!DOCTYPE html>

<html lang="es">

    <head>
    <meta charset="utf-8" />
            <title>User Dashboard</title>
    </head>
        
    <body>
        
        <?php echo "Bienvenido, " . $_SESSION['usuario'];?>
        
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="profile.php">Perfil</a></li>
        	<li><a href="log_out.php">Salir</a></li>
        </ul>
        
    </body>
    
</html>