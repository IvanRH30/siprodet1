document.addEventListener('DOMContentLoaded', function () {
    $.ajax({
        url: base_url + "Areas/GetAreas",
        method: "GET",
        dataType: "JSON",
        success: function(data){
            console.log(data);
            if (data.areas.length ==0){
                Swal.fire('Alerta', 'No existe ningúna area', 'warning');
            }else{
                console.log(data.areas);
                tablaAreas.clear().rows.add(data.areas).draw();
            }
        },
        error: function (xhr, status, error){
            console.error(error);
        },
    });
});

$(document).ready(function (){
    tablaAreas = $("#tablaAreas").DataTable({
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

$('#areasFormulario').submit(function (event){
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: base_url + 'Areas/RegistrarActualizarAreas', //ruta del navegador
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

function SetAreas(){
    if ($.fn.DataTable.isDataTable("#tablaAreas")){
        tablaAreas.clear().draw();
    }
    $.ajax({
        url: base_url + "Areas/GetAreas",
        method: "GET",
        dataType: "json",
        success: function(data){
            if(data.areas.length==0){
                Swal.fire('Alerta', 'No existe ninguna area', 'warning');
            }else{
                console.log(data.areas);
                tablaAreas.clear().rows.add(data.areas).draw();
            }
        },
        error: function (xhr, status, error){
            console.error(error);
        },
    });
}

function editarAreas(idAreas){
    $('#textoAccionModalAreas').text('Actualizar');
    $('#btnAccionModalAreas').text('Actualizar');
    limpiarFormulario();
    $('#idAreas').val(idAreas);
    $.ajax({
        url: base_url + 'Areas/GetAreasByID/' + idAreas,
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function(event){
            $("body").dynamicSpinner({loadingText: "Cargando...",});
        },
        success: function (response){
            $("body").dynamicSpinnerDestroy({});
            llenarFormulario(response.area);
            $('#modalFormularioAreas').show();
        },
        error: function(){
            $("body").dynamicSpinnerDestroy({});
            Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
        }
    })
}

function limpiarFormulario(){
    $('#idAreas').val('');
    $('#nombre_area').val('');
}

function llenarFormulario(areaInfo){
    $('#idAreas').val(areaInfo.id);
    $('#nombre_area').val(areaInfo.nombre);
}

function cierraModal(nombreModal){
    nombreModal = '#'+nombreModal;
    $(nombreModal).hide();
}

function AgregarArea(){
    limpiarFormulario();
    $('#idAreas').val(0);
    $('#textoAccionModalAreas').text('Agregar');
    $('#btnAccionModalAreas').text('Agregar');
    $('#modalFormularioAreas').show();
}
