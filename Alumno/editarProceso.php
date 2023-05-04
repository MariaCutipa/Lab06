<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombres = $_POST['txtNombres'];
    $apellido_paterno = $_POST['txtApPaterno'];
    $apellido_materno = $_POST['txtApMaterno'];
    $fecha_nacimiento = $_POST['txtFechaNacimiento'];
    $DNI = $_POST['txtDNI'];
    $DNI1 = $_POST['txtDN'];
    $Dni_ap = $_POST["txtDniAp"];
    $celular = $_POST['txtCelular'];
    $email = $_POST['txtEmail'];

    $sentencia = $bd->prepare("UPDATE Alumno SET nombres = ?, apellido_paterno = ?, apellido_materno = ?,fecha_nacimiento =?,DNI = ?,celular = ?,email =? where id = ?;");
    $resultado = $sentencia->execute([$nombres, $apellido_paterno, $apellido_materno, $fecha_nacimiento, $DNI, $celular, $email, $codigo]);
 
    $sentencia1 = $bd->prepare("UPDATE Apoderado_Alumno SET dni_Apoderado = ?, dni_Alumno = ? where dni_Alumno = ?;");
    $resultado1 = $sentencia1->execute([$Dni_ap, $DNI, $DNI1]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
