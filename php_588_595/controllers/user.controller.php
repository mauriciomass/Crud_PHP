<?php

require_once "models/user.php";
require_once "models/role.php";
class UserController

{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new User();
    }

    public function index()
    {
        $role = new Rol();
        $users = $this->model->list();
        
        require "views/header.php";
        require "views/user/main.php";
        require "views/footer.php";
    }

    public function form()
    {
        $user = new User();
        $role = new Rol();
        $roles = $role -> list();
        if(isset($_GET['id']))
        {
            $user = $user->getById($_GET['id']);
        }
        require "views/header.php";
        require "views/user/form.php";
        require "views/footer.php";

    }

    public function save()
    {
        $user = new User();
       $id = intval($_POST['id']);
        if($id){
            $user = $user->getById($id);        }

        $password =password_hash($_POST['password'],PASSWORD_BCRYPT);
        

        $user->setEmail($_POST['email']);
        $user->setPassword($password);
        $user->setName($_POST['name']);
        $user->setRolId($_POST['rol_id']);     
        $user->setState(1);
        

        $user->insert();

        header('location:?c=user');
    }

   function formLogin()
   {
       require "views/user/login.php";
   }

   function validate()
   {
       $user = $_POST['user'];
       $password = $_POST['password'];
       $userObj = new User();
       if($userObj->login($user,$password))
       {  header('location: index.php');
       }else{
           header('location: index.php?error');
       }
   }

  function logout()
  {
      session_destroy();
      header('location: index.php');
  }

  function changeState()
  {
      $id =$_GET['id'];
      $user = $this->model->getById($id);
      $user->setState($user->getState() ? 0 : 1);
      $user->updateState();
      header('location: ?c=user');
  }
    
    
}