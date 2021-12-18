<?php

require_once "models/product.php";
require_once "models/brand.php";
class ProductController

{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Product();
    }

    public function index()
    {
        $brand = new Brand();
        $products = $this->model->list();
        
        require "views/header.php";
        require "views/product/main.php";
        require "views/footer.php";
    }

    public function form()
    {
        $product = new Product();
        $brand = new Brand();
        $brands = $brand -> list();
        if(isset($_GET['id']))
        {
            $product = $product->getById($_GET['id']);
        }
        require "views/header.php";
        require "views/product/form.php";
        require "views/footer.php";

    }

    public function save()
    {
        //var_dump($_FILES);
        //exit();
        $product = new Product();
        
        $id = intval($_POST['id']);
        if($id){
            $product = $product->getById($id);
        }
        $product->setName($_POST['name']);
        $product->setCost($_POST['cost']);
        $product->setPrice($_POST['price']);
        $product->setQuantity($_POST['quantity']);
        $product->setBrandId($_POST['brand_id']);
        $product->setImage_url($_FILES['image']['name']);

        move_uploaded_file($_FILES['image']['tmp_name'],"assets/img/".$_FILES['image']['name']);


        $id ? $product->update() : $product->insert();

        header('location:?c=product');
    }

    public function delete()
    {
        $product = new Product();
        $product = $product-> getById($_GET['id']);
        $product->delete();
        header('location:?c=product');
    }
    
    
}