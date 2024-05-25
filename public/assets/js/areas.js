document.addEventListener('DOMContentLoaded', function () {
    $.ajax({
        url: base_url + "Areas/GetAreas",
        method: "GET",
        dataType: "JSON",
        success: function (data) {
            console.log(data);
            if (data.areas.length == 0) {
                Swal.fire('Alerta', 'No existe ningúna area', 'warning');
            } else {
                console.log(data.areas);
                tablaAreas.clear().rows.add(data.areas).draw();
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
});

$(document).ready(function () {
    tablaAreas = $("#tablaAreas").DataTable({
        aProcessing: true,
        aServerSide: true,
        autoWidth: false,
        language: {
            url: base_url + "/assets/js/plugins/dataTables.spanish.js",
        },
        data: [],
        columns: [
            { data: "nombre", className: "text-center", width: "20%" },
            { data: "clave_area", className: "text-center", width: "12%" },
            { data: "telefono_jefe", className: "text-center", width: "12%" },
            { data: "telefono_subjefe", className: "text-center", width: "12%" },
            { data: "telefono_secretaria", className: "text-center", width: "12%" },
            { data: "telefono_fax", className: "text-center", width: "12%" },
            { data: "fecha_alta", className: "text-center", width: "12%" },
            { data: "fecha_cambio", className: "text-center", width: "12%" },
            { data: "fecha_baja", className: "text-center", width: "12%" },
            { data: "activo", className: "text-center", width: "12%" },
            { data: "facultado_modificacion", className: "text-center", width: "12%" },
            { data: "acciones", className: "text-center", width: "12%" },
        ],
        dom: "lfrtip",
        responsive: true,
        bDestroy: true,
        iDisplayLength: 10,
    });
});

$('#areasFormulario').submit(function (event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: base_url + 'Areas/RegistrarActualizarAreas', //ruta del navegador
        data: formData,
        type: 'POST',
        dataType: 'JSON',
        success: function (response) {
            Swal.fire(response.title, response.text, response.icon);
            if(response.activo == true){
                $('#modalFormularioAreas').hide();
                SetAreas();
            }

        },
        error: function () {
            Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
        }
    });
});

function deshabilitarArea(idAreas) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: "Desea Activar el area?",
        text: "Esta acción es reversible!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si Activar!",
        cancelButtonText: "No, cancelar!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: base_url + 'Areas/DeshabilitarHabilitar/' + idAreas,
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function (event) {
                    $("body").dynamicSpinner({ loadingText: "Activando...", });
                },
                success: function (response) {
                    $("body").dynamicSpinnerDestroy({});
                    Swal.fire(response.title, response.text, response.icon);
                    if (response.activo == true) {
                        SetAreas();
                    }
                },
                error: function () {
                    $("body").dynamicSpinnerDestroy({});
                    Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
                }
            })
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire({
                title: "Cancelado",
                text: "El area sigue inactiva",
                icon: "error"
            });
        }
    });
}


function SetAreas() {
    if ($.fn.DataTable.isDataTable("#tablaAreas")) {
        tablaAreas.clear().draw();
    }
    $.ajax({
        url: base_url + "Areas/GetAreas",
        method: "GET",
        dataType: "json",
        success: function (data) {
            if (data.areas.length == 0) {
                Swal.fire('Alerta', 'No existe ninguna area', 'warning');
            } else {
                console.log(data.areas);
                tablaAreas.clear().rows.add(data.areas).draw();
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
}

function editarAreas(idAreas) {
    $('#textoAccionModalAreas').text('Actualizar');
    $('#btnAccionModalAreas').text('Actualizar');
    limpiarFormulario();
    $('#idAreas').val(idAreas);
    $.ajax({
        url: base_url + 'Areas/GetAreasByID/' + idAreas,
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function (event) {
            $("body").dynamicSpinner({ loadingText: "Cargando...", });
        },
        success: function (response) {
            $("body").dynamicSpinnerDestroy({});
            if (response.activo == true) {
                llenarFormulario(response.area);
                $('#modalFormularioAreas').show();
            }

        },
        error: function () {
            $("body").dynamicSpinnerDestroy({});
            Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
        }
    })
}

function limpiarFormulario() {
    $('#idAreas').val('');
    $('#nombre_area').val('');
    $('#clave_areas').val('');
    $('#tel_jefe').val('');
    $('#tel_subjefe').val('');
    $('#tel_secret').val('');
    $('#tel_fax').val('');
}

function llenarFormulario(areaInfo) {
    $('#idAreas').val(areaInfo.id);
    $('#nombre_area').val(areaInfo.nombre);
    $('#clave_areas').val(areaInfo.clave_area);
    $('#tel_jefe').val(areaInfo.telefono_jefe);
    $('#tel_subjefe').val(areaInfo.telefono_subjefe);
    $('#tel_secret').val(areaInfo.telefono_secretaria);
    $('#tel_fax').val(areaInfo.telefono_fax);
}

function cierraModal(nombreModal) {
    nombreModal = '#' + nombreModal;
    $(nombreModal).hide();
}

function AgregarArea() {
    limpiarFormulario();
    $('#idAreas').val(0);
    $('#textoAccionModalAreas').text('Agregar');
    $('#btnAccionModalAreas').text('Agregar');
    $('#modalFormularioAreas').show();
}
