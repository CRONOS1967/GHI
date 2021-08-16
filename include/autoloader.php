<?php
spl_autoload_register(function($classname){
    $path = "../Class";
    $ext = ".php";
    $fullpath = $path. $classname . $ext;
    if (!file_exists($fullpath)) {
        return false;
    }
    include_once $fullpath;
});