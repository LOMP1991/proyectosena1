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

//conectamos a la base de datos
require'../class/database.php';
$objData = new Database();

//llamar los datos de Login del usuario ingresado
$sth = $objData->prepare('SELECT * FROM tbl_usuarios U inner join tbl_tipo_usuarios P '.'on U.id_tipo_usuario = P.id_tipo_usuario WHERE id_usuario = :id_usuario');
$sth->bindParam(':id_usuario', $idUse);
$sth->execute();

$result = $sth->fetchAll();

$sth = $objData->prepare('SELECT * FROM tbl_tipo_usuarios  WHERE  descripcion_tipo_usuario = descripcion_tipo_usuario');
$sth->bindParam(':descripcion_tipo_usuario', $idUse);
$sth->execute();

$result3 = $sth->fetchAll();

$result5 = $sth->fetchAll();

//llamar los datos personales del usuario ingresado
$sth1 = $objData->prepare('SELECT * FROM  tbl_instructores WHERE id_usuario = :id_usuario');
$sth1->bindParam(':id_usuario', $idUse);
$sth1->execute();
$result1 = $sth1->fetchAll();
?>


<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GESTION DE NOVEDADES DE APREDIZ!</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="../estilo.css">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">HOME</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index1.php">BIENVENIDA</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>BIENVENID@ <?php echo " " . $_SESSION['usuario'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="perfilInstructor.php"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../log_out.php"><i class="fa fa-fw fa-power-off"></i>Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                   <li>
                        <a href="index1Instructor.php"><i class="fa fa-fw fa-desktop"></i>GESTION DE NOVEDADES</a>
                    </li>
                    <li>
                        <a href="../admin/forms.php"><i class="fa fa-fw fa-edit"></i>Novedades Registradas</a>
                    </li>
                    <li>
                        <a href="Buscaraprendiz.php"><i class="fa fa-fw fa-edit"></i>Buscar Y Generar Novedades</a>
                    </li>
                    <li>
                         <a href="#">Registro De Aprendiz</a>
                    </li>   
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-desktop"></i>GESTION DE NOVEDADES
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i><a href="perfilInstructor.php"> perfil</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-6">
                      
                       <div class="profile">
                       <div class="profile_pic">
                        <img src="<?php echo $result[0]['imgUser'];?>"  class="img-circle profile_img">
                        </div>
                        </div>
                        <h3 class="page-header">
                             <?php echo "Perfil De " . $nameU;?>
                        </h3>
                       <br></br>
                        <form action="../user/modifi_foto.php" method="POST" enctype="multipart/form-data" role="form">

                        <div class="form-group">
                                <label>Foto</label>
                                <input class="form-control" type="file" name="userF" required="foto" />
                        </div>

                        <button type="submit" class="btn btn-primary fa fa-edit">EditarFoto</button> 
                        </form>
                       
                        <form action="../user/modify_profile.php" method="POST" enctype="multipart/form-data" role="form">
                           <br></br>
                            <div class="form-group">
                                <label>Nombre de Usuario</label>
                                <input class="form-control" name="userN" value="<?php echo $result[0]['usuario'];?>" placeholder="Usuario" >
                            </div>
                            
                            <div class="form-group">
                                <label>Clave de acceso</label>
                                <input type="password" name="userP" class="form-control" placeholder="clave" required="clave"/>
                            </div>
                           

                            <div class="form-group">
                                <label>tipo de Usuario</label>
                                <input class="form-control" type="text" readonly="readonly" name="descripcion_tipo_usuario" value="<?php echo $result[0]['descripcion_tipo_usuario'];?>" placeholder="nombre">
                            </div>
                           
                            
                            <input type="hidden" name="id_usuario" value="<?php echo $idUse;?>" />
                        
                            <button type="submit" class="btn btn-primary fa fa-edit"> Guardar</button>  
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                      <div class="clearfix"></div>

                        <h1  class="page-header ">
                        <button class="btn btn-primary fa fa-user"></button><?php echo " Mis Datos " ?>
                        </h1>
                       
                       <div class="clearfix"></div>
                        <form action="../user/modify_data.php" method="POST" role="form">
                           <br></br>
                            <div class="form-group">
                                <label>Nombre </label>
                                <?php
                                if($result1){?>
                                   <input class="form-control"  type="text" name="primer_nombre" readonly="readonly" value="<?php echo $result1[0]['primer_nombre'];?>" /><br>
                                  <?php
                                }else{?>
                                  <input type="text" class="form-control"  name="primer_nombre" value="<?php echo $result4[0]['primer_nombre'];?>" /><br>
                                  <?php
                                }
                                ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Segundo Nombre</label>
                                 <?php
                                if($result1){?>
                                   <input class="form-control" type="text" name="segundo_nombre" readonly="readonly" value="<?php echo $result1[0]['segundo_nombre'];?>" /><br>
                                  <?php
                                }else{?>
                                  <input type="text" class="form-control" readonly="readonly" name="segundo_nombre1" value="<?php echo $result1[0]['segundo_nombre1'];?>" /><br>
                                  <?php
                                }
                                ?>
                            </div>
                           

                            <div class="form-group">
                                <label>Primer Apellido</label>
                                 <?php
                                if($result1){?>
                                   <input class="form-control" type="text" name="primer_apellido" readonly="readonly" value="<?php echo $result1[0]['primer_apellido'];?>" /><br>
                                  <?php
                                }else{?>
                                  <input type="text" class="form-control" readonly="readonly" name="primer_apellido" value="<?php echo $result1[0]['primer_apellido'];?>" /><br>
                                  <?php
                                }
                                ?>
                            </div>
                           
        <div class="form-group">
            <label>Segundo Apellido</label>
                 <?php
                   if($result1){?>
                     <input class="form-control" type="text" name="segundo_apellido" readonly="readonly" value="<?php echo $result1[0]['segundo_apellido'];?>" /><br>
                    <?php
                    }else{?>
                    <input type="text" class="form-control"  name="segundo_apellido" value="<?php echo $result4[0]['segundo_apellido'];?>" /><br>
                      <?php
                    }
                        ?>
                            </div>
                            <div class="form-group">
                                <label>Correo</label>
                                 <?php
                                if($result1){?>
                                   <input class="form-control" type="text" name="correo_instructor" value="<?php echo $result1[0]['correo_instructor'];?>" /><br>
                                  <?php
                                }else{?>
                                  <a href=""><?php echo $result4[0]['correo_aprendiz'];?></a>
                                  <?php
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Celular</label>
                                <?php
                                if($result1){?>
                                   <input class="form-control" type="text" name="celular_instructor" value="<?php echo $result1[0]['celular_instructor'];?>" />
                                  <?php
                                }else{?>
                                  <input type="text" class="form-control"  name="celular_aprendiz" value="<?php echo $result4[0]['celular_aprendiz'];?>" />
                                  <?php
                                }
                                ?>
                            </div>
                             
                            
                        
                          
                            <input type="hidden" name="id_usuario" value="<?php echo $idUse;?>"  />
                            <?php
                              if($result1){?>
                               <input type="hidden" name="exists" value="1" />
                              <?php
                            }else{?>
                             <input type="hidden" name="exists" value="0" />
                                <?php
                            }
                            ?>
                
                        
                            <button type="submit" class="btn btn-primary fa fa-edit"> Guardar</button>  
                        </form>
                    </div>
                </div>
                <!-- /.row -->
              <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-desktop"></i>BIENVENIDA
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i><a href="perfilInstructor.php"> perfil</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
          
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
