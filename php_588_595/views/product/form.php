
<h4><?=isset($_GET['id']) ? 'Editar' : 'Añadir ' ?> Producto</h4>
<form action="?c=product&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$product->getId()?>">
    
    <div class="row">
        <div class="col-md-4">
            <label for="name">Nombre:</label>
        </div>
    

        <div class="col-md-8">

            <input type="text" name="name" requiered value="<?=$product->getName()?>"
            class="form-control">
        </div>

    </div>
    
    <div class="row">
        <div class="col-md-4">
    
             <label for="cost">Costo:</label>
        </div>
    <div class="col-md-8">
            <input type="number" name="cost" requiered value="<?=$product->getCost()?>"
            class="form-control">
        </div>
    </div>       
    
    <div class="row">
        <div class="col-md-4">
    
                <label for="price">Precio:</label>
    
        </div>
    
        <div class="col-md-8">
                <input type="number" name="price" requiered value="<?=$product->getPrice()?>"
                 class="form-control">
        
            </div>
    </div>

    <div class="row">
        <div class="col-md-4">
    
                <label for="quantity">Cantidad:</label>
        </div>
        <div class="col-md-8">

                 <input type="number" name="quantity" requiered value="<?=$product->getQuantity()?>"
                 class="form-control">
        
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
    
                <label for="brand_id">Marca:</label>
        </div>
        <div class="col-md-8">

               <select name="brand_id" class="form-select">
                   <option>Seleccione una marca</option>
                   <?php foreach($brands as $brand): ?>
                        <option value="<?=$brand->getId() ?>"
                        <?=$product-> getBrandId()==$brand->getId() ? 'selected' : '' ?> >
                        <?=$brand->getName() ?></option>
                   <?php endforeach;?>
               </select>
        
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <label for="image">Imagen:</label>
        </div>
        <div class="col-md-8"> 
            <input type="file" name="image" required class='form-control'>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
            <a href="?c=product" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>


</form>
