<?php
    if(isset($_SESSION['usuario'])){
        header("location:inventario");
        exit();
    }
?>
 <div class="container mt-5">
        <div class="text-center mb-4">
            <div class="border border-primary rounded py-3 px-4 bg-white shadow-sm">
                <h1 class="text-primary mb-0">Tienda Virtual Xpress</h1>
                <p class="text-muted">Crea tu cuenta para comenzar a usar nuestros servicios</p>
            </div>
        </div>
        <form class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="text-primary mb-4">Registro</h3>
                            <img src="<?=IMG."icono.jpg"?>" class="rounded-circle mb-3" width="30%" alt="Registro">
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label text-primary"><i class="fa-solid fa-user me-2"></i>Nombre</label>
                            <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Escribe tu nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label text-primary"><i class="fa-regular fa-address-book me-2"></i>Apellido</label>
                            <input class="form-control" name="apellido" id="apellido" type="text" placeholder="Escribe tu apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="usuario" class="form-label text-primary"><i class="fa-solid fa-envelope me-2"></i>Usuario</label>
                            <input class="form-control" name="usuario" id="usuario" type="text" placeholder="Escribe tu usuario" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label text-primary"><i class="fa-solid fa-lock me-2"></i>Password</label>
                            <input class="form-control" name="password" id="password" type="password" placeholder="Escribe tu contraseña" required>
                        </div>
                        <button type="button" class="btn btn-primary w-100 mb-3" id="btn_registro">
                            <i class="fa-solid fa-chalkboard-user me-2"></i>Registrar
                        </button>
                        <a href="login" class="btn btn-outline-danger w-100">
                            <i class="fa-solid fa-door-open me-2"></i>Inicio de sesión
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
<script src="./public/js/registro.js"></script>
