<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<!--<link href="user\css\style.css" rel="stylesheet" type="text/css" />-->

<style>
h3 , h2.tituloChido{
    font-family: arial;
    color:  #000000;

}
    body,head{
        font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
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

  .form {
  position: relative;
  z-index: 1;
  background: #d0d0d0;
  max-width: 360px;
  margin: 100px auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #1179c6;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}   
</style>

<head>
    
    <meta charset="UTF-5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RTeacher</title>

</head>
<body>
    
    <form action="" method="post" class = "form">
        <p><h2 class = "tituloChido">Username:</h2> <input type="text" name="username" id="" required></p>
        <p><h2  class = "tituloChido" >Contraseña: </h2><input type="password" name="password" id="" required></p>
        <input type="submit" value="Entrar" name = "entrar">
        <h3>No tienes una cuenta?</h3>
        <a class = "tituloChido" href="user/sign_up.php">Registrate aqui</a>
    </form>
    
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
            echo 'No mancges, algo paso';
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