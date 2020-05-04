<?php

$correo = $conexion->escape_string($_POST["correo"]);

$path = dirname(__FILE__);
$realpath = $path.'/';
$realpath= str_replace('/opt/lampp/htdocs','http://localhost',$realpath); // va a localhost/login

$linkpath = 'http://localhost/jhonfer9731-cursoPHPyoutube/todolist/login'; // va a local host login
$linkpathlinux = 'http://localhost/webCourse/cursoPHPyoutube/todolist/login';

$linkpathlinux = $realpath;

$peticion = "SELECT * FROM cuentas WHERE email ='{$correo}'";

$resultado = $conexion->query($peticion);


if($resultado->num_rows == 0)
{
    $_SESSION["mensaje"] = "El usuario con este email no existe, por favor verificar la
    informacion suministrada.";
    header('location: error.php');
}else{
    $usuarioInfo = $resultado->fetch_assoc();
    $email = $usuarioInfo["email"];
    $nombre = $usuarioInfo["nombre"];
    $hash = $usuarioInfo["hashUnico"];
    $_SESSION["mensaje"] = "<p> Por favor revisar su email: <span> {$email} </span>
    Ahi encontrara un link para restablecer su contraseña.";
    $to = $email;
    $subject = "Restablezca su contraseña ( paginaJhon.com )";
    $body = '
    Hello '.$nombre. ',
    
    Para restablecer tu contraseña has click en el link de confirmacion con el fin de establecer una nueva: 
    '.$linkpathlinux.'cambiarcontra.php?email='.$correo.'&hash='.$hash;
    mail($to,$subject,$body);
    header("location: success.php");
}

?>