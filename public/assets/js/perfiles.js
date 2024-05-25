document.addEventListener('DOMContentLoaded', function () {
    $.ajax({
        url: base_url + "Perfiles/GetPerfiles",
        method: "GET",
        dataType: " JSON",
        success: function (data) {
            console.log(data);
            if (data.perfiles.length == 0) {
                Swal.fire('Alerta', 'No existe ningún perfil', 'warning');
            } else {
                console.log(data.perfiles);
                tablaPerfiles.clear().rows.add(data.perfiles).draw();
            }
        },
        error: function (xhr, status, error) {
            console.error(error);
        },
    });
});

$(document).ready(function () {
    tablaPerfiles = $("#tablaPerfiles").DataTable({
        aProcessing: true,
        aServerSide: true,
        autoWidth: false,
        language: {
            url: base_url + "/assets/js/plugins/dataTables.spanish.js",
        },
        data: [], // Puedes inicializarla con datos vacíos
        columns: [
            {data: "nombre", className: "text-center", width: "30%"},
            {data: "num_nivel_seguridad", className: "text-center", width:"12%"},
            {data: "fecha_alta", className: "text-center", width:"12%"},
            {data: "fecha_cambio", className: "text-center", width:"12%"},
            {data: "fecha_baja", className: "text-center", width:"12%"},
            {data: "activo", className: "text-center", width:"12%"},
            {data: "facultado_modificacion", className: "text-center", width:"12%"},
            {data: "acciones", className: "text-center", width: "12%"},
        ],
        dom: "lfrtip",
        responsive: true,
        bDestroy: true,
        iDisplayLength: 10,
    });    

});

$('#perfilesFormulario').submit(function (event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: base_url + 'Perfiles/RegistrarActualizarPerfiles', //ruta del navegador
        data: formData,
        type: 'POST',
        dataType: 'JSON',
        success: function (response) {
            Swal.fire(response.title, response.text, response.icon);
            if(response.activo == true){
                $('#modalFormularioPerfiles').hide();
                SetPerfiles();
            }
        },
        error: function () {
            Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
        }
    });

});

function deshabilitarPerfil(idPerfiles){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    
    swalWithBootstrapButtons.fire({
        title: "Desea activar el perfil",
        text: "Esta acción es reversible!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si activar!",
        cancelButtonText: "No, cancelar!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: base_url + 'Perfiles/DeshabilitarHabilitar/' +  idPerfiles,
                type: 'GET',
                dataType: 'JSON', 
                beforeSend: function (event) {
                    $("body").dynamicSpinner({ loadingText: "Activando...", });
                },
                success: function (response) {
                    $("body").dynamicSpinnerDestroy({});
                    Swal.fire(response.title,response.text,response.icon);
                    if (response.activo == true) {
                        SetPerfiles();
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
                text: "El perfil sigue inactivo",
                icon: "error"
            });
        }
    });
}

function SetPerfiles(){
    if($.fn.DataTable.isDataTable("#tablaPerfiles")){
        tablaPerfiles.clear().draw();
    }
    $.ajax({
        url: base_url + "Perfiles/GetPerfiles",
        method: "GET",
        dataType: "json",
        success: function(data){
            if (data.perfiles.length == 0) {
                Swal.fire('Alerta', 'No existe ningún perfil', 'warning');
            } else {
                console.log(data.perfiles);
                tablaPerfiles.clear().rows.add(data.perfiles).draw();
            }
        },
        error: function (xhr, status, error){
            console.error(error);
        },
    });
}

function editarPerfiles(idPerfiles){
    $('#textoAccionModalPerfiles').text('Actualizar');
    $('#btnAccionModalPerfiles').text('Actualizar');
    limpiarFormulario();
    $('#idPerfiles').val(idPerfiles);
    $.ajax({
        url: base_url + 'Perfiles/GetPerfilesByID/' + idPerfiles,
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function(event){
            $("body").dynamicSpinner({loadingText: "Cargando...",});
        },
        success: function (response){
            $("body").dynamicSpinnerDestroy({});
            if(response.activo == true){
                llenarFormulario(response.perfil);
                $('#modalFormularioPerfiles').show();
            } 
        },
        error: function(){
            $("body").dynamicSpinnerDestroy({});
            Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
        }
    })
}

function limpiarFormulario(){
    $('#idPerfiles').val('');
    $('#nombre_perfil').val('');
    $('#nivel_seguridad').val('');
}

function llenarFormulario(perilInfo){
    $('#idPerfiles').val(perilInfo.id);
    $('#nombre_perfil').val(perilInfo.nombre);
    $('#nivel_seguridad').val(perilInfo.num_nivel_seguridad);
}

function cierraModal(nombreModal){
    nombreModal = '#'+nombreModal;
    $(nombreModal).hide();
}

function AgregarPerfiles(){
    limpiarFormulario();
    $('#idPerfiles').val(0);
    $('#textoAccionModalPerfiles').text('Agregar');
    $('#btnAccionModalPerfiles').text('Agregar');
    $('#modalFormularioPerfiles').show();
}

