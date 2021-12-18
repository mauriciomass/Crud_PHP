<?php

require_once "models/role.php";
class RoleController

{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Rol();
    }

    public function index()
    {
        $roles = $this->model->list();
        
        require "views/header.php";
        require "views/role/main.php";
        require "views/footer.php";
    }

    public function form()
    {
        $role = new Rol();
        if(isset($_GET['id']))
        {
            $role = $role->getById($_GET['id']);
        }
        require "views/header.php";
        require "views/role/form.php";
        require "views/footer.php";

    }

    public function save()
    {
        $role = new Rol();
        
        $id = intval($_POST['id']);
        if($id){
            $role = $role->getById($id);
        }
        $role->setRole($_POST['role']);
 
        $id ? $role->update() : $role->insert();

        header('location:?c=role');
    }

    public function delete()
    {
        $role = new Rol();
        $role = $role-> getById($_GET['id']);
        $role->delete();
        header('location:?c=role');
    }
    
    
}