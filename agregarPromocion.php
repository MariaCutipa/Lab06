<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("select * from Apoderado where id = ?;");
$sentencia->execute([$codigo]);
$apoderado = $sentencia->fetch(PDO::FETCH_OBJ);

$sentencia_promocion = $bd->prepare("select * from promociones where id_apoderado = ?;");
$sentencia_promocion->execute([$codigo]);
$promocion = $sentencia_promocion->fetchAll(PDO::FETCH_OBJ); 
//print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Ingresar mensaje : <br><?php echo $apoderado->nombres.' '.$apoderado->apellido_paterno.' '.$apoderado->apellido_materno; ?>
                </div>
                <form class="p-4" method="POST" action="registrarPromocion.php">
                    <div class="mb-3">
                        <label class="form-label">Mensaje: </label>
                        <input type="text" class="form-control" name="txtPromocion" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Vencimiento: </label>
                        <input type="text" class="form-control" name="txtDuracion" autofocus required>
                    </div>
                    <div class="d-grid">
                    <input type="hidden" name="codigo" value="<?php echo $apoderado->id; ?>"><P></P>
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                    <hr>
                    <div class="d-grid">
                        <button type="button" class="btn btn-primary btn-lg" onclick="location.href='index.php'" value="Atras">Regresar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    Lista de Mensajes
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mensaje</th>
                                <th scope="col">Duracion</th>
                                <th scope="col" colspan="3">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($promocion as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->id; ?></td>
                                    <td><?php echo $dato->promocion; ?></td>
                                    <td><?php echo $dato->duracion; ?></td>
                                    <td><a class="text-primary" href="enviarMensajeA.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-check2"></i></a></td>
                                    <td><a class="text-primary" href="enviarMensajeR.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-x"></i></a></td>
                                    <td><a class="text-primary" href="enviarDireccion.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-geo-alt"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?> 
