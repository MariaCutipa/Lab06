<?php 
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $codigo = $_GET['codigo'];
    
    $sentencia1 = $bd->prepare("DELETE FROM promociones where id_apoderado = ?;");
    $sentencia = $bd->prepare("DELETE FROM Apoderado where id = ?;");
    $resultado1 = $sentencia1->execute([$codigo]);
    $resultado = $sentencia->execute([$codigo]);


    if ($resultado === TRUE){
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
?>