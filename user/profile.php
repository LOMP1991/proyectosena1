<?php

//Controlando el inicio de la sesión
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();
$nameU = $objses->get('usuario');
$idUse = $objses->get('id_usuario');

$user = isset($nameU) ? $nameU : null ;

if($user == ''){
	header('Location: http://localhost:8080/proyectosena/users/index.php?error=2');
}

//conectamos a la base de datos
require'../class/database.php';
$objData = new Database();

//llamar los datos de Login del usuario ingresado
$sth = $objData->prepare('SELECT * FROM tbl_usuarios  WHERE id_usuario = :id_usuario');
$sth->bindParam(':id_usuario', $idUse);
$sth->execute();

$result = $sth->fetchAll();

$sth = $objData->prepare('SELECT * FROM tbl_tipo_usuarios  WHERE id_tipo_usuario = :descripcion_tipo_usuario');
$sth->bindParam(':descripcion_tipo_usuario', $idUse);
$sth->execute();

$result3 = $sth->fetchAll();

//llamar los datos personales del usuario ingresado
$sth1 = $objData->prepare('SELECT * FROM tbl_aprendices  WHERE id_usuario = :id_usuario');
$sth1->bindParam(':id_usuario', $idUse);

$sth1->execute();
$result4 = $sth1->fetchAll();


$sth1 = $objData->prepare('SELECT * FROM  tbl_instructores WHERE id_usuario = :id_usuario');
$sth1->bindParam(':id_usuario', $idUse);
$sth1->execute();
$result1 = $sth1->fetchAll();

?>
<!DOCTYPE html>
<html lang="es">
	<head>
    	<meta charset="utf-8" />
        <title>Perfil de Usuario</title>
        
    </head>
    
    <body>
        
        <?php echo "Bienvenido, " . $nameU;?>
        
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="profile.php">Perfil</a></li>
            <li><a href="log_out.php">Salir</a></li>
        </ul>
        
        <br>
        
        <form action="modify_profile.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Datos de Inicio de Sesión</legend>
                <img src="<?php echo $result[0]['imgUser'];?>" width="200" /> <br>
                <label>Nombre de Usuario:</label>
                <input type="text" name="userN" value="<?php echo $result[0]['usuario'];?>" /><br>
                <label>Clave de acceso:</label>
                <input type="password" name="userP" placeholder="clave" /><br>
                <label>tipo de Usuario:</label>
                <input type="text" name="descripcion_tipo_usuario" value="<?php echo $result3[0]['descripcion_tipo_usuario'];?>" /><br>
                <label>Avatar:</label>
                <input type="file" name="userF" /><br>  
                <input type="hidden" name="id_usuario" value="<?php echo $idUse;?>" />
                <input type="submit" value="ENVIAR" />
            </fieldset>    
        </form>
        
        <form action="modify_data.php" method="POST">
            <fieldset>
                <legend>Datos Personales del Usuario</legend>
                <label>Nombres:</label>
                <?php
                if($result1){?>
                    <input type="text" name="primer_nombre" value="<?php echo $result1[0]['primer_nombre'];?>"  /><br>
                    <?php
                }else{?>
                    <input type="text" name="primer_nombre" value="<?php echo $result4[0]['primer_nombre'];?>" /><br>
                    <?php
                }
                ?>
                <label>segundo nombre</label>
                <?php
                if($result1){?>
                    <input type="text" name="segundo_nombre" value="<?php echo $result1[0]['segundo_nombre'];?>"  /><br>
                    <?php
                }else{?>
                    <input type="text" name="segundo_nombre" value="<?php echo $result4[0]['segundo_nombre'];?>" /><br>
                    <?php
                }
                ?>
                <label>apellidos</label>
                <?php
                if($result1){?>
                    <input type="text" name="primer_apellido" value="<?php echo $result1[0]['primer_apellido'];?>"  /><br>
                    <?php
                }else{?>
                    <input type="text" name="primer_apellido" value="<?php echo $result4[0]['primer_apellido'];?>" /><br>
                    <?php
                }
                ?>
                <label>segundo apellido</label>
                <?php
                if($result1){?>
                    <input type="text" name="segundo_apellido" value="<?php echo $result1[0]['segundo_apellido'];?>"  /><br>
                    <?php
                }else{?>
                    <input type="text" name="segundo_apellido" value="<?php echo $result4[0]['segundo_apellido'];?>" /><br>
                    <?php
                }
                ?>
                <label>correo</label>
                <?php
                if($result1){?>
                    <input type="text" name="correo_instructor" value="<?php echo $result1[0]['correo_instructor'];?>"  /><br>
                    <?php
                }else{?>
                    <input type="text" name="correo_aprendiz" value="<?php echo $result4[0]['correo_aprendiz'];?>" /><br>
                    <?php
                }
                ?>
                <label>telefono</label>
                 <?php
                if($result1){?>
                    <input type="text" name="celular_instructor" value="<?php echo $result1[0]['celular_instructor'];?>"  /><br>
                    <?php
                }else{?>
                    <input type="text" name="celular_aprendiz" value="<?php echo $result4[0]['celular_aprendiz'];?>" /><br>
                    <?php
                }
                ?>
                  <label>ficha</label>
                 <?php
                if($result1){?>
                    <input type="text" name="celular_instructor" value="<?php echo $result1[0]['id_ficha'];?>"  /><br>
                    <?php
                }else{?>
                    <input type="text" name="celular_aprendiz" value="<?php echo $result4[0]['descripcion_formacion'];?>" /><br>
                    <?php
                }
                ?>

                <input type="hidden" name="id_usuario" value="<?php echo $idUse;?>" />
                <?php
                if($result1){?>
                    <input type="hidden" name="exists" value="1" />
                    <?php
                }else{?>
                    <input type="hidden" name="exists" value="0" />
                    <?php
                }
                ?>
                <?php
                if($result3){?>
                    <input type="hidden" name="exists" value="1" />
                    <?php
                }else{?>
                    <input type="hidden" name="exists" value="0" />
                    <?php
                }
                ?>

                <input type="submit" value="ENVIAR" />
            </fieldset>    
        </form>
    </body>
    
    
    
</html>