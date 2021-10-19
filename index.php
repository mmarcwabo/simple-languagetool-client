<?php
require_once "config/config.php";

use app\core\RestCall;
use app\libs\View;

require 'vendor/autoload.php';

// For this to work properly, the class must be the same as the file
spl_autoload_register(function ($class) {
    //Replace namespace separator with directory separator
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    //Get full name of file
    $file = APP_ROOT.DIRECTORY_SEPARATOR.$class.'.php';

    if(file_exists($file)){
         require_once $file;
    }else{
        echo "File not found!";
    }
});

$v = new View();
$v->page = "views/index.php";
$v->render();