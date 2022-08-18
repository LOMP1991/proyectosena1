<?php 
include('../conneion.php');
$query1 ="SELECT tbl_tipo_usuarios.id_tipo_usuario,tbl_tipo_usuarios.descripcion_tipo_usuario FROM tbl_tipo_usuarios";
    $registro4=$conn->query($query1);
  
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Regitrar se en el Sistema</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,maximum-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../estilo.css">
	
</head>
<body>
<div class="container">
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" name="nuevo_usuario" action="../admin/guarda_usu.php">
         
     
          <img src="../img/senalogo.jpg" class="img-responsive" alt="" />

          <input type="text" name="usuario"  maxlength="50"  placeholder="SU USUARIO"  class="form-control input-lg"/>
          <br></br>
          <input class="form-control input-lg" type="password" name="password" id="passwd" maxlength="10"  placeholder="PASSWORD" required="" />
          <br></br>
                <select class="form-control" name="id_tipo_usuario" required="tipo" >    
               <option selected="selected">TIPO DE USUARIO</option>
               <?php while($registro3=$registro4->fetch_assoc()){ ?>
               <option value="<?php echo $registro3['id_tipo_usuario']; ?>"><?php echo $registro3['descripcion_tipo_usuario']; ?></option>
               <?php } ?>
               </select>
          <br></br>
          <button type="submit" name="registro"  value="Enter" class="btn btn-lg btn-primary btn-block">Registrarme</button>
        </form>
        
      </section>  
      </div>
     
      <div class="col-md-4"></div>
      

 </div>
  
  <p>
    
    <br>
   <center><a href="../index3.php">Regresar</a></center> 
    <br>
  </p>     
</div>
</body>
</html>