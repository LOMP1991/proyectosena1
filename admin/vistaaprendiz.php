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
    
    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

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
                <a class="navbar-brand" href="../index3.php">BIENVENIDA</a>
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
                            <a href="log_out.php"><i class="fa fa-fw fa-power-off"></i>Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a href="../index3.php"><i class="fa fa-fw fa-desktop"></i>GESTION DE NOVEDADES</a>
                    </li>
                    <li>
                        <a href="indexAdmincontroller.php"><i class="fa fa-fw fa-edit"></i>Novedades Generadas</a>
                    </li>
                    <li class="active">
                        <a href="vistaaprendiz.php"><i class="fa fa-fw fa-edit"></i>Buscar y Generar Novedad</a>
                    </li>
                    <li>
                     <a href="../admin/registroAprendiz.php"><i class="fa fa-fw fa-edit"></i>Registro De Aprendiz</a>
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
        <div class="row">
         <div class="col-lg-5">
            <div class="form-group"><input class="form-control" type="text" placeholder="Busca un Aprendiz Por: Nombre :" id="bs-prod"/>
            </div>
          </div>

        </div>
        <div class="row">
         <div class="col-lg-8">
         <div class="form-group">
          <H1>Registre Novedad</H1>
          
          </div>
          </div>
        </div>
        
          <?php 
          include('../conneion.php');
            $registro ="SELECT * FROM tbl_aprendices tf INNER JOIN tbl_fichas t ON t.id_ficha = tf.id_ficha INNER JOIN tbl_formacion f ON tf.id_formacion = f.id_formacion ORDER BY id_aprendiz ";

            $registro2 = $conn->query($registro);

           ?>
            <!-- MODAL PARA EL REGISTRO DE PRODUCTOS-->
                  <div class="registros" id="agrega-registros"></div>
          
            <div class="modal fade" id="registra-novedad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                         <h4 class="modal-title" id="myModalLabel"><b>Registra o Edita un Novedad</b></h4>
                        </div>
                        <form id="formulario" class="formulario" onsubmit="return agregaNovedades();">
                            <div class="modal-body">
                    <table border="0" width="100%">
                     <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-novedad" name="id_novedad"  style="visibility:hidden; height:5px;"/></td>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-complejo" name="id_complejo"  style="visibility:hidden; height:5px;"/></td>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-motivo" name="id_motivo"  style="visibility:hidden; height:5px;"/></td>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-tipo-novedad" name="id_tipo_novedad"  style="visibility:hidden; height:5px;"/></td>
                    </tr>
                    <div class="col-lg-8">
                     <div class="form-group">
                        <label>Proceso: </label>
                        <input class="form-control"  type="text" required="required" readonly="readonly" id="pro" name="pro"/>
                    </div>
                    </div>

    <div class="col-lg-5">
        <div class="form-group">
           <?php while($registro3=$registro2->fetch_assoc()){ ?>
              <label>Nombre del Aprendiz:</label>
              <input class="form-control" id="primer-nombre" name="primer_nombre1" type="text" value="<?php echo $registro3['primer_nombre1']; ?>"readonly="readonly"/>
              <label>Segundo Nombre:</label>
              <input class="form-control" id="segundoN-apr" name="segundo_nombre2" value="<?php echo $registro3['segundo_nombre2']; ?>" readonly="readonly"/>
              <label>Primer Apellido:</label>
              <input class="form-control" id="primerApe-apr" name="primer_apellido1" value="<?php echo $registro3['primer_apellido1']; ?>" readonly="readonly"/>
              <label>Segundo Apellido:</label>
              <input class="form-control" id="segundoApe-apr" name="segundo_apellido2" value="<?php echo $registro3['segundo_apellido2']; ?>" readonly="readonly"/>
              <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-aprendiz" name="id_aprendiz"  style="visibility:hidden; height:5px;"/></td>
              <?php } ?>
        </div>
    </div>
    <div class="col-lg-7">
    <div class="form-group">

        <label>Nombre del Instructor:</label>
        <input class="form-control" type="text" required="required" readonly="readonly" name="primer_nombre" id="primer-Nom" value="<?php echo " " . $_SESSION['usuario'];?>" />
        <label>Segundo Nombre:</label>
        <input class="form-control" type="text" required="required" readonly="readonly" name="segundo_nombre" id="segundo-Nom" value="<?php echo $registro3[0]['segundo_nombre'];?>" />
        <label>Primer Apellido:</label>
        <input class="form-control" type="text" required="required" readonly="readonly" name="primer_apellido" id="primer-apell" value="<?php echo $registro3[0]['primer_apellido'];?>" />
        <label>Segundo Apellido:</label>
        <input class="form-control" type="text" required="required" readonly="readonly" name="segundo_apellido" id="segundo-apell" value="<?php echo $registro3[0]['segundo_apellido'];?>" />
         <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-instructor" name="id_instructor"  style="visibility:hidden; height:5px;"/></td>
         <input type="hidden" name="id_usuario" value="<?php echo $idUse;?>" />
    </div>
    </div>
    <div class="col-lg-8">
        <div class="form-group">
            <label>Tipo de Novedad</label>
            <input class="form-control" id="descripcion-tipo-novedad" name="descripcion_tipo_novedad"  placeholder="">
        </div>
        <div class="form-group">
        <label> Motivo </label>
        <textarea class="form-control"  id="descripcion_motivo"  name="descripcion_motivo" required="motivo"></textarea>
        </div>
    </div>
         <tr>
            <td colspan="2">
            <div id="mensaje"></div>
            </td>
        </tr>
        </table> 
            </div>
                <div class="modal-footer">
                 <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                 <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
                </div>
    </form>
    </div> 
    </div>

    </div>

</div>
 </div>
</body>
</html>
