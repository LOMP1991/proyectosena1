<?php

//llamar las sesiones
require'../class/sessions.php';
$objSes = new Sessions();
$objSes->init();

$nameU = $objSes->get('usuario');
$idUse = $objSes->get('id_usuario');

//llamamos la clase database
require'../class/database.php';
//llamamos la clase users
require'../class/users.php';
$objUser = new Users();
$objUser->modify_login($idUse, $path);


