<?php
//Controlando el inicio de la sesión
require'../class/sessions.php';
$objses = new Sessions();
$objses->init();
$nameU = $objses->get('usuario');
$idUse = $objses->get('id_instructor');
$user = isset($nameU) ? $nameU : null ;

if($user == ''){
    header('Location: http://localhost:8080/proyectosena/ejemplosboostrap/login%20sena/users/index.php?error=2');
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
                <a class="navbar-brand" href="index1.php">BIENVENIDA</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo " " . $_SESSION['usuario'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="admin/perfilInstructor.php"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Configurar</a>
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
                    <li>
                        <a href="index1.php"><i class="fa fa-fw fa-desktop"></i> BIENVENIDA</a>
                    </li>
                    <li class="active">
                        <a href="forms.php"><i class="fa fa-fw fa-edit"></i>Generar novedades</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Menu <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Registro De Instructores</a>
                            </li>
                            <li>
                                <a href="#">Registro De Aprendiz</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> mantenimiento calmado </a>
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
         <div class="col-lg-5">
            <div class="form-group"><input class="form-control" type="text" placeholder="Busca un Aprendiz Por: Nombre o CC:" id="bs-prod"/>
            </div>
          </div>

        </div>
        <div class="row">
         <div class="col-lg-5">
          <div class="form-group"><a target="_blank" href="javascript:reportePDF();" class="btn btn-danger">Exportar noveda a PDF</a></div>
          </div>
        </div>
        <div class="row">
         <div class="col-lg-8">
         <div class="form-group">
          <H1>Registre noveda</H1>
          <button id="nuevo-novedad" class="btn btn-primary">Nuevo</button>
          </div>
          </div>
        </div>
        <div class="row">
         <div class="col-lg-9">
         <div class="form-group">
          <?php
          require'../class/database.php';
           $objData = new Database(); 
           $sth1 = $objData->prepare('SELECT * FROM tbl_novedades NM INNER JOIN tbl_motivo O ON O.id_motivo=NM.id_motivo INNER JOIN tbl_tipo_novedades T ON NM.id_tipo_novedad=t.id_tipo_novedad INNER JOIN tbl_aprendices A ON NM.id_aprendiz=A.id_aprendiz INNER JOIN tbl_instructores I ON NM.id_instructor=I.id_instructor INNER JOIN tbl_complejo C ON NM.id_complejo=C.id_complejo');
             $sth1->bindParam(':id_instructor',$idUse);
             $sth1->execute();
             $registro2= $sth1->fetchAll();
          //CREAMOS NUESTRA VISTA Y LA DEVOLVEMOS AL AJAX
  
echo '<table class="table table-striped table-condensed table-hover">
            <tr>
                <th width="960">Instructor</th>
                <th width="960">Aprendiz</th>
                <th width="300">tipo de novedad</th>
                <th width="150">Motivo</th>
                <th width="150">complejo</th>
                <th width="150">UBICACION</th>
                <th width="50">Opciones</th>
            </tr>';


     foreach ($registro2 as $registro3 =>$sth1 ) {
        echo '<tr>
                <td>'.$registro2[0]['primer_nombre'].' </td>
                <td>'.$registro2[0]['primer_nombre1'].' </td>
                <td>'.$registro2[0]['descripcion_tipo_novedad'].' </td>
                <td> '.$registro2[0]['descripcion_motivo'].'</td>
                </tr>';
    }
    //if ($registro2) {
        //echo '<tr>
                //<td> '.$registro2[0]['descripcion_motivo'].'</td>
                //</tr>';
    //}
    //while($registro3 = $registro2->fetch_array()){
        //echo '<tr>
                //<td>'.$registro3['primer_nombre'].' '.$registro3['segundo_nombre'].' '.$registro3['primer_apellido'].' '.$registro3['segundo_apellido'].'</td>
                //<td>'.$registro3['primer_nombre1'].' '.$registro3['segundo_nombre2'].' '.$registro3['primer_apellido1'].' '.$registro3['segundo_apellido2'].'</td>
                //<td>'.$registro3['descripcion_tipo_novedad'].'</td>
                //<td>'.$registro3['descripcion_motivo'].'</td>
                //<td>'.$registro3['nombre_complejo'].'</td>
               //<td>'.$registro3['direccion_complejo'].'</td>
                //<td><a href="javascript:editarProducto('.$registro3['id_novedad'].');" class="glyphicon glyphicon-edit"></a> <a href="javascript:eliminarProducto('.$registro3['id_novedad'].');" class="glyphicon glyphicon-remove-circle"></a></td>
                //</tr>';
    //}
echo '</table>';

           ?>
           </div>
          </div>
        </div>
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
                    </tr>
                     <div class="form-group">
                        <label>Proceso: </label>
                        <input class="form-control"  type="text" required="required" readonly="readonly" id="pro" name="pro"/>
                    </div>
                    <div class="form-group">
                       <label>Nombre del Aprendiz:</label>
                       <input class="form-control"  type="text" required="required" name="id_aprendiz" id="id-aprendiz" value="<?php echo $registro3['id_aprendiz'];?>" readonly="readonly">     
                    </div>
                    <div class="form-group">
                       <label>Nombre del Instructor:</label>
                        <input class="form-control" type="text" required="required" readonly="readonly" name="id_instructor" id="id-instructor" value="<?php echo $registro3[0]['id_instructor'];?>" />
                    </div>
                    <div class="form-group">
                        <label>Motivo</label>
                        <input class="form-control" id="id-motivo" name="id_motivo"placeholder="Motivo">
                    </div>
                    <div class="form-group">
                        <label>Tipo de Novedad</label>
                        <textarea class="form-control" placeholder="Novedad" rows="3" id="id-tipo-novedad" name="id_tipo_novedad" required="novedad"></textarea>
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
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
</body>

</html>
