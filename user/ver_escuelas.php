<!DOCTYPE html>
<html lang="es">
<link href="css\listaCss.css" rel="stylesheet" type="text/css" />

<style>
    body{
        background-image: url("imagenes/fondo3.png") ;
        background-repeat: repeat;
        position: relative;
        background-size: cover; 

    }
    div.centrado{
        p
    }


    
</style>
<head>
    
    <meta charset="utf8_spanish_ci">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>RTeacher - Escuelas</title>
</head>
<body>
    
    <?php
        include "../DBConfig.php";

        $conn = getConexionUsuario();
        if(mysqli_connect_errno($conn))
        {
            echo 'No se pudo hacer la conexión con la base de datos';
            exit;
        }//mysqli_close($conn);

        $sql = "SELECT * FROM escuela";
        $result = mysqli_query($conn, $sql);

		echo "<center>";
		echo "<h2>Escuelas</h2>";
		echo "<div>";
		echo "<ul>";
	    while($row = mysqli_fetch_array($result))
	    {
		    $nombre = $row['Nombre'];
		    $id = $row['id_Escuela'];
		    $link="maestros.php?idEscuela=".$id."&nombreEscuela=".$nombre;
		    echo "<li><a href='$link'>" . $nombre . "</a></td>";
        }
        echo "</ul>";
		echo "</div>";
		echo "</center>";
        mysqli_close($conn);

    ?>
</body>

 
</html>