<!DOCTYPE html>
<html lang="en">
<link href="css\sign_up.css" rel="stylesheet" type="text/css" />

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RTeacher</title>
</head>
<body>

    <form action="sign_upDB.php" method="post" class = "form">
        <p>Nombre: <input type="text" name="nombre" id="" required></p>
        <p>Apellidos: <input type="text" name="apellidos" id=""required> </p>
        <p>Username: <input type="text" name="username" id=""required></p>
        <p>Contraseña: <input type="password" name="password" id=""required></p>
        <p>Confirmar Contraseña: <input type="password" name="password_conf" id=""required></p>
        <p>Escuela: <select name="escuela" id=""required></p> 
        <?php
            include "../DBConfig.php";

            $conn = getConexionUsuario();
            if(mysqli_connect_errno($conn))
            {
                echo 'No se pudo hacer la conexión con la base de datos';
                exit;
            }
    
            $sql = "SELECT * FROM escuela";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result))
            {
                $nombre = $row['Nombre'];
                $id = $row['id_Escuela'];
                echo "<option value='$id'>$nombre</option>";
            }
            mysqli_close($conn);
            
            
        ?>
        </select><br><br>
        <br><br>
        <input type="submit" value="Registrarse!">
    </form>
    
</body>
</html>
