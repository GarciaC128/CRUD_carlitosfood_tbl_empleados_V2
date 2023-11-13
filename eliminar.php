<?php 
    if(!isset($_GET['id_empleado'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $id = $_GET['id_empleado'];

    $sentencia = $bd->prepare("DELETE FROM tbl_empleados where id_empleado = ?;");
    $resultado = $sentencia->execute([$id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>