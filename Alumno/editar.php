<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from Alumno where id = ?;");
    $sentencia->execute([$codigo]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);

    $sentencia1 = $bd->prepare("SELECT ap.* FROM Apoderado_Alumno ap WHERE ap.dni_Alumno = ?");
    $sentencia1->execute([$persona->DNI]); // Usar el valor de DNI obtenido en la primera consulta
    $apoderado = $sentencia1->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>
<section class="h-100 bg-dark">
     <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                    <div class="row g-0">
                        <div class="col-xl-6 d-none d-xl-block">
                            <img src="editar.jpg"
                                alt="Sample photo" class="img-fluid"
                                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                        </div>
                        <div class="col-xl-6">
                        <div class="card-body p-md-5 text-black">
                            <h3 class="mb-5 text-uppercase">Editar datos del estudiante</h3>
                            <form class="form-outline mb-4" method="POST" action="editarProceso.php">

                            <div class="form-outline mb-4">
                            <input type="text" id="form3Example9" class="form-control form-control-lg" name="txtNombres"  required
                            value="<?php echo $persona->nombres; ?>">
                            <label class="form-label" for="form3Example9">Nombres</label>
                            </div>

                            <div class="form-outline mb-4">
                            <input type="text" id="form3Example9" class="form-control form-control-lg" name="txtApPaterno" autofocus required
                            value="<?php echo $persona->apellido_paterno; ?>">
                            <label class="form-label" for="form3Example9">Apellido Paterno</label>
                            </div>

                            <div class="form-outline mb-4">
                            <input type="text" id="form3Example8" class="form-control form-control-lg" name="txtApMaterno" autofocus required 
                            value="<?php echo $persona->apellido_materno; ?>">
                            <label class="form-label" for="form3Example8">Apellido Materno</label>
                            </div>

                            <div class="form-outline mb-4">
                            <input type="date" id="form3Example8" class="form-control form-control-lg" name="txtFechaNacimiento" autofocus required 
                            value="<?php echo $persona->fecha_nacimiento; ?>">
                            <label class="form-label" for="form3Example8">Fecha de Nacimiento</label>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="number" id="form3Example1m" class="form-control form-control-lg" name="txtDNI" autofocus required
                                        value="<?php echo $persona->DNI; ?>">
                                        <label class="form-label" for="form3Example1m">DNI del Alumno</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="number" id="form3Example1n" class="form-control form-control-lg" name="txtDniAp" autofocus required 
                                        value="<?php echo $apoderado->dni_Apoderado; ?>">
                                        <label class="form-label" for="form3Example1n">DNI del Apoderado</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                            <input type="number" id="form3Example97" class="form-control form-control-lg" name="txtCelular" autofocus required 
                            value="<?php echo $persona->celular; ?>">
                            <label class="form-label" for="form3Example97">Celular</label>
                            </div>

                            <div class="form-outline mb-4">
                            <input type="text" id="form3Example97" class="form-control form-control-lg" name="txtEmail" autofocus required 
                            value="<?php echo $persona->email; ?>">
                            <label class="form-label" for="form3Example97">Email</label>
                            </div>
                            <div class="d-grid">
                                <input type="hidden" name="codigo" value="<?php echo $persona->id; ?>">
                                <input type="hidden" name="txtDN" value="<?php echo $persona->DNI; ?>">
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
