
<h4>Añadir Usuario</h4>
<form action="?c=user&a=save" method="post">
 
    <div class="row">
        <div class="col-md-4">
            <label for="email">Email:</label>
        </div>
    

        <div class="col-md-8">

            <input type="text" name="email" required class="form-control">
         
        </div>

    </div>
    
    <div class="row">
        <div class="col-md-4">
            <label for="password">Password:</label>
        </div>
    

        <div class="col-md-8">

            <input type="password" name="password" requiered class="form-control">
            
        </div>

    </div>
    
    <div class="row">
        <div class="col-md-4">
            <label for="name">Nombre:</label>
    </div>
    

        <div class="col-md-8">

            <input type="text" name="name" requiered class="form-control">
            
        </div>

    </div>
    
    <div class="row">
        <div class="col-md-4">
    
                <label for="rol_id">Rol:</label>
        </div>
        <div class="col-md-8">

               <select name="rol_id" class="form-select">
                   <option>Seleccione un rol</option>
                   <?php foreach($roles as $role): ?>
                        <option value="<?=$role->getId() ?>"
                        <?=$user-> getRolId()==$role->getId() ? 'selected' : '' ?> >
                        <?=$role->getRole() ?></option>
                   <?php endforeach;?>
               </select>
        
        </div>
    </div>
        
    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
            <a href="?c=brand" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>


</form>
