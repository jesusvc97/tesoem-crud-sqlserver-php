<?php
//conexion a base de datos a azure
//Nomnbre del servidor
$serverName = ('tesoem.database.windows.net');
//Nombre de la base de datos
$databaseName = ('crudphp');
//Nombre del usuario de la base de datos
$uid = ('skull');
//Contraseña para el acceso a la base de datos
$pwd = ('Mjesus10@');

//Utilizamos un try catch para cualquier error en la conexion
try {
    //creamos la conecion PDO (PHP Data Objects) dentro de la variable $conn
    //dentro de ella meteremos las variables de servidor, puerto, base de datos, usuario y contraseña
    $conn = new PDO("sqlsrv:server = tcp:$serverName,1433; Database = $databaseName; Encrypt=true;", $uid, $pwd);
    //Configurar PDO para que lance excepciones en caso de errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Mensaje que nos dira si se conecto con exito a la base de datos
    //print("Conexión a Azure SQL exitosa");

    //Capturar cualquier excepción (error) que ocurra durante la conexión
} catch (PDOException $e) {
    //Determinar el tipo de error basándose en el código de error SQLSTATE
    //28000 indica un error de autenticación (credenciales incorrectas)
    $errorType = ($e->getCode() == 28000) ? "Error de credenciales" : "Error de conexión a SQL Server";
    // Mostrar el mensaje de error y finalizar la ejecución del script
    die(print_r("$errorType: " . $e->getMessage()));
} 
?>
