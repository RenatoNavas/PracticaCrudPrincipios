<?phP
    require_once('config.php');
    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (mysqli_connect_error()) {
        error_log('Error en la conexión a la base de datos: ' . mysqli_connect_error());
        die('No se puede conectar a la base de datos. Por favor, inténtelo más tarde.');
    }
?>

