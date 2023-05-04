<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtNombres"]) || empty($_POST["txtApPaterno"]) || empty($_POST["txtApMaterno"]) || empty($_POST["txtFechaNacimiento"]) || empty($_POST["txtDNI"]) || empty($_POST["txtCelular"]) || empty($_POST["txtEmail"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$nombres = $_POST["txtNombres"];
$ap_paterno = $_POST["txtApPaterno"];
$ap_materno = $_POST["txtApMaterno"];
$fecha_nacimiento = $_POST["txtFechaNacimiento"];
$DNI = $_POST["txtDNI"];
$Dni_ap = $_POST["txtDniAp"];
$celular = $_POST["txtCelular"];
$email = $_POST["txtEmail"];

$sentencia = $bd->prepare("INSERT INTO Alumno(nombres,apellido_paterno,apellido_materno,fecha_nacimiento,DNI,celular,email) VALUES (?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$nombres, $ap_paterno, $ap_materno, $fecha_nacimiento, $DNI, $celular, $email]);

$sentencia1 = $bd->prepare("INSERT INTO Apoderado_Alumno(dni_Apoderado,dni_Alumno) VALUES (?,?);");
$resultado1 = $sentencia1->execute([$Dni_ap,$DNI]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}


