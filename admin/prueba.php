
<?php

 //SELECT id_complejo,nombre_complejo,direccion_complejo FROM tbl_complejo WHERE id_complejo=id_complejo
include('../conneion.php');
$query1 ="SELECT id_complejo,nombre_complejo,direccion_complejo FROM tbl_complejo";
$registro2=$conn->query($query1);  
?>
<!DOCTYPE html>
    <html>
    <head>
    	<title>prueba select</title>
    </head>
    <body>
    <label>complejo:<sup></sup><label/> 
   
              
               <select name="id_complejo">    
               <option value="" selected="selected">selecione</option>
               <?php while($registro3=$registro2->fetch_assoc()){ ?>
               <option value="<?php echo $registro3['id_complejo']; ?>"><?php echo $registro3['nombre_complejo']; ?></option>
              <?php } ?>
    </body>
    </html>