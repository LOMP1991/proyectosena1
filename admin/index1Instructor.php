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

//conectamos a la base de datos

require'../conneion.php';

    //$sql ='SELECT * FROM tbl_aprendices tf INNER JOIN tbl_fichas t ON t.id_ficha = tf.id_ficha INNER JOIN tbl_formacion f ON tf.id_formacion = f.id_formacion ORDER BY id_aprendiz';
     
   
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

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

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
                <a class="navbar-brand" href="index1Instructor.php">BIENVENIDA </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>BIENVENID@ <?php echo " " . $_SESSION['usuario'];?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="perfilInstructor.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../log_out.php"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="../admin/index1Instructor.php"><i class="fa fa-fw fa-desktop"></i>GESTION DE NOVEDADES</a>
                    </li>
                    <li>
                        <a href="../admin/forms.php"><i class="fa fa-fw fa-edit"></i>Mis Novedades Generadas</a>
                    </li>
                     <li>
                    <a href=""><i class="fa fa-fw fa-edit"></i>Buscar Y Generar Novedades</a>
                    </li>
                    <li>
                        <a href="">Registro De Aprendiz</a>
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
                           BIENVENID@ <small> GESTION DE NOVEDADES DE APREDIZ! </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-desktop"></i> BIENVENIDA
                            </li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                   
                    <div class="col-lg-15">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user fa-fw"></i> Control De Aprendices</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                <?php  
                                $url = "http://localhost:8080/proyectosena/admin/index1Instructor.php";

$consulta_aprendiz = "SELECT * FROM tbl_aprendices";
$rs_deaprendiz = $conn->query($consulta_aprendiz);
$num_total_registros =mysqli_num_rows($rs_deaprendiz );

//Si hay registros
if ($num_total_registros > 0) {
    //Limito la busqueda
    $TAMANO_PAGINA = 10;
        $pagina = false;

    //examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
        
    if (!$pagina) {
        $inicio = 0;
        $pagina = 1;
    }
    else {
        $inicio = ($pagina - 1) * $TAMANO_PAGINA;
    }
    //calculo el total de paginas
    $total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
    //pongo el numero de registros total, el tamaño de pagina y la pagina que se muestra
    echo '<h3>Total de Aprendices: '.$num_total_registros .'</h3>';
    echo '<h3>En cada pagina de '.$TAMANO_PAGINA.' se muestra los Aprendices registrados.</h3>';
    echo '<h3>Mostrando la pagina '.$pagina.' de ' .$total_paginas.' paginas.</h3>';
    $consulta = "SELECT * FROM tbl_aprendices tf INNER JOIN tbl_fichas t ON t.id_ficha = tf.id_ficha INNER JOIN tbl_formacion f ON tf.id_formacion = f.id_formacion ORDER BY id_aprendiz LIMIT ".$inicio."," . $TAMANO_PAGINA;
    $rs =$conn->query($consulta);



                                 echo "<table class='table table-bordered table-hover table-striped'>";
                                   echo  '<thead>';
                                           echo '<tr>';
                                                echo'<th>ID</th>';
                                                echo'<th>Nombre</th>';
                                                echo'<th>Segundo Nombre</th>';
                                                echo'<th>Primer Apellido</th>';
                                                echo'<th>Segundo  Apellido</th>';
                                               echo' <th>Celular</th>';
                                               echo' <th>Correo</th>';
                                              echo'  <th>ficha</th>';
                                              echo'  <th>formacion</th>';
                                                
                                           echo' </tr>';
                                       echo' </thead>';
                                      echo'  <tbody>';
                                          while ($row = mysqli_fetch_assoc($rs)) {
                                           echo '<tr>';
                                               echo '<td>'.$row['id_aprendiz'].'</td>';
                                               echo '<td>'. $row['primer_nombre1'].'</td>';
                                               echo '<td>'.$row['segundo_nombre2'].'</td>';
                                                echo'<td>'. $row['primer_apellido1'].'</td>';
                                               echo '<td>'.$row['segundo_apellido2'].'</td>';
                                               echo '<td>'.$row['celular_aprendiz'].'</td>';
                                               echo '<td>'.$row['correo_aprendiz'].'</td>';
                                               echo '<td>'. $row['numero_ficha'].'</td>';
                                               echo'<td>'.$row['descripcion_formacion'].'</td>';
                                           echo '</tr>';
                                            } 
                                       echo '</tbody>';
                                    echo'</table>';
                                    echo '<p>';
    if ($total_paginas > 1) {
        if ($pagina != 1)
            
            echo '<ul class="pagination"><li class="disable"><a href="'.$url.'?pagina='.($pagina-1).'">&laquo;<span class="sr-only">Anterio</span></a></li></ul>';
        for ($i=1;$i<=$total_paginas;$i++) {
            if ($pagina == $i)
                
                 echo '<ul class="pagination"><li class="active"><a href="">'.$pagina.'</a></li></ul>';
                 else
                  echo '<ul class="pagination"><li class="default"><a href="'.$url.'?pagina='.$i.'">'.$i.'</a></li></ul>';
                  
        }
        if ($pagina != $total_paginas)
          
           echo '<ul class="pagination"><li><a href="'.$url.'?pagina='.($pagina+1).'">&raquo;<span class="sr-only">Siguiente</span></a></li></ul>';
          
    }
}
?> 
    </div>
        <div class="text-right">
            <a href="#">Registrar Novedades<i class="fa fa-arrow-circle-right"></i></a>
        </div>
        </div>
        </div>
        </div>
       </div>
        </div>
  </div>
    </div>
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
