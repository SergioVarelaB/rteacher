<!DOCTYPE html>
<html lang="en">
<link href="css\style.css" rel="stylesheet" type="text/css" />
<head>
<style type="text/css">
        
        ul.menu {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 110%;
}
li.menu a{
  display: block;
  color: white;
  text-align: center;
  padding: 5px 20px;
  text-decoration: none ;
}
li.menu a.menu:hover:not(.active) {
  background-color: #111;
}
li.menu{
  float: left;
}
.active {
  background-color: #66c2ff;
}
    </style>
    <ul class = "menu">
        <li class = "menu" ><a class = "menu" href="ver_escuelas.php"> <img src= "W3.CSS Template_files/home (2).png"></img></a></li>
            <li class = "menu" ><a class = "active" ><img src= "W3.CSS Template_files/magnifying-glass.png"></img></a></li>
            <li class = "menu"><a  class = "menu" href="agregar_maestro.php"><img src= "W3.CSS Template_files/add (1).png"></img></a></li>
            <li class = "menu"><a  class = "menu" href="contacto.html"><img src= "W3.CSS Template_files/phone-book (1).png"></img></a></li>
        </ul>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RTeacher</title>
</head>
<?php
    $id_escuela = $_GET["id_escuela"];
?>
<body>
    <h1>Busqueda Avanzada</h1><br>

    <h2>Busqueda por nombre</h2>
    <?php
        echo "<form action='busqueda_por_nombre.php?id_escuela=$id_escuela' method='post'>";
    ?>
    
        <p>Nombre: <input type="text" name="nombre" id="" required></p>
        <p>Apellidos: <input type="text" name="apellidos" id="" required></p>
        <input type="submit" value="Buscar">
    </form>
    <br>

    <h2>Busqueda por deparatamentos</h2>
        <?php
            include "../DBConfig.php";

            //Conexion con la base de datos
            $conn = getConexionUsuario();

            if(mysqli_connect_errno($conn))
            {
                echo 'No se pudo hacer la conexión con la base de datos';
                exit;
            }
            $sql = "SELECT * FROM departamento";
            $result = mysqli_query($conn, $sql);
            echo "<form action='busqueda_por_departamento.php?id_escuela=$id_escuela' method='post'>\n";
            echo "<select name='departamento'>\n";
            while($row = mysqli_fetch_array($result)){
                $id_departamentos= $row[0];
                $nombre_departamentos = $row[1];
                echo "<option value='$id_departamentos'>$nombre_departamentos</option>\n";
            }
            echo "</select>\n";
        ?>

    <br>
    <input type="submit" value="Buscar">
    </form>   
</body>
</html>