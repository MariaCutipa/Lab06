<?php 
$contrasena = "AVNS_4_kzRPbMLHxIe24b7DG";
$usuario = "doadmin";
$nombre_bd = "Registro";
$puerto = "25060";
try {
	$bd = new PDO (
		'mysql:host=db-mysql-nyc1-83352-do-user-14161302-0.b.db.ondigitalocean.com;
		port='.$puerto.';
		dbname='.$nombre_bd,
		$usuario,
		$contrasena,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}
?>