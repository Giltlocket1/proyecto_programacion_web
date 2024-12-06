// Función para consultar los productos
const consulta = () => {
    let data = new FormData();
    data.append("metodo", "obtener_datos");
    fetch("./app/controller/Productos.php", {
        method: "POST",
        body: data
    })
    .then(respuesta => respuesta.json())
    .then(respuesta => {
        let contenido = ``, i = 1;
        respuesta.map(producto => {
            contenido += `
                <tr>
                    <th>${i++}</th>
                    <td>${producto['producto']}</td>
                    <td>${producto['precio']}</td>
                    <td>${producto['cantida']}</td>
                    <td>${producto['fecha']}</td>
                    <td>
                        <button type="button" class="btn btn-warning" onclick="precargar(${producto['id_producto']})">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger" onclick="eliminar(${producto['id_producto']})">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
            `;
        });
        $("#contenido_producto").html(contenido);
        $('#myTable').DataTable();
    });
};

// Función para agregar un producto
const agregar = () => {
    const producto = $("#producto").val().trim();
    const precio = $("#precio").val().trim();
    const cantida = $("#cantida").val().trim();

    // Validar campos vacíos
    if (!producto || !precio || !cantida) {
        swal("Error", "Por favor, llena todos los campos.", "error");
        return; // Detener la ejecución
    }

    let data = new FormData();
    const fechaActual = new Date().toISOString().split('T')[0]; // Obtiene la fecha en formato 'YYYY-MM-DD'

    data.append("producto", producto);
    data.append("precio", precio);
    data.append("cantida", cantida);
    data.append("fecha", fechaActual);  // Añade la fecha actual
    data.append("metodo", "insertar_datos");

    fetch("./app/controller/Productos.php", {
        method: "POST",
        body: data
    })
    .then(respuesta => respuesta.json())
    .then(respuesta => { 
        if (respuesta[0] == 1) {
            swal("Éxito", respuesta[1], "success");
            consulta();
            limpiarCampos(); // Limpiar los campos del formulario
            $("#agregarModal").modal('hide');
        } else {
            swal("Error", respuesta[1], "error");
        }
    });
};

// Función para limpiar los campos del formulario de agregar
const limpiarCampos = () => {
    $("#producto").val('');
    $("#precio").val('');
    $("#cantida").val('');
};

// Función para precargar datos en el modal de edición
const precargar = (id) => {
    let data = new FormData();
    data.append("id_producto", id);
    data.append("metodo", "precargar_datos");
    fetch("./app/controller/Productos.php", {
        method: "POST",
        body: data
    })
    .then(respuesta => respuesta.json())
    .then(respuesta => {   
        $("#edit_producto").val(respuesta['producto']);
        $("#edit_precio").val(respuesta['precio']);
        $("#edit_cantida").val(respuesta['cantida']);
        $("#id_producto_act").val(respuesta['id_producto']);
        $("#editarModal").modal('show');
    });
};

// Función para actualizar el producto
const actualizar = () => {
    const producto = $("#edit_producto").val().trim();
    const precio = $("#edit_precio").val().trim();
    const cantida = $("#edit_cantida").val().trim();

    // Validar campos vacíos
    if (!producto || !precio || !cantida) {
        swal("Error", "Por favor, llena todos los campos.", "error");
        return; // Detener la ejecución
    }

    let data = new FormData();
    data.append("id_producto", $("#id_producto_act").val());
    data.append("producto", producto);
    data.append("precio", precio);
    data.append("cantida", cantida);
    data.append("metodo", "actualizar_datos");

    fetch("./app/controller/Productos.php", {
        method: "POST",
        body: data
    })
    .then(respuesta => respuesta.json())
    .then(respuesta => { 
        if (respuesta[0] == 1) {
            swal("Éxito", respuesta[1], "success");
            consulta();
            $("#editarModal").modal('hide');
        } else {
            swal("Error", respuesta[1], "error");
        }
    });
};

// Función para eliminar un producto
const eliminar = (id) => {
    swal({
        title: "¿Estás seguro?",
        text: "¿Quieres eliminar el producto?",
        icon: "warning",
        buttons: ["Cancelar", "Eliminar"],
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            let data = new FormData();
            data.append("id_producto", id);
            data.append("metodo", "eliminar_datos");

            fetch("./app/controller/Productos.php", {
                method: "POST",
                body: data
            })
            .then(respuesta => respuesta.json())
            .then(respuesta => { 
                if (respuesta[0] == 1) {
                    swal("Eliminado", respuesta[1], "success");
                    consulta();
                } else {
                    swal("Error", respuesta[1], "error");
                }
            });
        }
    });
};

// Botones para actualizar y agregar
$('#btn_actualizar').on('click', () => {
    actualizar();
});

$('#btn_agregar').on('click', () => {
    agregar();
});

// Llamar a la función de consulta al cargar la página
consulta();
