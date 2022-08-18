<?php

//llamar las sesiones
require'../class/sessions.php';
$objSes = new Sessions();
$objSes->init();

$nameU = $objSes->get('loginUsers');
$idUse = $objSes->get('idUser');


//NOS CONECTAMOS A LA BASE DE DATOS
require'../class/database.php';

//print_r($_POST);

require'../class/users.php';
$objUser = new Users();
$objUser->modify_data($idUse);

