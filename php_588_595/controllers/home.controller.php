<?php

class HomeController

{
    function index(){
        require "views/header.php";
        require "views/home/main.php";
        require "views/footer.php";
    }

    function test(){
       $connection = Database::Connect();
       var_dump($connection);
    }

}