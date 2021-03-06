<?php

require "conexion_db.php";
session_start();

if(empty($_POST["nombre"])  || empty($_POST["correo"]) || empty($_POST["contrasena"])){
    $_SESSION["mensaje"] = "Datos ingresados incompletos, por favor intente nuevamente";
    header('Location: error.php');
    die;
}
$_SESSION["nombre"] = $_POST["nombre"];
$_SESSION["correo"] = $_POST["correo"];


$nombre = $conexion->escape_string($_POST["nombre"]);
$correo = $conexion->escape_string($_POST["correo"]);

$contrasena = $conexion->escape_string(password_hash($_POST["contrasena"],PASSWORD_BCRYPT)); // sistema de encriptacion blowfish agregado
$hash = $conexion->escape_string( md5(rand(1,1000))); // calcula un numero unico o hash para poder hacer la verificacion por correo

// mirar si el usuario con ese email existe


$peticion = "SELECT * FROM cuentas WHERE email='{$correo}'";
$result = $conexion->query($peticion) or die($conexion->error);

$path = dirname(__FILE__);
$realpath = $path.'/';
$realpath= str_replace('/opt/lampp/htdocs','http://localhost',$realpath); // va a localhost/login

$linkpath = 'http://localhost/jhonfer9731-cursoPHPyoutube/todolist/login';  // va a login 
$linkpathlinux = 'http://localhost/webCourse/cursoPHPyoutube/todolist/login';

$linkpathlinux = $realpath;

if( $result->num_rows > 0 ) // si es mayor a 0 encontro una respuesta, el email existe, tiene que escojer otro emailerrr
{
     $_SESSION["mensaje"] = "Usuario con este email ya existe";
     header('location: error.php');

}else{
    $peticion = "INSERT INTO cuentas(nombre,email,contrasena,hashUnico) VALUES ('{$nombre}','{$correo}','{$contrasena}','{$hash}')";
    if ($conexion->query($peticion)){
        $_SESSION['active'] = 0;
        $_SESSION['mensaje'] = "Link de confirmacion fue mandado a su email, por favor verificar su cuenta haciendo click en el link del mensaje";
        $_SESSION['logged_in'] = true;

        $to = $correo;
        $subject = 'Verificacion de cuenta ( paginaJhon.com )';
        $cuerpo_msj ='
        Hello '.$nombre. ',
        Gracias por registrarte,
        para completar tu registro has click en el link de confirmacion con el fin de activar tu cuenta: 
        '.$linkpathlinux.'verificacion.php?email='.$correo.'&hash='.$hash;

        mail($to,$subject,$cuerpo_msj); // manda el correo electronico al cliente
        echo "<pre style = ".'"color: white;"'.">",var_dump($to),var_dump($cuerpo_msj),"</pre>";
        header('location: profile.php');
    }else{
        $_SESSION["mensaje"] = "Fallo en el registro";
        header('location: error.php');
    }
}




