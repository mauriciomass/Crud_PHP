&nbsp;<a href="?c=role&a=form" class="btn btn-sm btn-info">Nuevo Rol</a>
<table class="table table-striped table-hover table-bordered">

    <thead>

        <tr>
                <th>Id</th>
                <th>Role</th>
                <th></th> 

        </tr>

    </thead>
    <tbody>
        <?php foreach ($roles as $role) : ?>
            <tr>
                <td><?=$role -> getId() ?> </td>
                <td> <?=$role -> getRole() ?> </td>
                <td> 
                <a href="?c=role&a=form&id=<?=$role->getId() ?>" class="btn btn-sm btn-warning">Editar</a>    
                <a href="?c=role&a=delete&id=<?=$role->getId() ?>" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>

</table>