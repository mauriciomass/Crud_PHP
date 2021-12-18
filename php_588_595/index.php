<?php

//Fron Controller
require_once "models/database.php";
require_once "models/user.php";
session_start();
if(isset($_SESSION['user']) ||(isset($_POST['user']) && isset($_POST['password']))) {

    if(!isset($_GET['c'])){
        require_once  "controllers/home.controller.php";
        $controller = new HomeController();
        call_user_func(array($controller,"index"));
    }else{
        $controller = $_GET['c'];
        if(!file_exists("controllers/$controller.controller.php")){
            $controller = 'home';
        }
        
        require_once  "controllers/$controller.controller.php";
        $controller = ucwords($controller)."Controller";
        $controller = new $controller;

        $action = isset($_GET['a']) ? $_GET['a'] : "index";
        call_user_func(array($controller,$action));

    }
}else
{
    require_once "controllers/user.controller.php";
    $controller = new UserController();
    call_user_func(array($controller,'formLogin'));
}