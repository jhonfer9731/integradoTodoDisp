
<?php

session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In | TodoLista</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style1.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
<?php

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        echo "<p> ingreso a metodo post </p>";
        if(isset($_POST["ingresar"]))
        {
            require 'login.php';

        }elseif(isset($_POST["completar_reg"])){
            
            require 'register.php';
        }
    } 
?>
<script type="text/javascript" src="js/validacion.js"></script>
</head>
<body>
    <div class="logIn_form" >
        <form action="index.php" method="POST" class =" formLogin">
            <h1> Inicio de sesión </h1>
            <span>Ingrese su correo: </span>
            <input type="email" name ="correo" class= "input_login"></input>
            <span>Ingrese su contraseña: </span>
            <input  type="password" name ="contrasena_ln" class= "input_login"></input>
            <?php 
                if(isset($_SESSION["mensaje"])){
                echo "<p class="."problema_login"."> {$_SESSION['mensaje']} </p>";
                //$_SESSION["mensaje"] = null;
            }?>
            <button type="submit" name="ingresar" class="btn btn-outline-success" value="true">Ingresar</button>
            <button name="registro" class = "buttonlog" id="reg_btn">Registro</button>
            <div class="clear"></div>
            <a id="olvido_pass" href="olvido_contra.php">Olvido su contraseña? Click aqui !</a>
        </form>
    </div>      
    <div class="signUp_form" style="display: none;">
        <form action="index.php" onsubmit="return validateReg()" method="POST" class="formLogin" id="form-registro">
            <h1> Registro </h1>
            <span>Ingrese su nombre: </span>
            <input type="text" name ="nombre" class= "input_login" required></input>
            <span>Ingrese su correo: </span>
            <input type="email" name ="correo" class= "input_login" required></input>
            <span>Ingrese su contraseña: </span>
            <input  type="password" name ="contrasena" class= "input_login" required></input>
            <span>Repita su contraseña: </span>
            <input  type="password" name ="contrasenax2" class= "input_login" required></input>
            <button type="submit" class="btn btn-outline-success" name="completar_reg" class = "buttonlog">Completar Registro</button>
            <span style="text-align: center;"> Ya posee una cuenta? </span>
            <button name="login" class = "buttonlog" id="login_btn">Ingrese Aqui</button>
            <div class="clear"></div>
        </form>
    </div>
    <script type="text/javascript" src="js/behavior.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>