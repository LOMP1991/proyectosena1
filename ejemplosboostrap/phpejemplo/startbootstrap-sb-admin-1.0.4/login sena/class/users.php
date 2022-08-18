<?php

class Users{
	
	public $objDb;
	public $objSe;
	public $result;
	public $rows;
	public $useropc;
	
	public function __construct(){
		
		$this->objDb = new Database();
		$this->objSe = new Sessions();
		
	}
	
	public function login_in(){
		
            $sth = $this->objDb->prepare('SELECT * FROM tbl_usuarios U inner join tbl_tipo_usuarios P '
                    . 'on U.id_tipo_usuario = P.id_tipo_usuario WHERE U.usuario = :login AND U.password = :pass');
            
            $sth->bindParam(':login', $_POST["usern"]);
            $sth->bindParam(':pass', $_POST["passwd"]);
            
            $sth->execute();
            
            $result = $sth->fetchAll();
            
            if($result){
                
                $profile = $result[0]['descripcion_tipo_usuario'];
                
                switch($profile){
                    case 'Standard':
                        $this->objSe->init();
                        $this->objSe->set('id_usuario', $result[0]['id_usuario']);
                        $this->objSe->set('usuario', $result[0]['usuario']);
                        $this->objSe->set('descripcion_tipo_usuario', $result[0]['descripcion_tipo_usuario']);
                        $this->objSe->set('id_tipo_usuario', $result[0]['id_tipo_usuario']);                        
                        //echo "Ha ingresado como Usuario Standard";
                        //echo '<br><a href="log_out.php">Cerrar</a></br>';
                      header('Location:../index1.php');
			break;
                    case 'Admin':
                        $this->objSe->init();
                        $this->objSe->set('idUser', $result[0]['id_usuario']);
                        $this->objSe->set('usuario', $result[0]['usuario']);
                        $this->objSe->set('descripcion_tipo_usuario', $result[0]['descripcion_tipo_usuario']);
                        $this->objSe->set('id_tipo_usuario', $result[0]['id_tipo_usuario']);                        
                        echo "Ha ingresado como Usuario Administrador";
                        echo '<br><a href="log_out.php">Cerrar</a></br>';
                        //header('Location: admin/index.php');
			break;
                }
                
            }else{
                header('Location: index.php?error=1');
            }		
	}


    public function modify_login($idUse = false, $path = false){
            $objdata = new Database();
            $sth = $objdata->prepare('UPDATE tbl_usuarios SET '
                    . 'usuario = :usuario, password = :password, '
                    . 'imgUser = :imgUser '
                    . 'WHERE id_usuario = :id_usuario');
                
                $sth->bindParam(':usuario', $_POST['userN']);
                $sth->bindParam(':password', $_POST['userP']);
                $sth->bindParam(':imgUser', $path);
                $sth->bindParam(':id_usuario', $idUse);
                
                $sth->execute();

                header('location: http://localhost:8080/proyectosena/ejemplosboostrap/phpejemplo/startbootstrap-sb-admin-1.0.4/login sena/user/profile.php');
            
        }


        public function modify_data($idUse = false){
            $objdata = new Database();
            if($_POST['exists'] == 0){
                $sth = $objdata->prepare('INSERT INTO tbl_aprendices VALUES '
                    . '(:id_aprendiz, :primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido, :celular_aprendiz,:correo_aprendiz,:id_usuario)');
                $idUserd = '';
                $sth->bindParam(':id_aprendiz', $idUserd);
                $sth->bindParam(':primer_nombre', $_POST['primer_nombre']);
                $sth->bindParam(':segundo_nombre', $_POST['segundo_nombre']);
                $sth->bindParam(':primer_apellido', $_POST['primer_apellido']);
                $sth->bindParam(':segundo_apellido', $_POST['segundo_apellido']);
                $sth->bindParam(':celular_aprendiz', $_POST['celular_aprendiz']);
                $sth->bindParam(':correo_aprendiz', $_POST['correo_aprendiz']);
                $sth->bindParam(':id_usuario', $idUse);
                
                $sth->execute();

                header('http://localhost:8080/proyectosena/ejemplosboostrap/phpejemplo/startbootstrap-sb-admin-1.0.4/login sena/user/profile.php');
            }else{
                $sth = $objdata->prepare('UPDATE tbl_aprendices SET '
                    . 'primer_nombre = :primer_nombre, segundo_nombre = :segundo_nombre ,primer_apellido = :primer_apellido ,segundo_apellido = :segundo_apellido, celular_aprendiz = :celular_aprendiz, correo_aprendiz = :correo_aprendiz '
                    . 'WHERE id_usuario = :id_usuario');
                
                $sth->bindParam(':primer_nombre', $_POST['primer_nombre']);
                $sth->bindParam(':segundo_nombre', $_POST['segundo_nombre']);
                $sth->bindParam(':primer_apellido', $_POST['primer_apellido']);
                $sth->bindParam(':segundo_apellido', $_POST['segundo_apellido']);
                $sth->bindParam(':celular_aprendiz', $_POST['celular_aprendiz']);
                $sth->bindParam(':correo_aprendiz', $_POST['correo_aprendiz']);
                $sth->bindParam(':id_usuario', $idUse);
                
                $sth->execute();

                header('location: http://localhost:8080/PDO/MODIFICARUSUARIOS/users/user/profile.php');
            }
        }
    
	
}

?>