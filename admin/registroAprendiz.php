<?php
//Controlando el inicio de la sesión
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();
$nameU = $objses->get('usuario');
$idUse = $objses->get('id_usuario');
$user = isset($nameU) ? $nameU : null ;

if($user == ''){
    header('Location: http://localhost:8080/proyectosena/index.php?error=2');
}

include('../conneion.php');
$query1 ="SELECT tbl_fichas.id_ficha,tbl_fichas.numero_ficha FROM tbl_fichas";
    $registro4=$conn->query($query1);
$query2 ="SELECT tbl_formacion.id_formacion,tbl_formacion.descripcion_formacion FROM tbl_formacion";
    $registro5=$conn->query($query2);   
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GESTION DE NOVEDADES DE APREDIZ!</title>

    <script src="../js/jquery.js"></script>

    <script src="../js/myjava.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../css/js/bootstrap.min.js"></script>
    <link href="../css/sb-admin.css" rel="stylesheet">
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> BIENVENID@ <?php echo " " . $_SESSION['usuario'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="perfil.php"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
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
                        <a href="../index3.php"><i class="fa fa-fw fa-desktop"></i>GESTION DE NOVEDADES</a>
                    </li>
                    <li>
                        <a href="indexAdmincontroller.php"><i class="fa fa-fw fa-edit"></i>Novedades Generadas</a>
                    </li>
                    <li>
                        <a href="vistaaprendiz.php"><i class="fa fa-fw fa-edit"></i>Buscar y Generar Novedad</a>
                    </li>    
                    <li class="active">
                        <a href="registroAprendiz.php"><i class="fa fa-fw fa-edit"></i>Registro De Aprendiz</a>
                    </li>
                    <li>
                    <a href="registroUsuario.php"><i class="fa fa-fw fa-edit"></i>Registro De Usuario</a>
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
                            Generar novedades
                        </h1>
                        <ol class="breadcrumb">
                           <li>
                                <i class="fa fa-desktop"></i>  <a href="../index3.php">BIENVENIDA</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> <a href="../admin/indexAdmincontroller.php"> Novedades Generadas</a> 
                            </li>
                            <li>
                                <i class="fa fa-search"></i> <a href="../admin/vistaaprendiz.php">Buscar y Generar novedad</a>  
                            </li>
                        </ol>
                    </div>
                </div>
        <div class="row">
         <div class="col-lg-8">
         <div class="form-group">
          <H1>Registre Los Aprendices</H1>
          </div>
          </div>
        </div>

        <div class="row">
          <div>
            <div>
               <div class="registros" id="agrega-registros"></div>
              <form action="guardar_registroApren.php" method="POST" >
               <div class="col-lg-7">
                     <div class="form-group">
                        <label>Proceso: </label>
                        <input class="form-control"  type="text" required="required" readonly="readonly" value="Registro Aprendiz"  id="registroApr" name="registroApre" />
                    </div>
                    </div>
               <div class="col-lg-6">
               <div class="form-group">
               <label>Primer Nombre</label>
                 <input class="form-control" type="text"
                 required="nombre" placeholder="Nombre" name="primer_nombre1" >
                </div>
               </div>
               <div class="col-lg-6">
               <div class="form-group">
               <label>Segundo Nombre</label>
                 <input class="form-control" type="text"
                 required="nombre"  placeholder="Segundo Nombre" name="segundo_nombre2">
                </div>
               </div> 
                <div class="col-lg-6">
               <div class="form-group">
               <label>Primer Apellido</label>
                 <input class="form-control" type="text"
                 required="nombre" placeholder="Primer Apellido"  name="primer_apellido1">
                </div>
               </div> 
                <div class="col-lg-6">
               <div class="form-group">
               <label>segundo Apellido</label>
                 <input class="form-control" type="text"
                 required="apellido" placeholder="Segundo Apellido" name="segundo_apellido2">
                </div>
               </div> 
                <div class="col-lg-6">
               <div class="form-group">
               <label>Celular </label>
                 <input class="form-control" type="text"
                 required="celular"  placeholder="Celular" name="celular_aprendiz">
                </div>
               </div> 
                <div class="col-lg-6">
               <div class="form-group">
               <label>Correo</label>
                 <input class="form-control" type="correo"
                 placeholder="jesus@ejemplo.com"  name="correo_aprendiz" required>
                </div>
               </div> 
               <div class="col-lg-6">
        
                <div class="form-group">
                  <label>Ficha:<sup></sup></label>
                <select class="form-control" name="id_ficha" required="Numero" >    
               <option selected="selected"></option>
               <?php while($registro3=$registro4->fetch_assoc()){ ?>
               <option value="<?php echo $registro3['id_ficha']; ?>"><?php echo $registro3['numero_ficha']; ?></option>
               <?php } ?>
               </select>
              
                </div>
               </div>
                 <div class="col-lg-8">
                  <div class="form-group">
                    <label>formacion:<sup></sup></label>
                   <select class="form-control" name="id_formacion"  required="formacion">    
                    <option selected="selected"></option>
                    <?php while($registro6=$registro5->fetch_assoc()){ ?>
                    <option value="<?php echo $registro6['id_formacion']; ?>"><?php echo $registro6['descripcion_formacion']; ?></option>
                   <?php } ?>
                </select>
              
                 </div>
                </div> 
                   <div class="col-lg-8">
                  <div class="form-group">
                    <input type="submit" value="Registrar" class="btn btn-success" id="regi"/>
                 </div>
                </div>
              </form>
            </div>
          </div>
        </div>
             <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Generar novedades
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-desktop"></i><a href="../index3.php">BIENVENIDA</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i><a href="../admin/indexAdmincontroller.php"> Novedades Generadas</a> 
                            </li>
                            <li>
                                <i class="fa fa-search"></i> <a href="../admin/vistaaprendiz.php">Buscar y Generar novedad</a>  
                            </li>
                        </ol>
                    </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
</body>

</html>
