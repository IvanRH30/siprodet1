document.addEventListener('DOMContentLoaded', function () {
    $.ajax({
        url: base_url + "Prueba/GetUsuarios",
        method: "GET",
        dataType: "JSON",
        success: function (data) {
            console.log(data);
            if (data.usuarios.length == 0) {
                Swal.fire('Alerta', 'No existe ningún usuario', 'warning');
            } else {
                console.log(data.usuarios);
                tablaUsuarios.clear().rows.add(data.usuarios).draw();
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });

});
$(document).ready(function () {
    tablaUsuarios = $("#tablaUsuarios").DataTable({
        aProcessing: true,
        aServerSide: true,
        autoWidth: false,
        language: {
            url: base_url + "/assets/js/plugins/dataTables.spanish.js",
        },
        data: [], // Puedes inicializarla con datos vacíos
        columns: [
            { data: "nombre", className: "text-center", width: "20%" },
            { data: "apellido_paterno", className: "text-center" },
            { data: "apellido_materno", className: "text-center" },
            { data: "email", className: "text-center" },
            { data: "estatus", className: "text-center" },
            { data: "acciones", className: "text-center" },
        ],
        dom: "lfrtip",
        responsive: true,
        bDestroy: true,
        iDisplayLength: 10,
    });    

});

$('#pruebaFormulario').submit(function (event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: base_url + 'Prueba/RegistrarActualizarUsuario',
        data: formData,
        type: 'POST',
        dataType: 'JSON',
        success: function (response) {
            Swal.fire(response.title, response.text, response.icon);
            if (response.estatus == true) {
                $('#modalFormularioUsuario').hide();
                SetUsuarios();
            }
        },
        error: function () {
            Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
        }
    });
});
function deshabilitarUsuario(idUsuario) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: "Desea deshabilitar al usuario?",
        text: "Estación es reversible!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si deshabilitar!",
        cancelButtonText: "No, cancelar!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: base_url + 'Prueba/DeshabilitarHabilitarUsuario/' +  idUsuario,
                type: 'GET',
                dataType: 'JSON', 
                beforeSend: function (event) {
                    $("body").dynamicSpinner({ loadingText: "Deshabilitando...", });
                },
                success: function (response) {
                    $("body").dynamicSpinnerDestroy({});
                    Swal.fire(response.title,response.text,response.icon);
                    if (response.estatus == true) {
                        SetUsuarios();
                    }
                },
                error: function (){
                    $("body").dynamicSpinnerDestroy({});
                    Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
                }

            })

        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire({
                title: "Cancelado",
                text: "El usuario sigue habilitado",
                icon: "error"
            });
        }
    });
}
function SetUsuarios()
{
    if ($.fn.DataTable.isDataTable("#tableBienes")) {
        // Si la tabla ya se ha inicializado, destrúyela primero
        tablaUsuarios.clear().draw();
    }
    $.ajax({
        url: base_url + "Prueba/GetUsuarios",
        method: "GET",
        dataType: "json",
        success: function (data) {
            if (data.usuarios.length == 0) {
                Swal.fire('Alerta', 'No existe ningún usuario', 'warning');
            } else {
                console.log(data.usuarios);
                tablaUsuarios.clear().rows.add(data.usuarios).draw();
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}

function editarUsuario(idUsuario)
{   
    $('#textoAccionModalUsuario').text('Actualizar');
    $('#btnAccionModalUsuario').text('Actualizar');
    limpiarFormulario();
    $('#idUsuario').val(idUsuario);
    $.ajax({
        url: base_url + 'Prueba/GetUsuarioByID/' + idUsuario,
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function (event) {
            $("body").dynamicSpinner({ loadingText: "Cargando...", });
        },
        success: function (response) {
            $("body").dynamicSpinnerDestroy({});
            if (response.estatus == true) {
                llenarFormulario(response.usuario);
                $('#modalFormularioUsuario').show();
            }
        },
        error: function () {
            $("body").dynamicSpinnerDestroy({});
            Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
        }
    })
}
function llenarFormulario(usuarioInfo){
    $('#idUsuario').val(usuarioInfo.id);
    $('#nombre').val(usuarioInfo.nombre);
    $('#apellido_paterno').val(usuarioInfo.apellido_paterno);
    $('#apellido_materno').val(usuarioInfo.apellido_materno);
    $('#email').val(usuarioInfo.email);
    $('#password1').val(usuarioInfo.password);
}
function limpiarFormulario() {
    $('#idUsuario').val('');
    $('#nombre').val('');
    $('#apellido_paterno').val('');
    $('#apellido_materno').val('');
    $('#email').val('');
    $('#password1').val('');
}
function cierraModal(nombreModal) {
    nombreModal = '#'+nombreModal;
    $(nombreModal).hide();
}
function agregarUsuario() {
    limpiarFormulario();
    $('#idUsuario').val(0);
    $('#textoAccionModalUsuario').text('Agregar');
    $('#btnAccionModalUsuario').text('Agregar');
    $('#modalFormularioUsuario').show();
}