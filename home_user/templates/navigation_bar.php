<?php
$path = dirname(__FILE__,2);
$realpath = $path.'/';
$realpath= str_replace('/opt/lampp/htdocs','http://localhost',$realpath);
?>
        <div class="barraNavegacion">
            <nav>
                <ul class="lista-navegacion">
                    <li class="item-navegacion"><a href="<?php echo $realpath; ?>">Inicio</a></li>
                    <li class="item-navegacion">Tus listas</li>
                    <li class="item-navegacion"><a href="<?php echo $realpath.'dispositivos/'; ?>">Dispositivos</a></li>
                    <li class="item-navegacion" id="cerrar-sesion">Cerrar Sesión</li>
                </ul>
            </nav>
        </div>
        <div class="msj-bienvenida">
            <div class="info-iniuser">
                <?php if(isset($_SESSION["mensaje"])){
                echo "<p class=".'nombre-user'."> Hola {$_SESSION["nombre"]} </p>";
                echo "<p class=".'mensaje-user'.">{$_SESSION["mensaje"]} </p>";
                }?>
            </div>
            <h1> Bienvenido </h1>
        </div>