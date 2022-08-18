<?php

class Files{
    
    public function __construct() { }
    
    //funcion que me arme y verifique la ruta de los avatares
    
    public function fix_path($idUser){
        $path = '../img' . $idUser . '/';
        if(file_exists($path)){
            //echo "la ruta ya existe.";
            return $path;
        }  else {
            if(!mkdir($path,0755,TRUE)){
                echo "Fallo al crear la ruta";
            }else{
                return $path;
            }
        }
    }
    
    public function change_name(){
        $string = "";
        $posible = "1234567890ABCDEFGHIJKLMNOPQRSTVWXYZabcdefghijklmnopqrstuvwxyz_";
        $i = 0;
        while($i < 18){
            $char = substr($posible, mt_rand(0, strlen($posible)-1),1);
            $string .= $char;
            $i++;
        }
        
        return $string;
    }
    
    public function upload_file($file = false, $path = false){
        //Verificar que si se haya recibido el archivo.
        
        $upload = TRUE;
        
        if($_FILES['userF']['error'] > 0){
            echo "Error al Cargar el Archivo: " . $_FILES['userF']['name'];
            $upload = FALSE;
        }  else {
            //Verificar el tamaño del archivo
            if($_FILES['userF']['size'] > 2000000){
                echo "El tamaño del Archivo no puede ser Superior a 2MB";
                $upload = FALSE;
            }
            //verificamos el formato del archivo
            if(!($_FILES['userF']['type'] === "image/jpeg" || $_FILES['userF']['type'] === "image/gif" || $_FILES['userF']['type'] === "image/png")){
                echo "Formato de archivo no permitido";
                $upload = FALSE;
            }
        }
        
        if($upload){
            $type = explode('.', $_FILES['userF']['name']);
            $num = count($type);
            $extension = $type[$num-1];
            
            $real_file = $path.$file.'.'.$extension;
            
            if(file_exists($real_file)){
                move_uploaded_file($_FILES['userF']['tmp_name'], $real_file);
                return $real_file;
            }else{
                move_uploaded_file($_FILES['userF']['tmp_name'], $real_file);
                return $real_file;
            }
            
        }
        
        
        
    }
    
}

