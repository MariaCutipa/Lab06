<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from Apoderado");
    $apoderado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="w">
    <div class="row justify-content-center">
        <div class="col-md-10.5">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 
            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Lista de padres
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellido Paterno</th>
                                <th scope="col">Apellido Materno</th>
                                <th scope="col">F.Nacimiento</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Email</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($apoderado as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->nombres; ?></td>
                                <td><?php echo $dato->apellido_paterno; ?></td>
                                <td><?php echo $dato->apellido_materno; ?></td>
                                <td><?php echo $dato->fecha_nacimiento; ?></td>
                                <td><?php echo $dato->DNI; ?></td>
                                <td><?php echo $dato->celular; ?></td>
                                <td><?php echo $dato->email; ?></td>
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
            
        </div>
        <div class="col-xl-6 d-none d-xl-block">
            <img src="apoderados.jpg"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
        </div>
        <div class="col-xl-6">
            <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Registro del Apoderado</h3>
                    <form class="p-4" method="POST" action="registrar.php">
                            <div class="mb-3">
                            <input type="text" id="form3Example9" class="form-control form-control-lg" name="txtNombres" autofocus required/>
                            <label class="form-label" for="form3Example9">Nombres</label>
                            </div>

                            <div class="mb-3">
                            <input type="text" id="form3Example9" class="form-control form-control-lg" name="txtApPaterno" autofocus required/>
                            <label class="form-label" for="form3Example9">Apellido Paterno</label>
                            </div>

                            <div class="mb-3">
                            <input type="text" id="form3Example8" class="form-control form-control-lg" name="txtApMaterno" autofocus required />
                            <label class="form-label" for="form3Example8">Apellido Materno</label>
                            </div>

                            <div class="mb-3">
                            <input type="date" id="form3Example8" class="form-control form-control-lg" name="txtFechaNacimiento" autofocus required />
                            <label class="form-label" for="form3Example8">Fecha de Nacimiento</label>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="number" id="form3Example1m" class="form-control form-control-lg" name="txtDni" autofocus required/>
                                        <label class="form-label" for="form3Example1m">DNI</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="number" id="form3Example1n" class="form-control form-control-lg" name="txtCelular" autofocus required/>
                                        <label class="form-label" for="form3Example1n">Celular</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                            <input type="text" id="form3Example97" class="form-control form-control-lg" name="txtEmail" autofocus required/>
                            <label class="form-label" for="form3Example97">Email</label>
                            </div>

                            <div class="d-grid">
                                <input type="hidden" name="oculto" value="1">
                                <input type="submit" class="btn btn-warning btn-lg " value="Registrar">
                            </div>
                            <br> 
                            <div class="d-grid">
                                <button type="button" class="btn btn-secondary btn-lg" onclick="location.href='/Alumno/index.php'" value="Siguiente">Siguiente</button>
                            </div>
                    </form>
            </div>
        </div>

    </div>
</div>

<?php include 'template/footer.php' ?>