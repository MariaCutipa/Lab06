<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtNombres"]) || empty($_POST["txtApPaterno"]) || empty($_POST["txtApMaterno"]) || empty($_POST["txtFechaNacimiento"]) || empty($_POST["txtDni"]) || empty($_POST["txtCelular"]) || empty($_POST["txtEmail"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$nombres = $_POST["txtNombres"];
$ap_paterno = $_POST["txtApPaterno"];
$ap_materno = $_POST["txtApMaterno"];
$fecha_nacimiento = $_POST["txtFechaNacimiento"];
$DNI = $_POST["txtDni"];
$celular = $_POST["txtCelular"];
$email= $_POST["txtEmail"];

$sentencia = $bd->prepare("INSERT INTO apoderado(nombres,apellido_paterno,apellido_materno,fecha_nacimiento,DNI,celular,email) VALUES (?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$nombres, $ap_paterno, $ap_materno, $fecha_nacimiento, $DNI, $celular, $email]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}