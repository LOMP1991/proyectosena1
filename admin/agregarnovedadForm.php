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
	$id_aprendiz =$_GET['id'];
	$query ="SELECT primer_nombre1,segundo_nombre2,primer_apellido1,segundo_apellido2 FROM tbl_aprendices WHERE id_aprendiz='$id_aprendiz'";
    $resultado=$conn->query($query);

	$registro2=$resultado->fetch_assoc();

	$query1 ="SELECT id_complejo,nombre_complejo,direccion_complejo FROM tbl_complejo";
    $registro4=$conn->query($query1);  	
	//conectamos a la base de datos
require'../class/database.php';
$objData = new Database();
$sth1 = $objData->prepare('SELECT * FROM  tbl_Admincontroller WHERE id_usuario = :id_usuario ');
$sth1->bindParam(':id_usuario', $idUse);
$sth1->execute();
$result1 = $sth1->fetchAll();
$sth1 = $objData->prepare('SELECT * FROM  tbl_instructores WHERE id_usuario = :id_usuario');
$sth1->bindParam(':id_usuario', $idUse);
$sth1->execute();
$result2 = $sth1->fetchAll();


	
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
                <a class="navbar-brand" href="index1.php">BIENVENIDA</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo " " . $_SESSION['usuario'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="admin/perfilInstructor.php"><i class="fa fa-fw fa-user"></i> Perfil</a>
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
                    <li class="active">
                        <a href="index1.php"><i class="fa fa-fw fa-desktop"></i>GESTION DE NOVEDADES</a>
                    </li>
                    <li>
                        <a href="indexAdmincontroller.php"><i class="fa fa-fw fa-edit"></i>Novedades Generadas</a>
                    </li>
                    <li>
                      <a href="vistaaprendiz.php"><i class="fa fa-fw fa-edit"></i>Buscar Y Generar Novedades</a>
                    </li>
                     <li>
                        <a href="../admin/registroAprendiz.php">Registro De Aprendiz</a>
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
                                <i class="fa fa-desktop"></i>  <a href="index1.php">BIENVENIDA</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Generar novedades
                            </li>
                        </ol>
                    </div>
                </div>
        <div class="row">
         <div class="col-lg-8">
         <div class="form-group">
          <!--H1>Registre noveda</H1>
          <!button id="nuevo-novedad" class="btn btn-primary">Nuevo</button!-->
          </div>
          </div>
        </div>
        <div class="row">
         <div class="col-lg-9">
         <div class="form-group">
         <div class="registros" id="agrega-registros"></div>
              <form id="formulario" class="formulario" onsubmit="return agregaNovedades();">
                            <div class="modal-body">
                    <table border="0" width="100%">
                    <tr>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-novedad" name="id_novedad"  style="visibility:hidden; height:5px;"/></td>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-motivo" name="id_motivo"  style="visibility:hidden; height:5px;"/></td>
                        <td colspan="2"><input type="text" required="required" readonly="readonly" id="id-tipo-novedad" name="id_tipo_novedad"  style="visibility:hidden; height:5px;"/></td>
                    </tr>
                    <div class="col-lg-8">
                     <div class="form-group">
                        <label>Proceso: </label>
                        <input class="form-control"  type="text" required="required" readonly="readonly" id="pro" value="Registro"  name="pro" />
                    </div>
                    </div>

    <div class="col-lg-5">
        <div class="form-group">
            <label>Nombre del Aprendiz:</label>
            <input class="form-control" id="primer-nombre" name="primer_nombre1" type="text" value="<?php echo $registro2['primer_nombre1']; ?>"readonly="readonly"/>
            <label>Segundo Nombre:</label>
            <input class="form-control" id="segundoN-apr" name="segundo_nombre2" value="<?php echo $registro2['segundo_nombre2']; ?>" readonly="readonly"/>
            <label>Primer Apellido:</label>
            <input class="form-control" id="primerApe-apr" name="primer_apellido1" value="<?php echo $registro2['primer_apellido1']; ?>" readonly="readonly"/>
            <label>Segundo Apellido:</label>
            <input class="form-control" id="segundoApe-apr" name="segundo_apellido2" value="<?php echo $registro2['segundo_apellido2']; ?>" readonly="readonly"/>
            <input type="hidden"  name="id_aprendiz" value="<?php echo $id_aprendiz;?>" />
        </div>
    </div>
    <div class="col-lg-7">
    <div class="form-group">

        <label>Nombre del Instructor:</label>
        <?php
        if($result1){?>
        <input class="form-control"  type="text" name="primer_nombre" readonly="readonly" value="<?php echo $result1[0]['Nombre'];?>" /><br>
         <?php
        }else{?>
            <input type="text" class="form-control"  name="primer_nombre" readonly="readonly" value="<?php echo $result2[0]['primer_nombre'].'  '.$result2[0]['segundo_nombre'];?>" /><br>
             <?php
        }
        ?>
        <label>Apellidos:</label>
        <?php
        if($result1){?>
        <input class="form-control"  type="text" name="primer_nombre" readonly="readonly" value="<?php echo $result1[0]['Apellidos'];?>" /><br>
         <?php
        }else{?>
            <input type="text" class="form-control"  name="primer_nombre" readonly="readonly" value="<?php echo $result2[0]['primer_apellido'];?>" /><br>
             <?php
        }
        ?>
        <label>Segundo Apellido:</label>
        <?php
        if($result1){?>
        <input class="form-control"  type="text" name="primer_nombre" readonly="readonly" value="<?php echo $result1[0]['segundo_apellido'];?>" /><br>
         <?php
        }else{?>
            <input type="text" class="form-control"  name="primer_nombre" readonly="readonly" value="<?php echo $result2[0]['segundo_apellido'];?>" /><br>
             <?php
        }
        ?>
        <input type="hidden"  name="id_instructor" value="<?php echo $result2[0]['id_instructor']; ?>"/>
        <input type="hidden"  name="id_usuario_novedad" value="<?php echo $idUse;?>"/>
    </div>
    </div>
     <div class="col-lg-8">
        
        <div class="form-group">
            <label>Complejo:<sup></sup></label>
            <select class="form-control" name="id_complejo" required="complejo" >    
               <option selected="selected"></option>
               <?php while($registro3=$registro4->fetch_assoc()){ ?>
               <option value="<?php echo $registro3['id_complejo']; ?>"><?php echo $registro3['nombre_complejo']; ?></option>
               <?php } ?>
             </select>
              
        </div>
    </div>
    <div class="col-lg-8">
        
        <div class="form-group">
            <label>Tipo de Novedad</label>
            <input class="form-control"  name="descripcion_tipo_novedad" required="motivo" />
        </div>
        <div class="form-group">
        <label> Motivo </label>
        <textarea class="form-control"    name="descripcion_motivo"   required="motivo"></textarea>
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
                 <input type="submit" value="Registrar" class="btn btn-success"/>
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
                                <i class="fa fa-desktop"></i>  <a href="index1.php">BIENVENIDA</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Generar novedades
                            </li>
                        </ol>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>