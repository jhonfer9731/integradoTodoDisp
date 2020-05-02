<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();
require "../../login/cerrarsesion.php";
$path = dirname(__FILE__,2);
$realpath = $path.'/';
$realpath= str_replace('/opt/lampp/htdocs','http://localhost',$realpath);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My ToDoList</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <link rel="stylesheet" type="text/css" href="styles/styleDis.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
</head>

<body>
    <div class="img_gradient">
        <?php require "../templates/navigation_bar.php";?>
        <div class=container-iot>
            <h2 id="dispositivos">Dispositivos</h3>
            <ul class="iots-list">
                <li class="iots-item">
                    <h3 class="iots-title">Led Inicial</h2>
                    <div class="iots-btn">
                        <button class="btn btn-success">Encender</button>
                        <button class="btn btn-danger">Apagar</button>
                    </div>
                    <!-- <h3 class="iots-monitor"></h3> -->
                    <div class="clear"></div>
                </li>
            </ul>
            <h2 class="iot-title"> Sensores Disponibles Arduino </h3>
            <ul class="sensor-list">
                <li class="sensor-item">
                    <h3 class="sensor-title">Temperatura:</h3>
                    <div class = "canva-container">
                    </div>
                    <div class="clear"></div>
                </li>
            </ul>
        </div>
    </div>
    <?php  
        $path = dirname(__FILE__,3);
        $realpath = $path.'/';
        $realpath= str_replace('/opt/lampp/htdocs','http://localhost',$realpath);
     ?>
<script src="<?php echo ''.$realpath.'node_modules/socket.io-client/dist/socket.io.js'?>"></script>
<script type="text/javascript" src="./js/wSockets.js"></script>
<script type="text/javascript" src="./js/dispositivosApp.js"></script>
</body>
