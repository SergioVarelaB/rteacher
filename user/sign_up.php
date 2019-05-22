<!DOCTYPE html>
<html lang="en">
<!--<link href="css\style.css" rel="stylesheet" type="text/css" />-->
<style>
h3 , h2.tituloChido{
    font-family: arial;
    color:  #000000;

}

input[type="radio"]:checked+label,
input:checked+label:before,
select:focus,
select:active {
    background-color: #7BBFF2;
    color: #000000;
    border-color: #1061FF;
}

input[type="radio"]+label,
select {
    display: inline-block;
    width: 100%;
    text-align: center;
    float: left;
    border-radius: 0;
}

input[type="checkbox"] {
    display: none;
}
.select-selected {
  background-color: black;
}

input:checked+label:after {
    opacity: 1;
}

select {
    height: 3.4em;
    line-height: 2;
}

select:first-of-type {
    border-top-left-radius: 3px;
    border-bottom-left-radius: 3px;
}

select:last-of-type {
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
}

select:focus,
select:active {
    outline: 0;
}
p{
    font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

select option {
    background-color: #7BBFF2;
    color: #000000;
    border-color: #1061FF;
}
    body,head{
        background-image: url("imagenes/fondo3.png") ;
        background-repeat: repeat;
        position: relative;
        background-size: cover; 
        

    }
    img{
        -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
        filter: grayscale(100%);
        -webkit-filter: blur(5px); /* Safari 6.0 - 9.0 */
        filter: blur(5px);
    }

  .form {
  position: relative;
  z-index: 1;
  background: #d0d0d0;
  max-width: 600px;
  margin: 5px auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #e8f0fe;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
} 
</style>
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
        <select name="escuela" id=""required> 
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
