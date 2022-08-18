<?php

class Sessions{
	
	public function __construct(){ }
	
        //INIT que es para iniciar las sesiones.
	public function init(){
		@session_start();
	}
	
        //SET nos permite inicializar las variables de Session a utilizar!
	public function set($varname, $value){
		
            // $varname = este sera el nombre de nuestra variable de sesiòn
            // $value = el valor que tendrá nuestra variable de sesión.
            
            $_SESSION[$varname] = $value;
		
	} 
	    public function get ($vername){
	    	return $_SESSION[$vername];
	    }
	
        //DESTROY es para quitar las variables previamente creadas y destruir la sesión.
        
	public function destroy(){
		
		session_unset();
		session_destroy();
		
	}
	
}

?>