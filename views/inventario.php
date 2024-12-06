<?php
    if(!isset($_SESSION['usuario'])){
        header("location:login");
        exit();
    }
?>
  <div class="container mt-5">
        <!-- Título principal -->
        <div class="text-center mb-4">
            <div class="border border-primary rounded py-3 px-4 bg-white shadow-sm">
                <h1 class="text-primary mb-0">Tienda Virtual Xpress</h1>
                <p class="text-muted">Gestión de inventario</p>
            </div>
        </div>

        <!-- Botón de cerrar sesión -->
        <div class="row">
            <div class="col-12 text-start mb-3">
                <button id="btn_cerrar" class="btn btn-danger">
                    <i class="fa-solid fa-right-from-bracket me-2"></i>Cerrar sesión
                </button>
            </div>
        </div>

        <!-- Tabla de productos -->
        <div class="row justify-content-center bg-white shadow rounded py-4">
            <div class="col-10 text-center">
                <h2 class="text-primary mb-4">Lista de productos</h2>
            </div>
            <div class="col-10 text-end mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarModal">
                    <i class="fa-solid fa-plus me-2"></i>Añadir producto
                </button>
            </div>
            <div class="col-10">
                <table id="myTable" class="display table table-striped table-bordered text-center">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_producto">
                        <!-- Aquí se rellenarán los productos dinámicamente -->
                    </tbody>
                </table>
            </div>
            <div class="col-10 text-end mt-4">
                <hr class="text-primary">
                <p class="lead">By: Adrian</p>
            </div>
        </div>
    </div>

    <!-- Modales -->
    <!-- Modal: Editar Producto -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="editarModalLabel">Actualizar producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_producto_act">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="edit_producto" type="text" placeholder="Producto">
                        <label class="text-primary" for="edit_producto"><i class="fa-solid fa-box me-2"></i>Producto</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="edit_precio" type="text" placeholder="Precio">
                        <label class="text-primary" for="edit_precio"><i class="fa-solid fa-dollar-sign me-2"></i>Precio</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="edit_cantida" type="text" placeholder="Cantidad">
                        <label class="text-primary" for="edit_cantida"><i class="fa-solid fa-cubes me-2"></i>Cantidad</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn_actualizar">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Agregar Producto -->
    <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="agregarModalLabel">Agregar producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="producto" type="text" placeholder="Producto">
                        <label class="text-primary" for="producto"><i class="fa-solid fa-box me-2"></i>Producto</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="precio" type="text" placeholder="Precio">
                        <label class="text-primary" for="precio"><i class="fa-solid fa-dollar-sign me-2"></i>Precio</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="cantida" type="text" placeholder="Cantidad">
                        <label class="text-primary" for="cantida"><i class="fa-solid fa-cubes me-2"></i>Cantidad</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn_agregar">Añadir</button>
                </div>
            </div>
        </div>
    </div>
