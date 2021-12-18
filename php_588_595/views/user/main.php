&nbsp;<a href="?c=user&a=form" class="btn btn-sm btn-info">Nuevo Usuario</a>
<table class="table table-striped table-hover table-bordered">


    <thead>

        <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Name</th>
                <th>Role</th>
                <th>State</th>
                <th></th> 

        </tr>

    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?=$user -> getId() ?> </td>
                <td><?=$user -> getEmail() ?> </td>
                <td> <?=$user -> getName() ?> </td>
                <td> <?=$role -> getById($user -> getRolId()) -> getRole()?> </td>
 
                <td><?=$user -> getState() ?> </td>
                <td> 
                <a href="?c=user&a=changeState&id=<?=$user->getId() ?>" class="btn btn-sm 
                <?=$user->getState() ? 'btn-danger' : 'btn-primary' ?>"> <?=$user->getState() ? 'Desactivar' : 'Activar' ?> </a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>

</table>