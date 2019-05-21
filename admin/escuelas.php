<?php
    include 'verificar_credenciales.php';
    verificar();
?>

<!DOCTYPE html>
<html lang="en">
<link href="css\style.css" rel="stylesheet" type="text/css" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=7, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escuelas</title>
</head>
<body>
    <?php
        include "../DBConfig.php";

        //Conexion con la base de datos
        $conn = getConexionUsuario();
        if(mysqli_connect_errno($conn))
        {
            echo 'No se pudo hacer la conexión con la base de datos';
            exit;
        }

        $sql = "SELECT * FROM escuela ORDER BY Nombre";
        $result = mysqli_query($conn, $sql);
        echo "<table border = 1>";
        echo "  <tr>";
        echo "      <th>Escuela</th>";
        echo "      <th>Eliminar</th>";
        echo "  </tr>";
        while($row = mysqli_fetch_array($result)){
            $id = $row[0];
            $nombre = $row[1];
            $url = "eliminar_escuela.php?id=$id";
            echo "  <tr>";
            echo "      <td>$nombre</td>";
            echo "      <td><a href=$url>Eliminar</a></td>";
            echo "  </tr>";
        }
        echo "</table>";
        //Terminar la conexion con la base datos
        mysqli_close($conn);
        
    ?>

    <form action="" method="post">
        <p>Nombre de la escuela: <input type="text" name="nombre" id=""></p>
        <input type="submit" value="Agregar" name = "agregar">
    </form>
    
</body>
</html>

<?php
    if(isset($_POST["agregar"])){
        $nombre_nuevo = $_POST["nombre"];
        $conn = getMySQLi();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            exit;
        } 
        
        $sql = "INSERT INTO escuela(Nombre) VALUES ('$nombre_nuevo')";
        $conn->query($sql);
        $conn->close();
        echo "<script>";
        echo "window.location.href = \"escuelas.php\"";
        echo "</script>";
    }
?>