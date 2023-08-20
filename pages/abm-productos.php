<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/normalize.css">
    <link rel="icon" type="image/x-icon" href="../favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Ecommerce Manager</title>
</head>

<body>
    <div>
        <div class="link-options-div">
            <?php
            require "./components/options.php";
            echo $options;
            ?>
        </div>
        <h1>GESTIÓN DE PRODUCTOS</h1>
    </div>
    <div class="container frame">
        <div class="row">
            <div class="col-lg-2 ">
                <div class="items">
                    <a id="btnAddProduct" data-bs-toggle="modal" data-bs-target="#moddalProducts">
                        <div class="btn-abm">
                            <i class="fa-solid fa-square-plus"></i>
                        </div>
                    </a>
                    <a id="btnEditProduct" class="disabled">
                        <div class="btn-abm">
                            <i class="fa-solid fa-pen"></i>
                        </div>
                    </a>
                    <a id="btnDeleteProduct" class="disabled">
                        <div class="btn-abm">
                            <i class="fa-solid fa-trash"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="table-options">
                    <input type="search" name="search" placeholder="Nombre" autocomplete="off">
                    <button type="button">Buscar</button>
                    <select class="order-list" name="order" id="order">
                        <option selected hidden value="">Ordenar</option>
                        <option value="az">A-Z</option>
                        <option value="za">Z-A</option>
                        <option value="mayorPrecio">mayor $</option>
                        <option value="menorPrecio">menor $</option>
                    </select>
                    <select class="filter-list" name="filter" id="filter">
                        <option selected hidden value="">Filtrar</option>
                        <option value="promocionado">Promocionado</option>
                        <option value="noPromocionado">No Promocionado</option>
                    </select>
                </div>
                <div class="table-frame">
                    <table class="table table-dark table-hover">
                        <thead class="sticky-top">
                            <tr>
                                <th class="user-select-none first-in-table" scope="col">Nombre del producto</th>
                                <th class="user-select-none" scope="col">Categoría</th>
                                <th class="user-select-none" scope="col">Imágen</th>
                                <th class="user-select-none" scope="col">Promo</th>
                                <th class="user-select-none" scope="col">Detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require "../src/modules/products/abm-productos.php";
                            echo getProductsTableData();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="moddalProducts" tabindex="-1" aria-labelledby="ProductsModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div id="modalContent" class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5" id="ProductsModalLabel"></h2>
                            <button id="btnCloseModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="formAbmProduct" class="form-abm" action="" method="post">
                                <input type="text" name="nombre" placeholder="Nombre" required autocomplete="off">
                                <input type="text" name="imagen" placeholder="URL Imagen" required autocomplete="off">
                                <select name="categoria" id="categoria" required>
                                    <option selected hidden value="">Categoría</option>
                                    <?php
                                    $options = getOptionsCategoriesHTML();
                                    echo $options;
                                    ?>
                                </select>
                                <textarea name="descripcion" id="descripcion" placeholder="Descripción" required autocomplete="off"></textarea>
                                <div class="buttons">
                                    <button id="btnCancelModal" type="button" data-bs-dismiss="modal" aria-label="Close">CANCELAR</button>
                                    <button type="submit">ACEPTAR</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php
        require "./components/footer.php";
        echo $footer;
        ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../js/abm-productos.js"></script>


</body>

</html>