<?php
//Call the restcall object
//To be able to send async calls to the api

require 'vendor/autoload.php';

// For this to work properly, the class must be the same as the file
spl_autoload_register(function ($class) {

    require "app/$class.php";
});

$rc = new RestCall();
$v = new View();
$v->render("views/index.php");