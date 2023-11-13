<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id_empleado'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id = $_GET['id_empleado'];

    $sentencia = $bd->prepare("select * from tbl_empleados where id_empleado = ?;");
    $sentencia->execute([$id]);
    $empleado = $sentencia->fetch(PDO::FETCH_OBJ);
 
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">

                    <div class="mb-3">
                        <label class="form-label">Nombre completo: </label>
                        <input type="text" class="form-control" name="nombre" autofocus required
                        value="<?php echo $empleado->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de nacimiento: </label>
                        <input type="date" class="form-control" name="fecha_nacimiento" autofocus required
                        value="<?php echo $empleado->fecha_nacimiento; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sexo: </label>
                        <input type="text" class="form-control" name="sexo" autofocus required
                        value="<?php echo $empleado->sexo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ocupación: </label>
                        <input type="text" class="form-control" name="ocupacion" autofocus required
                        value="<?php echo $empleado->ocupacion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sueldo: </label>
                        <input type="number" class="form-control" name="sueldo" autofocus required
                        value="<?php echo $empleado->sueldo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">RFC: </label>
                        <input type="text" class="form-control" name="rfc" autofocus required
                        value="<?php echo $empleado->rfc; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Turno: </label>
                        <input type="text" class="form-control" name="turno" autofocus required
                        value="<?php echo $empleado->turno; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id_empleado" value="<?php echo $empleado->id_empleado; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>