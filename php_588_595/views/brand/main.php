&nbsp;<a href="?c=brand&a=form" class="btn btn-sm btn-info">Nueva Marca</a>
<table class="table table-striped table-hover table-bordered">

    <thead>

        <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Descripción</th>
                <th></th> 

        </tr>

    </thead>
    <tbody>
        <?php foreach ($brands as $brand) : ?>
            <tr>
                <td><?=$brand -> getId() ?> </td>
                <td> <?=$brand -> getName() ?> </td>
                <td> <?=$brand -> getDescription() ?> </td>
                <td> 
                <a href="?c=brand&a=form&id=<?=$brand->getId() ?>" class="btn btn-sm btn-warning">Editar</a>    
                <a href="?c=brand&a=delete&id=<?=$brand->getId() ?>" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>

</table>