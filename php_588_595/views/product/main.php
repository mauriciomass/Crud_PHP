&nbsp;<a href="?c=product&a=form" class="btn btn-sm btn-info">Nuevo Producto</a>
<table class="table table-striped table-hover table-bordered">
    <thead>

        <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Cost</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Brand</th>
                <th>Image</th>
                <th></th> 

        </tr>

    </thead>
    <tbody>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?=$product -> getId() ?> </td>
                <td> <?=$product -> getName() ?> </td>
                <td> <?=$product -> getCost() ?> </td>
                <td> <?=$product -> getPrice() ?> </td>
                <td> <?=$product -> getQuantity() ?> </td>
                <td> <?=$brand -> getById($product -> getBrandId()) -> getName()?> </td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal<?=$product->getId() ?>">
                     Ver
                    </button>
      

                    <!-- Modal -->
                    <div class="modal fade" id="modal<?=$product->getId() ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="assets/img/<?=$product->getImage_url()?>" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>

                </td>
                <td>
                <a href="?c=product&a=form&id=<?=$product->getId() ?>" class="btn btn-sm btn-warning">Editar</a>    
                <a href="?c=product&a=delete&id=<?=$product->getId() ?>" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>

</table>