document.addEventListener('DOMContentLoaded', function () {
    $.ajax({
        url: base_url + "Usuario/GetUsuarios",
        method: "GET",
        dataType: " JSON",
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

$(document).ready(function (){
    tablaUsuarios = $("#tablaNuevosUsuarios").DataTable({
        aProcessing: true,
        aServerSide: true,
        autoWidth: false,
        language:{
            url: base_url + "/assets/js/plugins/dataTables.spanish.js",
        },
        data: [],
        columns:[
            {data: "strFacultadoId", className: "text-center", width: "10%"},
            {data: "numProcuraduriaID", className: "text-center", width: "12%" },
            {data: "strNombre", className: "text-center", width: "12%" },
            {data: "strAPaterno", className: "text-center", width: "12%" },
            {data: "strAMaterno", className: "text-center", width: "12%" },
            //{data: "strPassword", className: "text-center", width: "10%" },
            {data: "estatus", className: "text-center", width: "12%" },
            {data: "numPerfilId", className: "text-center", width: "12%" },
            {data: "strAreaId", className: "text-center", width: "12%" },
            {data: "strIniciales", className: "text-center", width: "12%" },
            {data: "strTitulo", className: "text-center", width: "12%" },
            {data: "numTipoFacultadoId", className: "text-center", width: "12%" },
            {data: "dtmFechaAlta", className: "text-center", width: "12%" },
            {data: "dtmFechaCambio", className: "text-center", width: "12%" },
            {data: "dtmFechaBaja", className: "text-center", width: "12%" },
            {data: "numFacultadoAutorizado", className: "text-center", width: "12%" },
            {data: "acciones", className: "text-center", width: "12%"},
        ],
        dom: "lfrtip",
        responsive: true,
        bDestroy: true,
        iDisplayLength: 10,
    });
});


//FUNCION GUARDAR
$('#usuarioNuevoFormulario').submit(function (event){//primer paso
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: base_url + 'Usuario/NuevoRegistrarActualizar',
        data: formData,
        type: 'POST',
        dataType: 'JSON',
        success: function (response){
            Swal.fire(response.title, response.text, response.icon);
            if (response.estatus == true) {
                $('#modalFormularioUsuario').hide();
                SetUsuarios();
            }
        }, 
        error: function(){
            Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
        }
    });
});

function deshabilitarUsuario(idUsuario){
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
                url: base_url + 'Usuario/DeshabilitarHabilitar/' +  idUsuario,
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

function SetUsuarios(){
    if ($.fn.DataTable.isDataTable("#tableBienes")) {
        // Si la tabla ya se ha inicializado, destrúyela primero
        tablaUsuarios.clear().draw();
    }
    $.ajax({
        url: base_url + "Usuario/GetUsuarios",
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

function editarUsuario(idUsuario){
    $('#textoAccionModalUsuario').text('Actualizar');
    $('#btnAccionModalUsuario').text('Actualizar');
    limpiarFormulario();
    $('#idNuevo').val(idUsuario);
    $.ajax({
        url: base_url + 'Usuario/GetUsuarioByID/' + idUsuario,
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

function limpiarFormulario(){
    $('#idNuevo').val('');
    $('#strFacultado').val('');
    $('#numProcuraduria').val('');
    $('#strNombre').val('');
    $('#strPaterno').val('');
    $('#strMaterno').val('');
    $('#strPassword').val('');
    $('#strPerfil').val('');
    $('#strArea').val('');
    $('#strIniciales').val('');
    $('#strTitulo').val('');
    $('#strNumTipoFacultado').val('');
    $('#strFechaAlta').val('');
    $('#strFechaCambio').val('');
    $('#strFechaBaja').val('');
    $('#strFacultadoAutorizado').val('');
}

function llenarFormulario(usuarioInfo){
    $('#idNuevo').val(usuarioInfo.id);
    $('#strFacultado').val(usuarioInfo.strFacultadoId);
    $('#numProcuraduria').val(usuarioInfo.numProcuraduriaID);
    $('#strNombre').val(usuarioInfo.strNombre);
    $('#strPaterno').val(usuarioInfo.strAPaterno);
    $('#strMaterno').val(usuarioInfo.strAMaterno);
    $('#strPassword').val(usuarioInfo.strPassword);
    $('#strPerfil').val(usuarioInfo.numPerfilId);
    $('#strArea').val(usuarioInfo.strAreaId);
    $('#strIniciales').val(usuarioInfo.strIniciales);
    $('#strTitulo').val(usuarioInfo.strTitulo);
    $('#strNumTipoFacultado').val(usuarioInfo.numTipoFacultadoId);
    $('#strFechaAlta').val(usuarioInfo.dtmFechaAlta);
    $('#strFechaCambio').val(usuarioInfo.dtmFechaCambio);
    $('#strFechaBaja').val(usuarioInfo.dtmFechaBaja);
    $('#strFacultadoAutorizado').val(usuarioInfo.numFacultadoAutorizado);
}

function cierraModal(nombreModal){
    nombreModal = '#'+nombreModal;
    $(nombreModal).hide();

}