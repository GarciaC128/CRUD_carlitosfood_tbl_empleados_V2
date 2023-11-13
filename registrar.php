<?php
    //print_r($_POST);
    if(empty($_POST["id_empleado"]) || empty($_POST["nombre"]) || empty($_POST["fecha_nacimiento"]) || empty($_POST["sexo"]) || empty($_POST["ocupacion"]) || empty($_POST["sueldo"]) || empty($_POST["rfc"]) || empty($_POST["turno"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $id = $_POST["id_empleado"];
    $nombre = $_POST["nombre"];
    $fecha_nac = $_POST["fecha_nacimiento"];
    $sexo = $_POST["sexo"];
    $ocupacion = $_POST["ocupacion"];
    $sueldo = $_POST["sueldo"];
    $rfc = $_POST["rfc"];
    $turno = $_POST["turno"];

    
    $sentencia = $bd->prepare("INSERT INTO tbl_empleados(id_empleado,nombre,fecha_nacimiento,sexo,ocupacion,sueldo,rfc,turno) VALUES (?,?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$id,$nombre,$fecha_nac,$sexo,$ocupacion,$sueldo,$rfc,$turno]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>