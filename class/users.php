<?php

class users{
	
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
                      header('Location: index1.php');
			        break;
                    case 'Admin':
                        $this->objSe->init();
                        $this->objSe->set('id_usuario', $result[0]['id_usuario']);
                        $this->objSe->set('usuario', $result[0]['usuario']);
                        $this->objSe->set('descripcion_tipo_usuario', $result[0]['descripcion_tipo_usuario']);                      
                        header('Location: index3.php');
			        break;
                    case 'Instructor':
                         $this->objSe->init();
                         $this->objSe->set('id_usuario', $result[0]['id_usuario']);
                        $this->objSe->set('id_instructor', $result[0]['id_instructor']);
                        $this->objSe->set('usuario', $result[0]['usuario']);
                        $this->objSe->set('descripcion_tipo_usuario', $result[0]['descripcion_tipo_usuario']);                        
                      header('Location: admin/index1Instructor.php');
                    break;
                }
                
            }else{
                header('Location: index.php?error=1');
            }		
	}


    public function modify_login($idUse = false){
            $objdata = new Database();
            $sth = $objdata->prepare('UPDATE tbl_usuarios SET '
                    . 'usuario = :usuario, password = :password '. 'WHERE id_usuario = :id_usuario');
                
                $sth->bindParam(':usuario', $_POST['userN']);
                $sth->bindParam(':password', $_POST['userP']);
                $sth->bindParam(':id_usuario', $idUse);
                $sth->execute();

                header('location: http://localhost:8080/proyectosena/admin/perfilInstructor.php');
            
    }
    public function modifi_foto($idUse = false, $path = false){
        $objdata = new Database();
        $sth = $objdata->prepare('UPDATE tbl_usuarios SET '.' imgUser = :imgUser '.' WHERE id_usuario = :id_usuario');
        $sth->bindParam(':imgUser', $path);
        $sth->bindParam(':id_usuario', $idUse);
        $sth->execute();

         header('location: http://localhost:8080/proyectosena/admin/perfilInstructor.php');
    }


        public function modify_data($idUse = false){
            $objdata = new Database();
            if($_POST['exists'] == 0){
                $sth = $objdata->prepare('INSERT INTO tbl_instructores VALUES '
                    . '(:id_instructor, :primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido, :celular_instructor,:correo_instructor,:id_usuario)');
                $idUserd = '';
                $sth->bindParam(':id_instructor', $idUserd);
                $sth->bindParam(':primer_nombre', $_POST['primer_nombre']);
                $sth->bindParam(':segundo_nombre', $_POST['segundo_nombre']);
                $sth->bindParam(':primer_apellido', $_POST['primer_apellido']);
                $sth->bindParam(':segundo_apellido', $_POST['segundo_apellido']);
                $sth->bindParam(':celular_instructor', $_POST['celular_instructor']);
                $sth->bindParam(':correo_instructor', $_POST['correo_instructor']);
                $sth->bindParam(':id_usuario', $idUse);
                
                $sth->execute();

                header('http://localhost:8080/proyectosena/admin/perfilInstructor.php');
            }else{
                $sth = $objdata->prepare('UPDATE tbl_instructores SET '
                    . 'primer_nombre = :primer_nombre, segundo_nombre = :segundo_nombre ,primer_apellido = :primer_apellido ,segundo_apellido = :segundo_apellido, celular_instructor = :celular_instructor, correo_instructor = :correo_instructor '
                    . 'WHERE id_usuario = :id_usuario');
                
                $sth->bindParam(':primer_nombre', $_POST['primer_nombre']);
                $sth->bindParam(':segundo_nombre', $_POST['segundo_nombre']);
                $sth->bindParam(':primer_apellido', $_POST['primer_apellido']);
                $sth->bindParam(':segundo_apellido', $_POST['segundo_apellido']);
                $sth->bindParam(':celular_instructor', $_POST['celular_instructor']);
                $sth->bindParam(':correo_instructor', $_POST['correo_instructor']);
                $sth->bindParam(':id_usuario', $idUse);  
                $sth->execute();
                header('http://localhost:8080/proyectosena/admin/perfilInstructor.php');
            }
        }
    
	
}

?>