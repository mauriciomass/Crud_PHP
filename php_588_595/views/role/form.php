
<h4><?=isset($_GET['id']) ? 'Editar' : 'Añadir ' ?> Roles</h4>
<form action="?c=role&a=save" method="post">
    <input type="hidden" name="id" value="<?=$role->getId()?>">
    
    <div class="row">
        <div class="col-md-4">
            <label for="role">Role:</label>
        </div>
    

        <div class="col-md-8">

            <input type="text" name="role" requiered value="<?=$role->getRole()?>"
            class="form-control">
        </div>

    </div>
    
   
        
    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
            <a href="?c=role" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>


</form>
