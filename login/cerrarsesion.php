<?php
session_start();
$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$recibido["recibido"] = true;
$recibido["ok"] = 1;
$path = dirname(__FILE__);
$realpath = $path.'/';
$realpath= str_replace('/opt/lampp/htdocs','http://localhost',$realpath);

if($_SERVER["REQUEST_METHOD"] == 'POST')
{
    if(isset($_POST["finish"]) && $_POST["finish"] == true)
    {
        
        
        $recibido["location"] = $realpath;
        echo json_encode($recibido);
        session_unset();
        session_destroy();
        die;

    }
}

if( !isset($_SESSION["logged_in"]) || ($_SESSION["logged_in"] == false))
{
    
    session_unset();
    session_destroy();
    header('location: '.$realpath);
    die;
}
