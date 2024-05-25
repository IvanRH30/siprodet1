document.addEventListener('DOMContentLoaded', function () {
    $.ajax({
        url: base_url + "Procuradurias/GetProcuradurias",
        method: "GET",
        dataType: "JSON",
        success: function(data){
            console.log(data);
            if (data.procuradurias.length ==0){
                Swal.fire('Alerta', 'No existe ningúna procuraduria', 'warning');
            }else{
                console.log(data.procuradurias);
                tablaProcuradurias.clear().rows.add(data.procuradurias).draw();
            }
        },
        error: function (xhr, status, error){
            console.error(error);
        },
    });
});

$(document).ready(function(){
    tablaProcuradurias = $("#tablaProcuradurias").DataTable({
        aProcessing: true,
        aServerSide: true,
        autoWidth: false,
        language: {
            url: base_url + "/assets/js/plugins/dataTables.spanish.js",
        },
        data:[],
        columns: [
            {data: "nombre", className: "text-center", width: "30%"},
            {data: "num_entidad", className: "text-center", width:"12%"},
            {data: "activo", className: "text-center", width:"12%"},
            {data: "acciones", className: "text-center", width: "12%"},
        ],
        dom: "lfrtip",
        responsive: true,
        bDestroy: true,
        iDisplayLength: 10,
    });
});

$('#procuraduriasFormulario').submit(function (event){
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: base_url + 'Procuradurias/RegistrarActualizarProcuraduria', //ruta del navegador
        data: formData,
        type: 'POST',
        dataType: 'JSON',
        success: function(response){
            Swal.fire(response.title, response.text,response.icon);
            if(response.activo == true){
                $('#modalFormularioProcuradurias').hide();
                SetProcuradurias();
            }

        },
        error: function (){
            Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
        }
    });
});

function deshabilitarProcuradurias(idProcuradurias){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    
    swalWithBootstrapButtons.fire({
        title: "Desea activar el perfil?",
        text: "Esta acción es reversible!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Si activar!",
        cancelButtonText: "No, cancelar!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: base_url + 'Procuradurias/DeshabilitarHabilitar/' +  idProcuradurias,
                type: 'GET',
                dataType: 'JSON', 
                beforeSend: function (event) {
                    $("body").dynamicSpinner({ loadingText: "Activando...", });
                },
                success: function (response) {
                    $("body").dynamicSpinnerDestroy({});
                    Swal.fire(response.title,response.text,response.icon);
                    if (response.activo == true) {
                        SetProcuradurias();
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
                text: "El usuario sigue deshabilitado",
                icon: "error"
            });
        }
    });
}

function SetProcuradurias(){
    if($.fn.DataTable.isDataTable("#tablaProcuradurias")){
        tablaProcuradurias.clear().draw();
    }
    $.ajax({
        url: base_url + "Procuradurias/GetProcuradurias",
        method: "GET",
        dataType: "json",
        success: function(data){
            if(data.procuradurias.length==0){
                Swal.fire('Alerta', 'No existe ninguna procuraduria', 'warning');
            }else{
                console.log(data.procuradurias);
                tablaProcuradurias.clear().rows.add(data.procuradurias).draw();
            }
        },
        error: function (xhr, status, error){
            console.error(error);
        },
    });
}

function editarProcuradurias(idProcuradurias){
    $('#textoAccionModalProcuradurias').text('Actualizar');
    $('#btnAccionModalProcuradurias').text('Actualizar');
    limpiarFormulario();
    $('#idProcuradurias').val(idProcuradurias);
    $.ajax({
        url: base_url + 'Procuradurias/GetProcuraduriasByID/' + idProcuradurias,
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function(event){
            $("body").dynamicSpinner({loadingText: "Cargando...",});
        },
        success: function (response){
            $("body").dynamicSpinnerDestroy({});
            if(response.activo == true){
                llenarFormulario(response.procuraduria);
                $('#modalFormularioProcuradurias').show();
            }
            
        },
        error: function(){
            $("body").dynamicSpinnerDestroy({});
            Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
        }
    })
}

function limpiarFormulario(){
    $('#idProcuradurias').val('');
    $('#nombre_procuraduria').val('');
    $('#numero_entidad').val('');
}

function llenarFormulario(procuraduriaInfo){
    $('#idProcuradurias').val(procuraduriaInfo.id);
    $('#nombre_procuraduria').val(procuraduriaInfo.nombre);
    $('#numero_entidad').val(procuraduriaInfo.num_entidad);
}

function cierraModal(nombreModal){
    nombreModal = '#' +nombreModal;
    $(nombreModal).hide();
}

function AgregarProcuradurias(){
    limpiarFormulario();
    $('#idProcuradurias').val(0);
    $('#textoAccionModalProcuradurias').text('Agregar');
    $('#btnAccionModalProcuradurias').text('Agregar');
    $('#modalFormularioProcuradurias').show();
}