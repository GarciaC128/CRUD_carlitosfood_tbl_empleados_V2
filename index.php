<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from tbl_empleados");
    $empleado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                    Tabla Empleados
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre completo</th>
                                <th scope="col">Fecha de nacimiento</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Ocupación</th>
                                <th scope="col">Sueldo</th>
                                <th scope="col">RFC</th>
                                <th scope="col">Turno</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($empleado as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id_empleado; ?></td>
                                <td><?php echo $dato->nombre; ?></td>
                                <td><?php echo $dato->fecha_nacimiento; ?></td>
                                <td><?php echo $dato->sexo; ?></td>
                                <td><?php echo $dato->ocupacion; ?></td>
                                <td><?php echo $dato->sueldo; ?></td>
                                <td><?php echo $dato->rfc; ?></td>
                                <td><?php echo $dato->turno; ?></td>
                                <td><a class="text-success" href="editar.php?id_empleado=<?php echo $dato->id_empleado; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?id_empleado=<?php echo $dato->id_empleado; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">ID de empleado: </label>
                        <input type="text" class="form-control" name="id_empleado" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre completo: </label>
                        <input type="text" class="form-control" name="nombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de nacimiento: </label>
                        <input type="date" class="form-control" name="fecha_nacimiento" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sexo: </label>
                        <input type="text" class="form-control" name="sexo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ocupación: </label>
                        <input type="text" class="form-control" name="ocupacion" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sueldo: </label>
                        <input type="number" class="form-control" name="sueldo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">RFC: </label>
                        <input type="text" class="form-control" name="rfc" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Turno: </label>
                        <input type="text" class="form-control" name="turno" autofocus required>
                    </div>                    
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>