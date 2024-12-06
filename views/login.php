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
                <p class="text-muted">Accede para gestionar tus productos</p>
            </div>
        </div>
        <form id="frm_login" class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="text-center">
                            <h3 class="text-primary mb-4">Iniciar Sesión</h3>
                            <img src="<?=IMG."icono.jpg"?>" class="rounded-circle mb-3" width="30%" alt="Login">
                        </div>
                        <div class="mb-3">
                            <label for="usuario" class="form-label text-primary"><i class="fa-solid fa-envelope me-2"></i>E-mail</label>
                            <input class="form-control" id="usuario" name="usuario" type="text" 
                                   placeholder="Escribe tu e-mail" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label text-primary"><i class="fa-solid fa-lock me-2"></i>Password</label>
                            <input id="password" name="password" type="password" class="form-control" 
                                   placeholder="Escribe tu contraseña" required>
                        </div>
                        <button class="btn btn-primary w-100 mb-3" type="button" id="btn_iniciar">
                            <i class="fa-solid fa-door-open me-2"></i>Iniciar sesión
                        </button>
                        <a href="registro" class="btn btn-outline-danger w-100">
                            <i class="fa-solid fa-chalkboard-user me-2"></i>Registro
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
<script src="./public/js/login.js"></script>

