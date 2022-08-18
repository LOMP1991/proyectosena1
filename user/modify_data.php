<?php

//llamar las sesiones
require'../class/sessions.php';
$objSes = new Sessions();
$objSes->init();

$nameU = $objSes->get('usuario');
$idUse = $objSes->get('id_usuario');


//NOS CONECTAMOS A LA BASE DE DATOS
require'../class/database.php';
require'../class/users.php';
$objUser = new Users();
$objUser->modify_data($idUse);

