<?php
$path = dirname(__FILE__,2);
$realpath = $path.'/';
$realpath= str_replace('/opt/lampp/htdocs','http://localhost',$realpath);
?>
<footer class = "footer">
        <ul class= "list-footer">
            <li> <a href="<?php echo $realpath; ?>">Inicio</a> </li>
            <li class = "barra-sep"> | </li>
            <li> Tus Listas </li>
            <li class = "barra-sep"> | </li>
            <li> <a href="<?php echo $realpath.'dispositivos/'; ?>">Dispositivos</a> </li>
        </ul>
        <div class = "pag-autor">
            <p> Desarrollado por: <span> Jhon Benavides </span> </p>
            <p> Todos los derechos reservados </p>
            <p> © Lecker 2020 <p>
        </div>
</footer>