<?php
$path = $_SERVER['PATH_INFO'] ?? '/';
//var_dump($_SERVER);
$file = "Pages";
$file .= $path . '/index.php';
if(file_exists($file)){
    include $file;
} else
    include '404.php';