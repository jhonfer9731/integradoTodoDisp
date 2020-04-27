<?php session_start();

require "../login/conexion_db.php";
$json = file_get_contents('php://input');
$isJson = false;
if(json_decode($json,true) !== NULL){
    $_POST =json_decode($json,true);
    $isJson = true;
}

if($_SERVER["REQUEST_METHOD"] == 'POST')
{   
    if (isset($_POST["estado"]) && isset($_POST["disp"])){

        $_SESSION["disp"] = $_POST["disp"];
        $respesta["estado"] = $_SESSION["estado"] = $_POST["estado"];
        $respesta["mensaje"] = "Sin problemas";
        echo json_encode($respesta);
        //escribirArchivo($respesta["estado"]);
    }else{
        $respesta["mensaje"] = "Falta estado o disp";
        echo json_encode($respesta);
    }
}


function escribirArchivo($senal)
{
    $myfile = fopen("/home/jhon/Documents/todoDev/senales.txt", "w") or die("Unable to Open de file");
    fwrite($myfile,$senal);
    fclose($myfile);
}


if($_SERVER["REQUEST_METHOD"] == 'GET')
{
    if(isset($_SESSION["estado"]) && isset($_SESSION["disp"]))
    {
        
        $_GET["estado"] = $_SESSION["estado"];
        $_GET["disp"] = $_SESSION["disp"];
        echo json_encode($_GET);
    }else{
        $_GET["estado"] = "error";
        $_GET["usuario"] = "desconectado";
        echo json_encode($_GET);
    }
}