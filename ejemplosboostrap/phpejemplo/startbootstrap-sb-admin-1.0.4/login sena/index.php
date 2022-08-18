
<?php
// Evitar los warnings the variables no definidas!!!
$err = isset($_GET['error']) ? $_GET['error'] : null ;

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,maximum-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	
</head>
<body>
<div class="container">
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" name="user" action="session_init.php" role="login">
      <?php if($err==1){
        echo "Usuario o Contraseña Erróneos <br />";
      }
      if($err==2){
        echo "Debe iniciar sesion para poder acceder el sitio. <br />";
      }
      ?>
          <img src="img/senalogo.jpg" class="img-responsive" alt="" />
          <input type="text" name="usern" id="usern" maxlength="50"  placeholder="Usuario"  class="form-control input-lg"/>
          
          <input class="form-control input-lg" type="password" name="passwd" id="passwd" maxlength="10"  placeholder="Password" required="" />
          
          
          
          
          
          <button type="submit" name="enter" id="enter" value="Enter" class="btn btn-lg btn-primary btn-block">Iniciar</button>
          <div>
            <a href="#">Crear Cuenta</a>
          </div>
          
        </form>
        
      </section>  
      </div>
      
      <div class="col-md-4"></div>
      

 </div>
  
  <p>
    
    <br>
   <center><a href="#">Sena</a></center> 
    <br>
  </p>     
</div>
</body>
</html>

