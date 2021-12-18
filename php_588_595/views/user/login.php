<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container">

<h1>Login</h1>

<form action="?c=user&a=validate" method="post">
<div class="row">
    <div class="col-md-2">
        <label for="user">User: </label>
    
        <div class="col-md-10">
            <input type="mail" name="user" class="from-control">
        </div>
    </div>
<div class="row">
<div class="col-md-2">
    <label for="password">Password: </label>
</div>  
<div class="row">
    <div class="col-md-10">
  <input type="password" name="password" class= "from-control">
    </div> 
</div> 

<div class="row">
    <div class="col-md-10"></div>
    <div class="col-md-2">
     <button type="submit" class="btn btn-primary">Iniciar</button>
    </div>
</div>
    
</form>

<?php if (isset($_GET['error'])):?>
    <div class="alert alert-danger">
        <p>
        error,datos incorrectos o el usuario esta desabilitado
        </p>
    </div>
<?php endif ?>

</div>