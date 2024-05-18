document.addEventListener('DOMContentLoaded', function () {
    $.ajax({
        url: base_url + "TipoFacultados/GetTipoFacultados",
        method: "GET",
        dataType: "JSON",
        success: function(data){
            console.log(data);
            if (data.tipofacultados.length ==0){
                Swal.fire('Alerta', 'No existe ningúna tipo de facultado', 'warning');
            }else{
                console.log(data.tipofacultados);
                tablaTipoFacultados.clear().rows.add(data.tipofacultados).draw();
            }
        },
        error: function (xhr, status, error){
            console.error(error);
        },
    });
});

$(document).ready(function(){
    tablaTipoFacultados = $("#tablaTipoFacultado").DataTable({
        aProcessing: true,
        aServerSide: true,
        autoWidth: false,
        language: {
            url: base_url + "/assets/js/plugins/dataTables.spanish.js",
        },
        data:[],
        columns: [
            {data: "nombre", className: "text-center", width: "30%"},
            {data: "acciones", className: "text-center", width: "12%"},
        ],
        dom: "lfrtip",
        responsive: true,
        bDestroy: true,
        iDisplayLength: 10,
    });
});

$('#tipoFacultadoFormulario').submit(function (event){
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: base_url + 'TipoFacultados/RegistrarActualizarTipoFacultados', //ruta del navegador
        data: formData,
        type: 'POST',
        dataType: 'JSON',
        success: function(response){
            Swal.fire(response.title, response.text,response.icon);

        },
        error: function (){
            Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
        }
    });
});

function SetTipoFacultados(){
    if($.fn.DataTable.isDataTable('#tablaTipoFacultado')){
        tablaTipoFacultados.clear().draw();
    }
    $.ajax({
        url: base_url + 'TipoFacultados/GetTipoFacultados',
        method: 'GET',
        dataType: "json",
        success: function(data){
            if(data.tipofacultados.length==0){
                Swal.fire('Alerta', 'No exite ningun tipo Facultado', 'warning');
            }else{
                console.log(data.tipofacultados);
                tablaTipoFacultados.clear().rows.add(data.tipofacultados).draw();
            }
        },
        error: function(xhr, status, error){
            console.error(error);
        },
    });

    
}

function editarTiposFacultados(idTipoFacultados){
    $('#textoAccionModalTipoFacultados').text('Actualizar');
    $('#btnAccionModalTipoFacultados').text('Actualizar');
    limpiarFormulario();
    $('#idTipoFacultados').val(idTipoFacultados);
    $.ajax({
        url: base_url + 'TipoFacultados/GetTipoFacultadosByID/' + idTipoFacultados,
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function(event){
            $("body").dynamicSpinner({loadingText: "Cargando...",});
        },
        success: function (response){
            $("body").dynamicSpinnerDestroy({});
            llenarFormulario(response.tipofacultado);
            $('#modalFormularioTipoFacultados').show();
        },
        error: function(){
            $("body").dynamicSpinnerDestroy({});
            Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
        }
    })

}

function limpiarFormulario(){
    $('#idTipoFacultados').val('');
    $('#nombre_tipoFacultado').val('');
}

function llenarFormulario(tipofacultadoInfo){
    $('#idTipoFacultados').val(tipofacultadoInfo.id);
    $('#nombre_tipoFacultado').val(tipofacultadoInfo.nombre);
}

function cierraModal(nombreModal){
    nombreModal = '#'+nombreModal;
    $(nombreModal).hide();
}

function AgregarTipoFacultados(){
    limpiarFormulario();
    $('#idTipoFacultados').val(0);
    $('#textoAccionModalTipoFacultados').text('Agregar');
    $('#btnAccionModalTipoFacultados').text('Agregar');
    $('#modalFormularioTipoFacultados').show();
}