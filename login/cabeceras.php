<?php

$windows = str_replace('C:\xampp\htdocs','http://localhost',$realpath);
$linux= str_replace('/opt/lampp/htdocs','http://localhost',$realpath);

$realpath = $windows;