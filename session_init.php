<?php

//nos conectamos a la base de datos

require'class/database.php';
require'class/sessions.php';

require'class/users.php';
$objuser = new users();
$objuser->login_in();



?>