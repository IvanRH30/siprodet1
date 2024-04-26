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
            {data: "strFacultadoId", className: "text-center", width: "20%"},
            {data: "numProcuraduriaID", className: "text-center"},
            {data: "strNombre", className: "text-center"},
            {data: "strAPaterno", className: "text-center"},
            {data: "strAMaterno", className: "text-center"},
            {data: "strPassword", className: "text-center"},
            {data: "estatus", className: "text-center"},
            {data: "numPerfilId", className: "text-center"},
            {data: "strAreaId", className: "text-center"},
            {data: "strIniciales", className: "text-center"},
            {data: "strTitulo", className: "text-center"},
            {data: "numTipoFacultadoId", className: "text-center"},
            {data: "dtmFechaAlta", className: "text-center"},
            {data: "dtmFechaCambio", className: "text-center"},
            {data: "dtmFechaBaja", className: "text-center"},
            {data: "numFacultadoAutorizado", className: "text-center"},
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
            
        }, 
        error: function(){
            Swal.fire('Error', 'No se ha podido procesar la solicitud', 'error');
        }
    });
});