<?php
session_start();
$json = file_get_contents('php://input');
$isJson = false;
if(json_decode($json,true) !== NULL){
    $_POST =json_decode($json,true);
    $isJson = true;
}
$recibido["recibido"] = true;
$recibido["ok"] = 1;
$path = dirname(__FILE__);
$realpath = $path.'/';
$realpath= str_replace('/opt/lampp/htdocs','http://localhost',$realpath); // va a localhost/login

if($_SERVER["REQUEST_METHOD"] == 'POST')
{   
    if(isset($_POST["finish"]) && $_POST["finish"] == true)
    {
        session_unset();
        session_destroy();
        if ($isJson)
        {
            $recibido["location"] = $realpath;
            echo json_encode($recibido);
            $isJson = false;
            die;
        }else{
            header('location: '.$realpath);
            die;
        }
    }
}

if( !isset($_SESSION["logged_in"]) || ($_SESSION["logged_in"] == false))
{
    
    session_unset();
    session_destroy();
    header('location: '.$realpath);
    die;
}
