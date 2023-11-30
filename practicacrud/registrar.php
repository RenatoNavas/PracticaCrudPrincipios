<?php
$nombres = !empty($_POST['c1']) ? $_POST['c1'] : '';
$app = !empty($_POST['c2']) ? $_POST['c2'] : '';
$apm = !empty($_POST['c3']) ? $_POST['c3'] : '';
$correo = !empty($_POST['c4']) ? $_POST['c4'] : '';

if ($nombres && $app && $apm && $correo) {
    include('conexion.php');

    // Utilizar consultas preparadas para evitar inyecciones SQL
    $consulta = "INSERT INTO usuarios (nombres, app, apm, correo) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conexion, $consulta)) {
        // Vincular parámetros de la consulta preparada
        mysqli_stmt_bind_param($stmt, "ssss", $nombres, $app, $apm, $correo);

        // Ejecutar la consulta preparada
        if (mysqli_stmt_execute($stmt)) {
            header('Location: lista.php');
            exit(); // Importante: detener la ejecución del script después de redirigir
        } else {
            // Manejar el error de ejecución de la consulta preparada
            die('Error al agregar el registro: ' . mysqli_stmt_error($stmt));
        }

        // Cerrar la declaración preparada
        mysqli_stmt_close($stmt);
    } else {
        // Manejar el error de preparación de la consulta preparada
        die('Error al preparar la consulta: ' . mysqli_error($conexion));
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
header('Location: lista.php');