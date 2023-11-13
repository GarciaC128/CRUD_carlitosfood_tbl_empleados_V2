<?php
    print_r($_POST);
    if(!isset($_POST['id_empleado']) || !is_numeric($_POST["id_empleado"])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id = $_POST["id_empleado"];
    $nombre = $_POST["nombre"];
    $fecha_nac = $_POST["fecha_nacimiento"];
    $sexo = $_POST["sexo"];
    $ocupacion = $_POST["ocupacion"];
    $sueldo = $_POST["sueldo"];
    $rfc = $_POST["rfc"];
    $turno = $_POST["turno"];

    $sentencia = $bd->prepare("UPDATE tbl_empleados SET  nombre = ?, fecha_nacimiento = ?, sexo = ?, ocupacion = ?, sueldo = ?, rfc = ?, turno = ? where id_empleado = ? ;");
    $resultado = $sentencia->execute([$nombre,$fecha_nac,$sexo,$ocupacion,$sueldo,$rfc,$turno,$id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>