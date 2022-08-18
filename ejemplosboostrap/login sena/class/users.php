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
                        header('Location: user/index.php');
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
            $sth = $objdata->prepare('UPDATE users SET '
                    . 'loginUsers = :loginUsers, passUsers = :passUsers, '
                    . 'emailUser = :emailUser, path_imgUser = :path_imgUser '
                    . 'WHERE idUsers = :idUsers');
                
                $sth->bindParam(':loginUsers', $_POST['userN']);
                $sth->bindParam(':passUsers', $_POST['userP']);
                $sth->bindParam(':emailUser', $_POST['userC']);
                $sth->bindParam(':path_imgUser', $path);
                $sth->bindParam(':idUsers', $idUse);
                
                $sth->execute();

                header('location: http://localhost:8080/PDO/MODIFICARUSUARIOS/users/user/profile.php');
            
        }


        public function modify_data($idUse = false){
            $objdata = new Database();
            if($_POST['exists'] == 0){
                $sth = $objdata->prepare('INSERT INTO user_data VALUES '
                    . '(:id_data, :names, :bornin, :country, :city, :idUsers)');
                $idUserd = '';
                $sth->bindParam(':id_data', $idUserd);
                $sth->bindParam(':names', $_POST['names']);
                $sth->bindParam(':bornin', $_POST['date']);
                $sth->bindParam(':country', $_POST['country']);
                $sth->bindParam(':city', $_POST['city']);
                $sth->bindParam(':idUsers', $idUse);
                
                $sth->execute();

                header('location: http://localhost:8080/PDO/MODIFICARUSUARIOS/users/user/profile.php');
            }else{
                $sth = $objdata->prepare('UPDATE user_data SET '
                    . 'names = :names, bornin = :bornin, country = :country, city = :city '
                    . 'WHERE idUsers = :idUsers');
                
                $sth->bindParam(':names', $_POST['names']);
                $sth->bindParam(':bornin', $_POST['date']);
                $sth->bindParam(':country', $_POST['country']);
                $sth->bindParam(':city', $_POST['city']);
                $sth->bindParam(':idUsers', $idUse);
                
                $sth->execute();

                header('location: http://localhost:8080/PDO/MODIFICARUSUARIOS/users/user/profile.php');
            }
        }
    
	
}

?>