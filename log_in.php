<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<link href="user\css\style.css" rel="stylesheet" type="text/css" />

<style>
input{
        border: 20px;
        color: #4d4dff ; 
}
input:focus {
  outline: 10px;
  border-color: #e6e6ff;
}
input:focus + .input-icon i {
  color: #f5a3df;
}
input:focus + .input-icon:after {
  border-right-color: #e6e6ff;
}
input[type="radio"] {
  display: none;
}

h3 , h2.tituloChido{
    font-family: arial;
    color:  #000000;

}
    body,head{
        background-image: url("user/imagenes/fondo3.png") ;
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
    input {
        width: 400px;
        position: right;
    }


    
</style>

<head>
    
    <meta charset="UTF-5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RTeacher</title>

</head>
<body>
    
    <form action="" method="post">
        <p><h2 class = "tituloChido">Username:</h2> <input type="text" name="username" id="" required></p>
        <p><h2  class = "tituloChido" >Contraseña: </h2><input type="password" name="password" id="" required></p>
        <input type="submit" value="Entrar" name = "entrar">
    </form>
    <h3>No tienes una cuenta?</h3>
    <a href="user/sign_up.php">Registrate aqui</a>
</body>
</html>

<?php 
    if(isset($_POST["entrar"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        include "DBConfig.php";

        $conn = getConexionUsuario();
        if(mysqli_connect_errno($conn))
        {
            echo 'No se pudo hacer la conexión con la base de datos';
            exit;
        }
    
        $sql = "SELECT * FROM usuario WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        if($row){
            $id_usuario = $row["id_Usuario"];
            $nivel_usuario = $row["id_nivelUsuario"];
            $bloqueado = $row["bloqueado"];
            $id_escuela = $row["id_escuela"];
            $_SESSION["id_usuario"] = $id_usuario;
            $_SESSION["nivel_usuario"] = $nivel_usuario;
            $_SESSION["bloqueado"] = $bloqueado; 
            $_SESSION["id_escuela"] = $id_escuela;
            //echo $_SESSION["id_usuario"];
            if($nivel_usuario == 1){
                //ir  a menu administrador
                echo "<script>";
                echo "alert(\"¡Bienvenido!\");\n";
                echo "</script>";
                header("Location: admin/menu.php");
            } else{
                if($nivel_usuario ==3){
                    echo "<script>";
                    echo "alert(\"¡Bienvenido!\");\n";
                    echo "</script>";
                    header("Location: user/ver_escuelas.php");
                }
            }
            
            
        } else{
            echo "<script>";
            echo "alert(\"El usuario y la contraseña no coinciden :(\");\n";
            echo "window.history.back();";
            echo "</script>";
        }
    }
?>
</html>