<!DOCTYPE html>
<?php
//Se incluye el archivo que contiene la conexion a la base de datos de azure sql
include("conexion2.php"); 
?>
<html>
  <head>
  </head>
<body>
    <div>
        <form method="POST" action="pagina.php">
        <label>Mensaje: </label>
        <br/>
        <input type="text" name="texto" placeholder="Escribe un mensaje">
        <br/><br/>
        <input type="submit" name="insert" value="enviar">
        <br/><br/>
    </div>
    <?php
        //Verificar si se ha enviado el formulario (si se hizo clic en el botón "enviar")
        if(isset($_POST['insert'])){
            //Aqui se obtiene el mensaje que se escribio en el formulario el cual guarda el valor dentro de texto
            $mensaje = $_POST['texto'];
            //Aqui se hace la insercion del valor dentro de la base de datos de azure
            $insertar = "INSERT INTO dbo (mensaje) VALUES (?)";
            //Preparar y ejecutar la consulta
            $stmt = $conn->prepare($insertar);
            $stmt->execute([$mensaje]);

            //Aqui generamos un if pra saber si se mando de manera correcta o si tenemos algun error
            if ($stmt->rowCount() > 0) {
                echo "<h3>Insertado correctamente</h3>";
            } else {
                echo "<h3>Error al insertar</h3>"; // Mensaje de error en caso de fallo
            }
        }
    ?>
</body>
</html>
