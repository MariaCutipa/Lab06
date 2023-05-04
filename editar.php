<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from Apoderado where id = ?;");
    $sentencia->execute([$codigo]);
    $apoderado = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<section class="h-100 bg-dark">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                    <div class="row g-0">
                        <div class="col-xl-6 d-none d-xl-block">
                            <img src="apoderados.jpg"
                                alt="Sample photo" class="img-fluid"
                                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                        </div>
                        <div class="col-xl-6">
                        <div class="card-body p-md-5 text-black">
                            <h3 class="mb-5 text-uppercase">Editar datos</h3>
                            <form class="form-outline mb-4" method="POST" action="editarProceso.php">

                            <div class="form-outline mb-4">
                            <input type="text" id="form3Example9" class="form-control form-control-lg" name="txtNombres"  required
                            value="<?php echo $apoderado->nombres; ?>">
                            <label class="form-label" for="form3Example9">Nombres</label>
                            </div>

                            <div class="form-outline mb-4">
                            <input type="text" id="form3Example9" class="form-control form-control-lg" name="txtApPaterno" autofocus required
                            value="<?php echo $apoderado->apellido_paterno; ?>">
                            <label class="form-label" for="form3Example9">Apellido Paterno</label>
                            </div>

                            <div class="form-outline mb-4">
                            <input type="text" id="form3Example8" class="form-control form-control-lg" name="txtApMaterno" autofocus required 
                            value="<?php echo $apoderado->apellido_materno; ?>">
                            <label class="form-label" for="form3Example8">Apellido Materno</label>
                            </div>

                            <div class="form-outline mb-4">
                            <input type="date" id="form3Example8" class="form-control form-control-lg" name="txtFechaNacimiento" autofocus required 
                            value="<?php echo $apoderado->fecha_nacimiento; ?>">
                            <label class="form-label" for="form3Example8">Fecha de Nacimiento</label>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="number" id="form3Example1m" class="form-control form-control-lg" name="txtDni" autofocus required
                                        value="<?php echo $apoderado->DNI; ?>">
                                        <label class="form-label" for="form3Example1m">DNI</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="number" id="form3Example1n" class="form-control form-control-lg" name="txtCelular" autofocus required 
                                        value="<?php echo $apoderado->celular; ?>">
                                        <label class="form-label" for="form3Example1n">Celular</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                            <input type="text" id="form3Example97" class="form-control form-control-lg" name="txtEmail" autofocus required 
                            value="<?php echo $apoderado->email; ?>">
                            <label class="form-label" for="form3Example97">Email</label>
                            </div>

                            <div class="d-grid">
                                <input type="hidden" name="codigo" value="<?php echo $apoderado->id; ?>">
                                <input type="submit" class="btn btn-warning btn-lg ms-2" value="Editar">
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>

<?php include 'template/footer.php' ?>